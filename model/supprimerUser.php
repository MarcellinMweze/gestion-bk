<?php
session_start();

include_once('connexion.php');

try {
    $req = $con->prepare("DELETE FROM utilisateur WHERE id=:num LIMIT 1");
    $req->bindValue(':num', $_GET['id'], PDO::PARAM_INT);

    $rep = $req->execute();

    if ($rep) {

        $_SESSION['message']['text'] = 'Client supprimé avec succès !';
        $_SESSION['message']['type'] = 'success';
        header('Location: ../vue/utilisateur.php');
        
    } else {

        $_SESSION['message']['text'] = 'Cet article n\'a pas été supprimé !';
        $_SESSION['message']['type'] = 'danger';
        header('Location: ../vue/utilisateur.php');
    }
} catch (PDOException $e) {
    die("Error" . $e->getMessage());
}