<?php
session_start();
include_once 'connexion.php';

if(!empty($_POST['nom_article']) 
    && !empty($_POST['quantite'])
    && !empty($_POST['prix_unit'])
    &&!empty($_POST['id'])){

    $sql="UPDATE article SET nom_article=?,quantite=?,prix_unit=? WHERE id=?";
    $req=$con->prepare($sql);

    $req->execute(array(
       $_POST['nom_article'],
       $_POST['quantite'],
       $_POST['prix_unit'],
       $_POST['id']
    ));

    if($req->rowCount()!=0){
        $_SESSION['message']['text']='Produit modifié avec succès !';
        $_SESSION['message']['type']='success';
    }else{
        $_SESSION['message']['text']="Rien n'a été modifié !";
        $_SESSION['message']['type']='warning';
    }
}else{
    $_SESSION['message']['text']="Veuillez remplir tous les champs svp";
    $_SESSION['message']['type']='danger';
}

header("Location:../vue/article.php");