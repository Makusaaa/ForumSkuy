<?php
    session_start();
    require("./connection.php");

    var_dump($_SESSION);

    if(isset($_GET["changeprofpic"])){
        $attachment = $_FILES['img'];
        $fileinfo = pathinfo($attachment["name"]);
        $extension = $fileinfo['extension'];
        
        var_dump($attachment);
        echo "<br>";
        var_dump($fileinfo);
        echo "<br>";
        var_dump($extension);
        echo "<br>";
        if(in_array($extension,['jpg','png','jpeg','webp'])){
            $newfilename = strtolower($_SESSION["username"]).".".$extension;
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
                echo '$_SESSION["picture"] . <br>';
                echo '$newfilename . <br>';
                echo '$target . <br>';
                // header("Location: ../profile.php");
                // exit();
            }else{
                $error = "File upload failed!";
            };
        }else{
            $error = "File extension must be either jpg, png, jpeg or webp!";
        }
        $_SESSION["error-message"] = $error;
        // header("Location: ../profile.php");
    }
    else if(isset($_GET["changeUsername"])){
        $id = $_SESSION["id"];
        $usernameTobe = $_GET["changeUsername"];

        $safeUsernameTobe = $db->real_escape_string($usernameTobe);
        $queryCheckUsername = "SELECT * FROM users where id = ?";
        $safeQuery = $db->prepare($queryCheckUsername);
        $safeQuery->bind_param("d", $id);
        $safeQuery->execute();
        // $db->close();
        $result = $safeQuery->get_result();

        
        if(isset($_SESSION["csrf"]) == isset($_GET["csrf_token"])){
            if(time() >= $_SESSION["csrf_expire"]){
                header("location: ../profile.php");
                exit(); 
            } 
            if($result->num_rows == 1){//user is exist
                $queryChangeUsername = "UPDATE users set username = '$usernameTobe' where id = $id";
                $result = $db->query($queryChangeUsername);
                if($result){
                    $_SESSION["changes_username"] = "username is changed";
                    $_SESSION["username"] = $usernameTobe;
                }else{
                    $_SESSION["changes_username"] = "username is not changed";
                }
            }else{
                $_SESSION["changes_username"] = "user not found";
            }
        }else{
            $_SESSION["changes_username"] = "somethings wrong";
            print_r("somethings wrong");
        }
        header("location: ../profile.php");
    }

//     else if(isset($_GET["changeUsername"])){ // csrf vuln
//         $id = $_SESSION["id"];
//         $usernameTobe = $_GET["changeUsername"];

//         $safeUsernameTobe = $db->real_escape_string($usernameTobe);
//         $queryCheckUsername = "SELECT * FROM users where id = ?";
//         $safeQuery = $db->prepare($queryCheckUsername);
//         $safeQuery->bind_param("d", $id);
//         $safeQuery->execute();
//         // $db->close();
//         $result = $safeQuery->get_result();

        
//         if($result->num_rows == 1){//user is exist
//             $queryChangeUsername = "UPDATE users set username = '$usernameTobe' where id = $id";
//             $result = $db->query($queryChangeUsername);
//             if($result){
//                 $_SESSION["changes_username"] = "username is changed";
//                 $_SESSION["username"] = $usernameTobe;
//             }else{
//                 $_SESSION["changes_username"] = "username is not changed";
//             }
//         }else{
//             $_SESSION["changes_username"] = "user not found";
//         }
//         header("location: ../profile.php");
// }
    
?>