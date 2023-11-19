<?php
    if(file_exists("./config/database.php")){
        require "./config/database.php";
    }else{
        require "../config/database.php";
    }
    
    $db = new mysqli(
        $config["server"],
        $config["username"],
        $config["password"],
        $config["database"]
    );
?>
    