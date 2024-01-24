<?php
    session_start();
    if($_SESSION["isLogin"] == false){
        header("Location: ../index.php");
    }

    $_SESSION["csrf"] = bin2hex(random_bytes(32));
    $_SESSION["csrf_expire"] = time() + 3600;
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
        
        <form action="controller/ProfileController.php" method="GET" style="display: flex; width:100%; align-items:center; justify-content:center;">
            <div style="display:flex; width:50%; gap:1em; flex-direction:column; align-items:center; justify-content:center;">
                <br>
                <label for="changeUsername">change username</label>
                <input type="text" id="username" name="changeUsername" required>
                <input type="text" name="csrf_token" value="<?=$_SESSION["csrf"]?>" style="display:none"> <!--anti crsf method1-->
                <input type="submit" value="Change Username" >
            </div>    
            
        </form>

        <a class="profilebutton" href="controller/AuthController.php?logout" style="margin-top: 2em;">Log Out</a>
    </div>
    <?php if(isset($_SESSION["error-message"])){ ?>
        <p style="margin-top:28px;;margin-bottom:-30px;text-align:center"><?=$_SESSION["error-message"]?></p>
    <?php   unset($_SESSION["error-message"]); } ?>

    <?php if(isset($_SESSION["changes_username"])){ ?>
        <p style="margin-top:28px;;margin-bottom:-30px;text-align:center"><?=$_SESSION["changes_username"]?></p>
    <?php   unset($_SESSION["changes_username"]); } ?>
</body>
</html>