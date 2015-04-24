<?php
require_once "../lib/dnd.inc.php";



print_r($_POST);

$factory = new CharacterFactory();
$char = $factory->create();


if(isset($_POST['newchar'])) {
    if($_POST['newchar'] === "") {
        header("location: ../newcharacter.php?error=name");
    }
    $char->setName(strip_tags($_POST['newchar']));
}



$user->setCurrentCharacter($char);

header("location: ../builder.php");