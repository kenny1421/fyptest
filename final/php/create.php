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
    $hash = md5($password);
    
    $user_data ='username='.$username. '&password='.$password. '&role='.$role. '&NAME='.$NAME; 
    if (empty($username)){
        header("Location: ../CreateAccount.php?error=username is required&$user_data");
    }else if(empty($password)){
        header("Location: ../CreateAccount.php?error=password is required&$user_data");
    }else{
        $sql = "INSERT INTO users(username,password,role,NAME)
        VALUES('$username', '$hash', '$role', '$NAME')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('Location: ../CreateAccount.php');
        }else {
            header("Location: ../CreateAccount.php?error=unknown error occurred&$user_data");
        }
    }
}
?>
