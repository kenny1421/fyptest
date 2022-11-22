<?php
// connect to the database
$conn = mysqli_connect('mysqltest3.mysql.database.azure.com', 'sqltest', 'Test12345', 'my_db');

$sql = "SELECT * FROM annotators_files";
$result = mysqli_query($conn, $sql);


$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Searchbar
$result=mysqli_query ($conn, "select name,id from annotators_files ");
echo "<hr/>";
echo "<center>";
echo "<select id='searchdd1' onchange='myAjax(this.value)'>";

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
    $sql = "SELECT * FROM annotators_files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

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
        
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
mysqli_close($conn);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<link hred="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet">  

<script>
      $('#searchdd1').on('change', function()
{
    window.location.href ="Manager_ViewTask.php?file_id=" + $(this).val(); //or alert($(this).val());
});

</script>


