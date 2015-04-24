<?php
require 'format.inc.php';
require 'lib/dnd.inc.php';
$view = new SpellsView($site,$_REQUEST);
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>5e Spell List</title>
    <link href="dnd.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php echo createHeader() ?>
<p>
<div class="main">
    <div class="sortbar">
        <h2>Sorting Forwards: <a href="./spells.php?sort=0">Alphabetical</a> <a href="./spells.php?sort=2">Level</a> <a href="./spells.php?sort=3">School</a> <a href="./spells.php?sort=4">School & Level</a>  </h2>
        <h2>Sorting Backwards: <a href="./spells.php?sort=0&reverse=true">Alphabetical</a> <a href="./spells.php?sort=2&reverse=true">Level</a> <a href="./spells.php?sort=3&reverse=true">School</a> <a href="./spells.php?sort=4&reverse=true">School & Level</a>  </h2>
    </div>
    <?php
    echo $view->presentSpells()
    ?>

</div>
</p>
<?php echo footer() ?>
</body>
</html>