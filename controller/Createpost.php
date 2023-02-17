<?php
    session_start();
    $userid = $_SESSION["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $datetime = date('Y-m-d H:i:s');

    if(strlen($title)==0 || strlen($content)==0){
        header("Location: ../index.php");
    }else{
        $con = mysqli_connect('localhost', 'root', '', 'forumskuy', 3306);
        $con->query("INSERT INTO `posts`(`id`, `userid`, `title`, `content`, `datetime`) VALUES (NULL,'$userid','$title','$content','$datetime')");
        header("Location: ../index.php");
    }
?>