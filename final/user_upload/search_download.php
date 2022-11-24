<?php

// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'file-management');

$sql = "SELECT * FROM annotators_files";
$result = mysqli_query($conn, $sql);


$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $id = $_POST['action'];

    // fetch file to download from database
    $sql = "SELECT * FROM annotators_files WHERE id=$id";
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


mysqli_close($conn);

?>