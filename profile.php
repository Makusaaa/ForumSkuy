<?php
    session_start();
    if($_SESSION["isLogin"] == false){
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
    <div class="profile">
        <a href="index.php" class="backbutton">←</a>
        <p class="user"><?=$_SESSION["username"]?></p>
        <img src="src/<?=$_SESSION["picture"]?>" alt="">
        <form action="controller/ProfileController.php?changeprofpic" method="POST" enctype="multipart/form-data">
            <label for="img" class="profilebutton">Change Profile Picture</label>
            <input type="file" onchange="form.submit()" id="img" name="img" style="display:none">
        </form>
        <a class="profilebutton" href="controller/AuthController.php?logout">Log Out</a>
    </div>
    <?php if(isset($_SESSION["error-message"])){ ?>
        <p style="margin-top:28px;;margin-bottom:-30px;text-align:center"><?=$_SESSION["error-message"]?></p>
    <?php   unset($_SESSION["error-message"]); } ?>
</body>
</html>