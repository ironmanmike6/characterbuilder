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
    <h2>Login</h2>
    <form method="post" action="post/newuser-post.php">
        <?php
        if(isset($_SESSION['newuser-error'])) {
            echo "<p>" . $_SESSION['newuser-error'] . "</p>";
            unset($_SESSION['newuser-error']);
        }
        ?>
        <p>
            <label for="user">User ID:</label><br>
            <input type="text" id="userid" name="userid"></p>
        <p><label for="name">Name:</label><br>
            <input type="text" id="name" name="name">
        </p>
        <p><label for="email">Email:</label><br>
            <input type="text" id="email" name="email">
        </p>
        <p><label for="password1">Password:</label><br>
            <input type="password" id="password1" name="password1">
        </p>
        <p><label for="password2">Verify Password:</label><br>
            <input type="password" id="password2" name="password2">
        </p>
        <p><label for="secret">Secret:</label><br>
            <input type="password" id="secret" name="secret">
        </p>
        <p><input type="submit"></p>
        <p><a href="login.php">Return to Login</a></p>
    </form>
</div>
</p>
<?php echo footer() ?>
</body>
</html>