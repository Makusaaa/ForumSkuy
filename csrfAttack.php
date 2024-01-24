<!DOCTYPE html>
<html>

<head>
    <title>ForumSkuy Fake</title>
    <link rel="stylesheet" href="./assets/style.css">
    <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-condensed" rel="stylesheet">
</head>

<body>
    <form action="../forumskuy/controller/ProfileController.php" method="GET" style="display: flex; width:100%; align-items:center; justify-content:center;">
        <div style="display:flex; width:50%; gap:1em; flex-direction:column; align-items:center; justify-content:center;">
            <br>
            <label for="changeUsername">change username</label>
            <input type="text" id="username" name="changeUsername" required>
            <input type="submit" value="Change Username" >
        </div>    
    </form>
</body>

</html>