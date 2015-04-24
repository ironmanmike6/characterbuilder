<?php
require_once "../lib/dnd.inc.php";



//print_r($_POST);
//$char = new Character();

$controller = new SelectCharacterController($_POST, $site, $user);
$controller->setCurrentCharacter();


header("location: ../builder.php");