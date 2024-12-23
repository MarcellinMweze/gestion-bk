<?php
session_start();

if (empty(@$_SESSION['etatConnexion'])) {
    header('Location:../index.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Stock-</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
    include_once 'entete.php';
    ?>
    <div class="s-nagivation">
        <h3>Menu</h3>
        <div class="navigation">
            <div class="nav-liens">
            <a href="article.php"><i class="fa-solid fa-square-plus"></i> Nouveau Produit</a>
            </div>
            <div class="nav-liens">
            <a href=""><i class="fa-solid fa-file-circle-plus"></i>Nouvelle Entrée</a>
            </div>
            <div class="nav-liens">
            <a href="vente.php"><i class="fa-brands fa-shopify"></i> Nouvelle Vente</a>
            </div>
            <div class="nav-liens">
            <a href="utilisateur.php"><i class="fa-solid fa-user-plus"></i>Ajouter Utilisateur</a>
            </div>
            <div class="nav-liens">
            <a href="client.php"><i class="fa-solid fa-person-circle-plus"></i></i>Ajouter Client</a>
            </div>
            <div class="nav-liens">
            <a href="articleMod.php"><i class="fa-solid fa-pen"></i> Modifier Produit</a>
            </div>
            <div class="nav-liens">
            <a href="afficheVente.php"><i class="fa-solid fa-pen-to-square"></i> Modifier Vente</a>
            </div>
            <div class="nav-liens">
            <a href=""><i class="fa-solid fa-chart-line"></i> Tableau de Bord</a>
            </div>
            <div class="nav-liens">
            <a href="../model/deconnexion.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</a>
            </div>
        </div>
    </div>
    </div>
</body>
</html>