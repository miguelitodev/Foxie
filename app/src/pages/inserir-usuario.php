<?php

require_once '../classes/DB.php';
require_once '../classes/User.php';

$User = new User();

$User->setName($_POST['nome']);
$User->setEmail($_POST['email']);
$User->setPass($_POST['senha']);
$User->setAccessLevel($_POST['nivel']);

$User->insert();
