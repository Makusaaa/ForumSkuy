<?php

    $username = $_POST["username"];
    $password = $_POST["password"];
    $validate = 1;

    $con = mysqli_connect('localhost', 'root', '', 'forumskuy', 3306);
    if(strlen($username)==0){
        $validate=0;
        $error='Must input username!';
    }else if(strlen($username)<5 || strlen($username)>15){
        $validate=0;
        $error='Username length must be 5-15 characters!';
    }else if(strlen($password)==0){
        $validate=0;
        $error='Must input password!';
    }else if(strlen($password)<8){
        $validate=0;
        $error='Password length must be atleast 8 characters!';
    }

    if ($con->error){
        echo $con->error;
    }else {
        if($validate==1){
            $result = $con->query("SELECT * FROM users WHERE `username`='$username'");
            if($result->num_rows == 1){
                $error ='Username taken!';
                header("Location: ../login.php?error=".$error);
            }else{
                $con->query("INSERT INTO `users` (`id`,`username`, `password`,`picture`) VALUES (NULL,'$username','$password','default.jpg');");
                header("Location: ../index.php");
            }
        }else{
            header("Location: ../register.php?error=".$error);
        }
    }
?>