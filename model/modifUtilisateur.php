<?php
session_start();
include_once 'connexion.php';

if(!empty($_POST['nom']) 
    && !empty($_POST['passw'])
    && !empty($_POST['priorite'])
    &&!empty($_POST['id'])){

    $sql="UPDATE utilisateur SET nom=?,passw=?,priorite=? WHERE id=?";
    $req=$con->prepare($sql);

    $req->execute(array(
       $_POST['nom'],
       $_POST['passw'],
       $_POST['priorite'],
       $_POST['id']
    ));

    if($req->rowCount()!=0){
        $_SESSION['message']['text']='Utilisateur modifié avec succès !';
        $_SESSION['message']['type']='success';
    }else{
        $_SESSION['message']['text']="Rien n'a été modifié !";
        $_SESSION['message']['type']='warning';
    }
}else{
    $_SESSION['message']['text']="Veuillez remplir tous les champs svp";
    $_SESSION['message']['type']='danger';
}

header("Location:../vue/utilisateur.php");