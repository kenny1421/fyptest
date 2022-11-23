<?php
// connect to the database
$conn = mysqli_connect('mysqltest3.mysql.database.azure.com', 'sqltest', 'Test12345', 'my_db');

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '/wwwroot/final/admin_upload/uploads/' . $filename;

    // get the file extension
    echo "Testing";
    echo $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    echo $extension;
    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx','json'])) {
        echo "----------------------------You file extension must be .zip, .pdf ,.docx or json!!!----------------------------";
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
