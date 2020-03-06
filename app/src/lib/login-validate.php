<?php

session_start();

if(!(isset($_SESSION['user_id'])))
    echo "<script>window.location.href = '../pages/login.php?invalid=true'</script>";

if (!strcmp(basename($_SERVER['PHP_SELF']), 'painel.php') && $_SESSION['user_access_level'] < 2)
    header('Location: home.php?no-permission');

if (isset($_GET['no-permission']))
    echo "<script>alert('Acesso restrito! Você não tem permissão para acessar esta página.')</script>";


if (isset($_POST['email']) && isset($_POST['senha'])) {


    require_once '../classes/DB.php';

    $Conn = DB::getConn();

    $query = "SELECT idUsuario, nomeUsuario, emailUsuario, senhaUsuario, idNivelAcesso
          FROM tbUsuario 
          WHERE emailUsuario = :email AND senhaUsuario = :senha";

    $query = $Conn->prepare($query);
    $query->bindValue(':email', $_POST['email']);
    $query->bindValue(':senha', $_POST['senha']);
    $query->execute();
    $result = $query->fetchAll();

    if (count($result)) {
        $_SESSION['user_id'] = $result[0]['idUsuario'];
        $_SESSION['user_name'] = $result[0]['nomeUsuario'];
        $_SESSION['user_email'] = $result[0]['emailUsuario'];
        $_SESSION['user_pass'] = $result[0]['senhaUsuario'];
        $_SESSION['user_access_level'] = $result[0]['idNivelAcesso'];

        header('Location: ../pages/home.php');
    } else {
        // echo "<script>window.location.href = '../pages/login.php?invalid=true'</script>";
        header('Location: ../pages/login.php?invalid=true');
    }
}
