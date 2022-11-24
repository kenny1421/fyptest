<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'my_db');

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

require_once '../vendor/autoload.php';


use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;
if (!isset($_GET["Cleanup"])) {
    
$connectionString = "DefaultEndpointsProtocol=https;AccountName='fypblobstorage1';AccountKey='AjZJkdXUn30JxqF9/3cevJ1ucreLhgxXflkk/dQSB4ekJ8mEBATRoPRkpGiGDkM2UoLwyE9bHmOe+AStYE5M6A=='";

$containerName="fileupload2";
// Create blob client.
$blobClient = BlobRestProxy::createBlobService($connectionString);
    
// Uploads files
      

   
}

if (isset($_GET['delete_id'])) {
    $blobfile = $_GET['delete_id'];
    
    $blobClient->deleteBlob('fileupload2', $blobfile);  
    
    echo "<div class='text-danger text-center'>" . $blobfile . " had been deleted!</div>";
}


// Downloads files
if (isset($_GET['file_id'])) {
    

    // fetch file to download from database
    $blobfile = $_GET['file_id'];
    echo $blobfile;
    echo "<div class='text-success text-center'>" . $blobfile . " had been downloaded!</div>";
    $id = $_GET['file_id'];
    $filedoc = basename($blobfile);
    $ext = new SplFileInfo($filedoc);
    $fileext = strtolower($ext->getExtension());


    /*if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../uploads/' . $file['name']));
        
        //This part of code prevents files from being corrupted after download
        ob_clean();
        flush();*/
        try {
    // Get blob.
    $blob = $blobClient->getBlob('fileupload2', $blobfile);

    if($fileext === "pdf") {
        header('Content-type: application/pdf');
    } else if ($fileext === "doc") {
        header('Content-type: application/msword'); 
    } else if ($fileext === "docx") {
        header('Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); 
    } else if($fileext === "txt") {
        header('Content-type: plain/text');
    }else if($fileext ==="json"){
        header('Content-type:application/json');
    }
            elseif($fileext === "jpg"){
        header('Context-type:image/jpg');
    }
    header("Content-Disposition: attachment; filename=\"" . $blobfile . "\"");
    
    fpassthru($blob->getContentStream());
    
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here: 
    // http://msdn.microsoft.com/en-us/library/windowsazure/dd179439.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}
        readfile('../uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
}

