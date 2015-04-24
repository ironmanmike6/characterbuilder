<?php
require 'format.inc.php';
//require 'lib/dnd.inc.php';
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>5e Login</title>
    <link href="dnd.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php echo createHeader() ?>
<p>

<div id="login">
<form method="post" action="post/login-post.php">
    <h2>Login</h2>
    <p>
        <label for="user">User name or Email:</label><br>
        <input type="text" id="user" name="user"></p>
    <p><label for="password">Password:</label><br>
        <input type="password" id="password" name="password">
    </p>
    <p><input type="submit"></p>
    <p><a href="newuser.php">New User</a> <p><a href="lostpassword.php">Forgotten Password?</a></p></p>
    </form>
</div>
</p>
<?php echo footer() ?>
</body>
</html>