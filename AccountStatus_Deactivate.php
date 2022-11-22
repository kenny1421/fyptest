<?php
    $id=$_GET['id'];
    include 'db_conn.php';
    mysqli_query($conn, "UPDATE users SET status='Deactivate' WHERE id='$id'");
    header("location:Admin_ManageAccount.php")

?>