<?php
    session_start();
    require "./connection.php";

    if(isset($_POST['login'])){
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

        if($validate==1){
            //prepare statement to get result from database
            $query = "SELECT id, username, password FROM users WHERE username=?;";
            $statement = $db->prepare($query);
            $statement->bind_param("s",$username);
            $statement->execute();
            $result = $statement->get_result();
            $db->close();
            if ($result->num_rows === 1){
              $row = $result->fetch_assoc();
              if(password_verify($password, $row['password'])){
                  echo "<script> alert('Login success') </script>";
                  $_SESSION["isLogin"] = true;
                  $_SESSION["username"] = $row["username"];
                  $_SESSION["picture"] = $row["picture"];
                  $_SESSION["id"] = $row["id"];
                  header("Location: ../index.php");
                  exit();
              }
              else{
                  $error = 'Wrong Username and Password';
              }
            }
            $error = 'Wrong Username and Pasword!';
        }
        $_SESSION["username-input"] = $username;
        $_SESSION["password-input"] = $password;
        $_SESSION["error-message"] = $error;
        header("Location: ../login.php");
    }else if(isset($_POST['register'])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $validate = 1;

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

        if($validate==1){
            $query = "SELECT username FROM users WHERE username=?";
            $statement = $db->prepare($query);
            $statement->bind_param("s",$username);
            $statement->execute();
            $result = $statement->get_result();
            if($result->num_rows === 1){
                $error ='Username taken!';
            }else{
                $hashPass = password_hash($password, PASSWORD_BCRYPT);
                $query = "INSERT INTO users (`username`, `password`,`picture`) VALUES (?,?,'default.jpg');";
                $statement = $db->prepare($query);
                $statement->bind_param("ss",$username,$hashPass);
                $statement->execute();
                $db->close();
                header("Location: ../index.php");
                exit();
            }
        }
        $_SESSION["username-input"] = $username;
        $_SESSION["password-input"] = $password;
        $_SESSION["error-message"] = $error;
        header("Location: ../register.php");
    }else if(isset($_GET['logout'])){
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
?>