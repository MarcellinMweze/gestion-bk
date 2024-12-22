<?php
session_start();
include_once 'connexion.php';

if(!empty($_POST['nom_client']) 
    && !empty($_POST['phone'])){
    $sql="INSERT INTO client(nom_client,phone) VALUES (?,?)";
    $req=$con->prepare($sql);

    $req->execute(array(
       $_POST['nom_client'],
       $_POST['phone']
    ));

    if($req->rowCount()!=0){
        $_SESSION['message']['text']='Client ajouté avec succès !';
        $_SESSION['message']['type']='success';
    }else{
        $_SESSION['message']['text']="Une erreur s'est produite lors de l'envoie";
        $_SESSION['message']['type']='danger';
    }
}else{
    $_SESSION['message']['text']="Veuillez remplir tous les champs svp";
    $_SESSION['message']['type']='danger';
}
    header("Location:../vue/client.php");
