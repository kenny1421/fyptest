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

$containerName="fileupload2";
// Create blob client.
$blobClient = BlobRestProxy::createBlobService($connectionString);
    
// Uploads files
      
if (isset($_POST['save'])) { // if save button on the form is clicked

        // Create container.
   
    // name of the uploaded file
    // destination of the file on the server
    
        
       $filename = $_FILES['myfile']['name'];
        
    if(($_FILES['myfile']['name']) == ""){
        echo "<div class='text-danger text-center'>Please choose a file!</div>";
    } else {

        
    $destination = '../uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    $myfile = fopen($filename, "w") or die("Unable to open file!");
        
    fclose($myfile);
    $content = fopen($_FILES['myfile']["tmp_name"], "r")or die("Unable to open file!");
       

    if (!in_array($extension, ['zip', 'pdf', 'docx','json'])) {
        echo "<div class='text-danger text-center'>You file extension must be .zip, .pdf ,.docx or json!!!</div>";
    } elseif ($_FILES['myfile']['size'] > 99999999) { // file shouldn't be larger than 1Megabyte
        echo "<div class='text-danger text-center'>File too large!</div>";
    } else 
     //Upload blob
        
    {
        $blobClient->createBlockBlob($containerName, $filename, $content);
        echo "<div class='text-success text-center'>" . $filename . " had been uploaded!</div>";
        
        }
    }

    }
}
if (isset($_GET['delete_id'])) {
    $blobfile = $_GET['delete_id'];
    
    $blobClient->deleteBlob('testingupload2', $blobfile);  
    
    echo "<div class='text-danger text-center'>" . $blobfile . " had been deleted!</div>";
}


// Downloads files
if (isset($_GET['file_id'])) {
    // fetch file to download from database
    $blobfile = $_GET['file_id'];
    $filedoc = basename($blobfile);
    $ext = new SplFileInfo($filedoc);
    $fileext = strtolower($ext->getExtension());

    try {
    $blob = $blobClient->getBlob('testingupload2',  $blobfile);
        
    if($fileext === "pdf") {
        header('Content-type: application/pdf');
    } else if ($fileext == "zip") {
        header('Content-type: application/zip'); 
    } else if ($fileext == "docx") {
        header('Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); 
    } else if($fileext == "txt") {
        header('Content-type: plain/text');
    }else if($fileext =="json"){
        header('Content-type:application/json');
    } elseif($fileext == "jpg"){
        header('Content-type:image/jpg');
    }
    header("Content-Disposition: attachment; filename=\"$blobfile\"");   
    fpassthru($blob->getContentStream());
    echo "<div class='text-success text-center'>" . $blobfile . " had been downloaded!</div>";
   
        
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here: 
    // http://msdn.microsoft.com/en-us/library/windowsazure/dd179439.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}

}
