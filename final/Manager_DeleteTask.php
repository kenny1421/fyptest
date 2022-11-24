<?php

session_start();
include 'db_conn.php';

if(isset($_POST['delete_btn']))
{
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    

    $task_query = "SELECT * FROM crud WHERE id='$id' ";
    $task_query_run = mysqli_query($conn,$task_query);

    $delete_query = "DELETE FROM crud WHERE id='$id' ";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if($delete_query_run)
    {
        echo 200;
    }
    else{
        echo 500;
    }



}
else
{
    header('Location: Manager_ManageTask.php');
}



?>