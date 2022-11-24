<?php
// connect to the database
$conn = mysqli_connect('mysqltest3.mysql.database.azure.com', 'sqltest', 'Test12345', 'my_db');

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

$containerName="testingupload2";
// Create blob client.
$blobClient = BlobRestProxy::createBlobService($connectionString);
// Uploads files
      
    if (isset($_POST['save'])) { // if save button on the form is clicked

        // Create container.
   
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    //echo $extension;
    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    $myfile = fopen($filename, "w") or die("Unable to open file!");
        
        fclose($myfile);
        
        # Upload file as a block blob
        echo "Uploading BlockBlob: ".PHP_EOL;
        echo $filename;
        echo "<br />";
        
        $content = fopen($filename, "r");

        //Upload blob
        $blobClient->createBlockBlob($containerName, $filename, $content);

        // List blobs.
        $listBlobsOptions = new ListBlobsOptions();
        $listBlobsOptions->setPrefix("HelloWorld");

        echo "These are the blobs present in the container: ";

        do{
            $result = $blobClient->listBlobs($containerName, $listBlobsOptions);
            foreach ($result->getBlobs() as $blob)
            {
                echo $blob->getName().": ".$blob->getUrl()."<br />";
            }
        
            $listBlobsOptions->setContinuationToken($result->getContinuationToken());
        } while($result->getContinuationToken());
        echo "<br />";

        // Get blob.
        echo "This is the content of the blob uploaded: ";
        $blob = $blobClient->getBlob($containerName, $filename);
        fpassthru($blob->getContentStream());
        echo "<br />";

    
    if (!in_array($extension, ['zip', 'pdf', 'docx','json'])) {
        echo "You file extension must be .zip, .pdf ,.docx or json";
    } elseif ($_FILES['myfile']['size'] > 99999999) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else 
    
    {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                unset($_FILES['UploadFileField']); header('Location: Admin_UploadTask.php');
                 echo "File Uploaded! .";
                exit();
            }
        } 
        
        else 
        {
        echo "Failed to upload file.";
        }
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
    $filepath = '../uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../uploads/' . $file['name']));
        
        //This part of code prevents files from being corrupted after download
        ob_clean();
        flush();
        
        readfile('../uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
