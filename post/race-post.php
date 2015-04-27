<?php
require '../lib/dnd.inc.php';

var_dump($_POST);
$char = $user->getCurrentCharacter();
$race = $_POST['race'];
$subrace = $_POST['subrace'];
$controller = new RaceController($race,$subrace, $char, $site);
$controller->setRace();

//var_dump($char);

//header("location: ../builder.php");
header("location: save-post.php");