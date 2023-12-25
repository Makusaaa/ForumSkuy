<?php
    session_start();
    require("./connection.php");
    require("./csrf.php");

    if(isset($_GET["changeprofpic"])){
        $attachment = $_FILES['img'];
        $fileinfo = pathinfo($attachment["name"]);
        $extension = $fileinfo['extension'];
        $csrf_token = $_POST["csrf-token"];
        if(!checkCSRF($csrf_token)){
            header("Location: ../profile.php");
            exit;
        }
        
        if(in_array($extension,['jpg','png','jpeg','webp'])){
            $newfilename = strtolower($_SESSION["username"]).uniqid().".".$extension;
            $target = "../src/".$newfilename;
            if($_SESSION["picture"] != "default.jpg"){
                unlink("../src/".$_SESSION["picture"]);
            }
            if(move_uploaded_file($attachment['tmp_name'],$target)){
                echo $_SESSION["picture"];
                $_SESSION["picture"] = $newfilename;
                $query = "UPDATE users SET picture=? WHERE id=?;";
                $statement = $db->prepare($query);
                $statement->bind_param("ss",$newfilename,$_SESSION["id"]);
                $statement->execute();
                $db->close();
                echo $_SESSION["picture"];
                echo $newfilename;
                echo $target;
                header("Location: ../profile.php");
                exit();
            }else{
                $error = "File upload failed!";
            };
        }else{
            $error = "File extension must be either jpg, png, jpeg or webp!";
        }
        $_SESSION["error-message"] = $error;
        header("Location: ../profile.php");
    }
?>