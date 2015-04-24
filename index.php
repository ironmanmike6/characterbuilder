<?php
require 'format.inc.php';
require 'lib/dnd.inc.php';
$view = new IndexView($site, $user);
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

<div class="index">
<form  method="post" action="post/selectchar-post.php">
    <?php echo $view->presentCharacters();
    ?>


</form>
    <a href="newcharacter.php">New Character</a>
</div>
</p>
<?php echo footer() ?>
</body>
</html>