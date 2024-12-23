<?php
session_start();

include_once 'connexion.php';

if(!empty($_GET['idVente'])&&
   !empty($_GET['idArticle'])&&
   !empty($_GET['quantite'])){

    $sql="UPDATE vente SET etat=? WHERE id=?";
    $req=$con->prepare($sql);

    $req->execute(array(0,$_GET['idVente']));

    if($req->rowCount()!=0){
        $sql="UPDATE article SET quantite=quantite+? WHERE id=?";
        $req=$con->prepare($sql);

        $req->execute(array(($_GET['quantite']),$_GET['idArticle']));
        $_SESSION['message']['text']='Vente annulée avec succès !';
        $_SESSION['message']['type']='success';
    }

   }

   header('Location: ../vue/afficheVente.php');