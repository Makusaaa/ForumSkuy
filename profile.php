<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-condensed" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="profile">
        <a href="index.php" class="backbutton">←</a>
        <p class="user"><?=$_SESSION["username"]?></p>
        <img src="src/<?=$_SESSION["picture"]?>" alt="">
        <form action="controller/Changeprofpic.php" method="POST" enctype="multipart/form-data">
            <label for="img" class="profilebutton">Change Profile Picture</label>
            <input type="file" onchange="form.submit()" id="img" name="img" style="display:none">
        </form>
        <a class="profilebutton" href="controller/Logout.php">Log Out</a>
    </div>
</body>
</html>