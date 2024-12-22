<?php
session_start();
include_once 'connexion.php';

if(!empty($_POST['nom_article']) 
    && !empty($_POST['quantite'])
    && !empty($_POST['prix_unit'])){
    $sql="INSERT INTO article(nom_article,quantite,prix_unit) VALUES (?,?,?)";
    $req=$con->prepare($sql);

    $req->execute(array(
       $_POST['nom_article'],
       $_POST['quantite'],
       $_POST['prix_unit']
    ));

    if($req->rowCount()!=0){
        $_SESSION['message']['text']='Article ajouté avec succès !';
        $_SESSION['message']['type']='success';
    }else{
        $_SESSION['message']['text']="Une erreur s'est produite lors de l'envoie";
        $_SESSION['message']['type']='danger';
    }
}else{
    $_SESSION['message']['text']="Veuillez remplir tous les champs svp";
    $_SESSION['message']['type']='danger';
}

header("Location:../vue/article.php");