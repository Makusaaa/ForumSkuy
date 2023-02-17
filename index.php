<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'forumskuy', 3306);
    $data = [];

    if ($con->error){
        echo $con->error;
    }else{
        $result = $con->query("SELECT * FROM posts a JOIN users b ON b.id = a.userid ORDER BY datetime DESC");
        while($row = $result->fetch_assoc()) array_push($data, $row);
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>ForumSkuy</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-condensed" rel="stylesheet">
</head>

<body>
    <nav class="navbar">
        <img src="src/logo.png" alt="logo" style="height:60px">
        <div class="navbutts">
            <?php if(@$_SESSION["isLogin"]){?>
            <div class="profbutt">
                <div>
                    <p><?= $_SESSION["username"]?></p>
                    <a href="controller/Logout.php">Log Out</a>
                </div>
                <a href="profile.php" class="profpic"><img src="src/<?=$_SESSION["picture"]?>" alt="icon"></a>
            </div>
            <?php }else{ ?>
            <a href="login.php" class="navbutton">Login</a>
            <a href="register.php" class="navbutton">Register</a>
            <?php } ?>
        </div>
    </nav>
    <?php if(@$_SESSION["isLogin"]){?>
        <form class="makepostbox" action="controller/Createpost.php" method="POST">
            <b>Create a post!</b>
            <input type="text" name="title" id="title" placeholder="Your title" cols="45" rows="5">
            <textarea type="text" name="content" id="content" placeholder="Write something up...."></textarea>
            <button type="submit">Post!</button>
        </form>
    <?php } ?>

    <?php foreach($data as $d){?>
    <div class="postbox">
        <div class="postprofile">
            <img src="src/<?=$d["picture"]?>" alt="icon">
            <div>
                <p class="postusername"><?=$d["username"]?></p>
                <p class="postdatetime"><?=$d["datetime"]?></p>
            </div>
        </div>
        <div class="postcontent">
            <b><?=$d["title"]?></b>
            <p><?=$d["content"]?></p>
        </div>
    </div>
    <?php }?>
</body>

</html>