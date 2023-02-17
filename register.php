<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-condensed" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <form class="logbar" action="/controller/Register.php" method="POST"> 
        <img src="src/logo.png" alt="">   
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="password" placeholder="Password">
        <button type="submit"><b>Register</b></button>
    </form>
    <?php if(@$_GET["error"]){?>
        <p style="margin-top:28px;;margin-bottom:-30px;text-align:center"><?=$_GET["error"]?></p>
    <?php } ?> 
</body>
</html>