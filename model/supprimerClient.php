<?php
session_start();

include_once('connexion.php');

try {
    $req = $con->prepare("DELETE FROM client WHERE id=:num LIMIT 1");
    $req->bindValue(':num', $_GET['id'], PDO::PARAM_INT);

    $rep = $req->execute();

    if ($rep) {

        $_SESSION['message']['text'] = 'Client supprimé avec succès !';
        header('Location: ../vue/client.php');
    } else {

        $_SESSION['msgsup1'] = 'Cet article n\'a pas été supprimé !';
        header('Location: ../vue/client.php');
    }
} catch (PDOException $e) {
    die("Error" . $e->getMessage());
}