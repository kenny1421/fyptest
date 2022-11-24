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

$containerName="testingupload2";
$blobClient=BlobRestProxy::createBlobService($connectionString);
//Searchbar
$result=mysqli_query ($conn, "select name,id from files ");
echo "<hr/>";
echo "<center>";
echo "<select id='searchdd2' onchange='myAjax(this.value)'>";

echo "<option selected disabled> -- Search File Name
--</option>";
while ($row=mysqli_fetch_array ($result)){

echo "<option value=$row[id]>$row[name]</option>";
}


echo "</select>";
echo "</center>";

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../uploads/' . $file['name'];
    $blobfile = $file['name'];
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
    $blob = $blobClient->getBlob('testingupload2', $blobfile);

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
}
mysqli_close($conn);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet">  

<script>
    $("#searchdd2").chosen();
      $('#searchdd2').on('change', function()
{
    window.location.href ="User_ViewTask.php?file_id=" + $(this).val(); //or alert($(this).val());
});

</script>
