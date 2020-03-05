<?php

session_start();

require_once '../classes/DB.php';


$DB = DB::getConn();

$query = "SELECT emailUsuario, senhaUsuario 
          FROM tbusuario 
          WHERE emailUsuario = '" . $_POST['email'] . "' AND senhaUsuario = '" . $_POST['pass'] . "';";

$stmt = $DB->query($query);
$result = $stmt->fetchAll();

if(count($result)) {
    $_SESSION['user_id'] = $result['idUsuario'];
    $_SESSION['user_name'] = $result['nomeUsuario'];
    $_SESSION['user_email'] = $result['emailUsuario'];
    $_SESSION['user_pass'] = $result['senhaUsuario'];
    $_SESSION['user_access_level'] = $result['idNivelAcesso'];

    header('Location: ../pages/home.php');
} else {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_pass']);
    unset($_SESSION['user_access_level']);
    session_destroy();

    header('Location: ../index.php?invalid=true');
}