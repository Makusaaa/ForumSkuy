<?php
    session_start();
    $username = $_SESSION["username"];
    $file = pathinfo($_FILES["img"]["name"]);
    $ext = $file["extension"];
    $target = "../src/".strtolower($username).".".$ext;
    unlink("../src/".strtolower($username)."."."jpg");
    unlink("../src/".strtolower($username)."."."png");
    
    move_uploaded_file($_FILES["img"]['tmp_name'],$target);
    $_SESSION["picture"] = strtolower($username).".".$ext;
    $picture = $_SESSION["picture"];
    $con = mysqli_connect('localhost', 'root', '', 'forumskuy', 3306);
    $con->query("UPDATE `users` SET `picture`= '$picture' WHERE `username` = '$username'");
    header("Location: ../profile.php");
?>