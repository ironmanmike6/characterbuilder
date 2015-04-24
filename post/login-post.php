<?php
$login = true;
require '../lib/dnd.inc.php';

if(isset($_POST['user']) && isset($_POST['password'])) {
    $users = new Users($site);

    $user = $users->login($_POST['user'], $_POST['password']);
    if($user !== null) {
        $_SESSION['user'] = $user;
        header("location: ../");
        exit;
    }
}
header("location: ../login.php");