<?php

    $username = $_POST["username"];
    $password = $_POST["password"];
    $validate = 1;

    if(strlen($username)==0){
        $validate=0;
        $error='Must input Username!';
    }else if(strlen($password)==0){
        $validate=0;
        $error='Must input Password!';
    }

    $con = mysqli_connect('localhost', 'root', '', 'forumskuy', 3306);
    if ($con->error){
        echo $con->error;
    }
    else{
        if($validate==1){
            $result = $con->query("SELECT * FROM users WHERE `username`='$username' AND `password`='$password'");
            if($result->num_rows == 1){
                $dataresult = $result->fetch_assoc();
                session_start();
                $_SESSION["isLogin"] = true;
                $_SESSION["username"] = $dataresult["username"];
                $_SESSION["picture"] = $dataresult["picture"];
                $_SESSION["id"] = $dataresult["id"];
                header("Location: ../index.php");
                die();
            }else{
                $error ='Wrong Username and Pasword!';
                header("Location: ../login.php?error=".$error);
            }
        }else{
            header("Location: ../login.php?error=".$error);
        }
    }

?>