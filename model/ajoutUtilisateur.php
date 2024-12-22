<?php
session_start();
include_once 'connexion.php';

if(!empty($_POST['nom']) 
    && !empty($_POST['passw'])
    && !empty($_POST['priorite'])){
    $sql="INSERT INTO utilisateur(nom,passw,priorite) VALUES (?,?,?)";
    $req=$con->prepare($sql);

    $req->execute(array(
       $_POST['nom'],
       $_POST['passw'],
       $_POST['priorite']
    ));

    if($req->rowCount()!=0){
        $_SESSION['message']['text']='Utilisateur ajouté avec succès !';
        $_SESSION['message']['type']='success';
    }else{
        $_SESSION['message']['text']="Une erreur s'est produite lors de l'envoie";
        $_SESSION['message']['type']='danger';
    }
}else{
    $_SESSION['message']['text']="Veuillez remplir tous les champs svp";
    $_SESSION['message']['type']='danger';
}

header("Location:../vue/utilisateur.php");