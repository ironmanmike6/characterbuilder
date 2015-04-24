<?php
$login = false;
require_once "../lib/site.inc.php";

unset($_SESSION['lostpass-error']);

if($_POST['secret'] !== "super477") {
    $_SESSION['lostpass-error'] = "Invalid secret!";
    header("location: ../lostpassword.php");
    exit;
}

$lp = new LostPasswords($site);
$msg = $lp->newLostPassword(
    strip_tags($_POST['user']),
    strip_tags($_POST['password1']),
    strip_tags($_POST['password2']),
    new Email());

if($msg !== null) {
    $_SESSION['lostpass-error'] = $msg;
    header("location: ../lostpassword.php");
    exit;
}

header("location: ../validating.php");
exit;