<?php
require 'format.inc.php';
require 'lib/dnd.inc.php';
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>New 5e Character</title>
    <link href="dnd.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php echo createHeader() ?>
<p>

<div class="index">
<form method="post" action="post/newcharacter-post.php">
    <div class="info">
        <select name="copychar" size="1em">
            <option value="nothing">Select Character</option>
            <option value="c1">Dan - 15 Bard</option>
            <option value="c2">Rextall - 20 Multiclass</option>
        </select>
        <input type="submit" value="Copy Character" id="copy" name="copy">
    </div>
    <div>

        <div class="error">
            <?php if(isset($_REQUEST['error'])) {
                echo "Please enter a character name";
            } ?>
        </div>

    </div>
    <div class = "info">


        <input type="text" size=18em id="newchar" name="newchar"> <input type="submit" value="New Character" id="new" name="new">

    </div>
</form>


</div>
</p>
<?php echo footer() ?>
</body>
</html>