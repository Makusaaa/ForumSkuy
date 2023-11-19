<?php
    session_start();
    require "./controller/connection.php";

    $postdata = $commentdata = [];
    $result1 = $db->query("SELECT picture, username, datetime, title, content, a.id AS commentid FROM posts a JOIN users b ON b.id = a.userid ORDER BY datetime DESC");
    $result2 = $db->query("SELECT picture, username, datetime, content, commentid FROM comments a JOIN users b ON b.id = a.userid ORDER BY datetime ASC");
    while($row = $result1->fetch_assoc()) array_push($postdata, $row);
    while($row = $result2->fetch_assoc()) array_push($commentdata, $row);
?>

<!DOCTYPE html>
<html>

<head>
    <title>ForumSkuy</title>
    <link rel="stylesheet" href="./assets/style.css">
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
                    <a href="controller/AuthController.php?logout">Log Out</a>
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
        <form class="makepostbox" action="controller/PostController.php" method="POST">
            <b>Create a post!</b>
            <input type="text" name="title" id="title" placeholder="Your title" cols="45" rows="5">
            <textarea type="text" name="content" id="content" placeholder="Write something up...."></textarea>
            <button type="submit" name="createpost">Post!</button>
        </form>
    <?php } ?>

    <?php foreach($postdata as $d){?>
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
        <?php
            $commentlist = [];
            $count = 0;
            foreach($commentdata as $c){
                if($c["commentid"] == $d["commentid"]){
                    array_push($c, $commentlist);
                    $count += 1;
                }
            }
            if($count > 0){ ?>
                <hr>
                <div class="postcomment">
                    <p>Comments (<?=$count?>)</p>
                    <?php foreach($commentdata as $cd){ ?>
                        <div class="commentitem">
                            <img src="src/<?=$cd["picture"]?>" alt="icon">
                            <div>
                                <div class="commentsender">
                                    <p class="commentusername"><?=$cd["username"]?></p>
                                    <p class="commentdatetime"><?=$cd["datetime"]?></p>
                                </div>
                                <p class="commentcontent"><?=$cd["content"]?></p>
                            </div>
                        </div>
                    <?php   } ?>
                    </div>
            <?php } ?>
        <?php if(@$_SESSION["isLogin"]){ ?>
            <hr>
            <div class="commentinput">
                <form class="commentitem" action="controller/PostController.php" method="POST">
                    <input type="hidden" name="commentid" value="<?=$d["commentid"]?>">
                    <img src="src/<?=$_SESSION["picture"]?>" alt="icon">
                    <textarea type="text" name="content" id="content" placeholder="Reply something..."></textarea>
                    <button type="submit" name="createcomment">↗</button>
                </form>
            </div>
        <?php } ?>
    </div>
    <?php }?>
</body>

</html>