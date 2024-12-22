<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "gestionbk";


$con = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpassword);

if ($con == null) {
    die("Erreur de connexion");
}