<?php

session_start();

unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_email']);
unset($_SESSION['user_pass']);
unset($_SESSION['user_access_level']);

session_destroy();

echo "<script>window.location.href = '../pages/login.php'</script>";
// header('Location: ../pages/login.php');
