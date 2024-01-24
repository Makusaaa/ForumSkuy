<?php
    session_start();
    require("./connection.php");

    if(isset($_POST["createpost"])){
        $userid = $_SESSION["id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $datetime = date('Y-m-d H:i:s');

        if(strlen($title)==0 || strlen($content)==0){
            header("Location: ../index.php");
        }else{
            //MYSQLi unsecure way
            $query = "INSERT INTO `posts`(`id`, `userid`, `title`, `content`, `datetime`) VALUES (NULL, '$userid', '$title', '$content', '$datetime')";
            $statement = $db->query($query);
            var_dump($statement);
            $statement->execute();
            var_dump($statement);
            exit();

            // $query = "INSERT INTO `posts`(`id`, `userid`, `title`, `content`, `datetime`) VALUES (NULL,?,?,?,?);";
            // $statement = $db->prepare($query);
            // $title = $db->real_escape_string($title); //anticipate1
            // $statement->bind_param("ssss",$userid,$title,$content,$datetime);
            // $statement->execute();
            $db->close();
            header("Location: ../index.php");
        }
    }else if(isset($_POST["createcomment"])){
        $userid = $_SESSION["id"];
        $content = $_POST["content"];
        $commentid = $_POST["commentid"];
        $datetime = date('Y-m-d H:i:s');
        if(strlen($content)==0){
            header("Location: ../index.php");
        }else{
            $query = "INSERT INTO `comments`(`id`, `userid`, `commentid`, `content`, `datetime`) VALUES (NULL,?,?,?,?);";
            $statement = $db->prepare($query);
            $statement->bind_param("ssss",$userid,$commentid,$content,$datetime);
            $statement->execute();
            $db->close();
            header("Location: ../index.php");
        }
    }
?>