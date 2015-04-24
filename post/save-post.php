<?php
require '../lib/dnd.inc.php';

$char = $user->getCurrentCharacter();
$controller = new SaveController($user,  $site );
$controller->saveCharacter();

header("location: ../builder.php");