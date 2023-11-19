<?php
    session_start();
    require("./connection.php");

    if(isset($_GET["createpost"])){
        $userid = $_SESSION["id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $datetime = date('Y-m-d H:i:s');

        if(strlen($title)==0 || strlen($content)==0){
            header("Location: ../index.php");
        }else{
            $query = "INSERT INTO `posts`(`id`, `userid`, `title`, `content`, `datetime`) VALUES (NULL,?,?,?,?);";
            $statement = $db->prepare($query);
            $statement->bind_param("ssss",$userid,$title,$content,$datetime);
            $statement->execute();
            $db->close();
            header("Location: ../index.php");
        }
    }
?>