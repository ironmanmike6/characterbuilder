<?php
require '../lib/dnd.inc.php';

var_dump($_POST);
$char = $user->getCurrentCharacter();
$controller = new StatisticsController($_POST,$char );
$controller->updateStats();

//var_dump($char);

//header("location: ../builder.php");
header("location: save-post.php");