<?php
session_start();

$_SESSION['etatConnexion'] = false;
unset($_SESSION['etatConnexion']);

header('Location:../index.php');