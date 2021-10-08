<?php
include_once("api/settings.php");
Login::userLogin();

session_start() or die('Você não está logado!');

if ($_SESSION['username'] != $username) {
    header('Location: index.php');
}


include_once("includes/header.php");
?>
