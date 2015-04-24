<?php
require '../lib/dnd.inc.php';

unset($_SESSION['user']);
header('location: ../login.php');