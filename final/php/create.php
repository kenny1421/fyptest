<?php
if (isset($_POST['create'])){
    include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);
    $NAME = validate($_POST['NAME']);
    $email = validate($_POST['email']);
    $hash = md5($password);
    
    $user_data ='username='.$username. '&password='.$password. '&role='.$role. '$email='.$email. '&NAME='.$NAME; 
    
    if(empty($NAME)){
        header("Location: ../Admin_CreateAccount.php?error=Full Name is required&$user_data");
    }else if(empty($username)){
        header("Location: ../Admin_CreateAccount.php?error=Username is required&$user_data");
    }else if(empty($password)){
        header("Location: ../Admin_CreateAccount.php?error=Password is required&$user_data");
    }else if(empty($email)){
        header("Location: ../Admin_CreateAccount.php?error=Email is required&$user_data");
    }else{
        $sql = "INSERT INTO users(username,password,role,NAME,email)
        VALUES('$username', '$hash', '$role', '$NAME', '$email')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('Location: ../Admin_CreateAccount.php');
        }else {
            header("Location: ../Admin_CreateAccount.php?error=unknown error occurred&$user_data");
        }
    }
}
?>