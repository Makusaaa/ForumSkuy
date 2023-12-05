<?php
    session_start();
    if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"]){
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="./assets/style.css">
        <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-condensed" rel="stylesheet">
        <title>Login</title>
    </head>
    <body>
        <form class="logbar" action="/controller/AuthController.php" method="POST"> 
            <img src="src/logo.png" alt="">   
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="login"><b>Login</b></button>
        </form>
        <?php if(isset($_SESSION["error-message"])){ ?>
            <p style="margin-top:28px;;margin-bottom:-30px;text-align:center"><?=$_SESSION["error-message"]?></p>
        <?php   unset($_SESSION["error-message"]); } ?>
    </body>
</html>