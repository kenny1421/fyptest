<?php
// connect to the database
$conn = mysqli_connect('mysqltest3.mysql.database.azure.com', 'sqltest', 'Test12345', 'my_db');

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
$accesskey = "Vyw5XU83SgGmQurAbrMcjGjPvmzoIeKP2e9KtUg3ZmEt6GqsCYZeQBpyOixej5h40Djzp5WQzd66+AStD/tnTA==";
$storageAccount = 'fypblobstorage1';
$filetoUpload = realpath('./uploads/testing.zip');
$containerName = 'fileupload';
$blobName = 'testing.zip';

$destinationURL = "https://fypblobstorage1.blob.core.windows.net/fileupload";

function uploadBlob($filetoUpload, $storageAccount, $containerName, $blobName, $destinationURL, $accesskey) {

    $currentDate = gmdate("D, d M Y H:i:s T", time());
    $handle = fopen($filetoUpload, "r");
    $fileLen = filesize($filetoUpload);

    $headerResource = "x-ms-blob-cache-control:max-age=3600\nx-ms-blob-type:BlockBlob\nx-ms-date:$currentDate\nx-ms-version:2015-12-11";
    $urlResource = "/$storageAccount/$containerName/$blobName";

    $arraysign = array();
    $arraysign[] = 'PUT';               /*HTTP Verb*/  
    $arraysign[] = '';                  /*Content-Encoding*/  
    $arraysign[] = '';                  /*Content-Language*/  
    $arraysign[] = $fileLen;            /*Content-Length (include value when zero)*/  
    $arraysign[] = '';                  /*Content-MD5*/  
    $arraysign[] = 'image/png';         /*Content-Type*/  
    $arraysign[] = '';                  /*Date*/  
    $arraysign[] = '';                  /*If-Modified-Since */  
    $arraysign[] = '';                  /*If-Match*/  
    $arraysign[] = '';                  /*If-None-Match*/  
    $arraysign[] = '';                  /*If-Unmodified-Since*/  
    $arraysign[] = '';                  /*Range*/  
    $arraysign[] = $headerResource;     /*CanonicalizedHeaders*/
    $arraysign[] = $urlResource;        /*CanonicalizedResource*/

    $str2sign = implode("\n", $arraysign);

    $sig = base64_encode(hash_hmac('sha256', urldecode(utf8_encode($str2sign)), base64_decode($accesskey), true));  
    $authHeader = "SharedKey $storageAccount:$sig";

    $headers = [
        'Authorization: ' . $authHeader,
        'x-ms-blob-cache-control: max-age=3600',
        'x-ms-blob-type: BlockBlob',
        'x-ms-date: ' . $currentDate,
        'x-ms-version: 2015-12-11',
        'Content-Type: image/png',
        'Content-Length: ' . $fileLen
    ];

    $ch = curl_init($destinationURL);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_INFILE, $handle); 
    curl_setopt($ch, CURLOPT_INFILESIZE, $fileLen); 
    curl_setopt($ch, CURLOPT_UPLOAD, true); 
    $result = curl_exec($ch);

    echo ('Result<br/>');
    print_r($result);

    echo ('Error<br/>');
    print_r(curl_error($ch));

    curl_close($ch);
}

uploadBlob($filetoUpload, $storageAccount, $containerName, $blobName, $destinationURL, $accesskey);


// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '/wwwroot/final/admin_upload/uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx','json'])) {
        echo "----------------------------You file extension must be .zip, .pdf ,.docx or json----------------------------";
    } elseif ($_FILES['myfile']['size'] > 99999999) { // file shouldn't be larger than 1Megabyte
        echo "----------------------------File too large!----------------------------";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                unset($_FILES['UploadFileField']); header('Location: Admin_UploadTask.php'); exit();
            }
        } else {
            echo "----------------------------Failed to upload file.----------------------------";
        }
    }
}

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '/wwwroot/final/admin_upload/uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        
        //This part of code prevents files from being corrupted after download
        ob_clean();
        flush();
        
        readfile('/wwwroot/final/admin_upload/uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
