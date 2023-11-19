<?php
    session_start();
    if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"]){
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-condensed" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <form class="logbar" action="/controller/AuthController.php" method="POST"> 
        <img src="src/logo.png" alt="">   
        <input type="text" name="username" placeholder="Username" value="<?php if(isset($_SESSION["username-input"])){
                                                                                    echo $_SESSION["username-input"];
                                                                                    unset($_SESSION["username-input"]);} ?>">
        <input type="password" name="password" placeholder="Password" value="<?php if(isset($_SESSION["password-input"])){
                                                                                    echo $_SESSION["password-input"];
                                                                                    unset($_SESSION["password-input"]);} ?>">
        <button type="submit" name="register"><b>Register</b></button>
    </form>
    <?php if(isset($_SESSION["error-message"])){ ?>
        <p style="margin-top:28px;;margin-bottom:-30px;text-align:center"><?=$_SESSION["error-message"]?></p>
    <?php   unset($_SESSION["error-message"]); } ?>
</body>
</html>