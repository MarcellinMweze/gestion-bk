<?php
session_start();
include_once 'connexion.php';

if(!empty($_POST['nom_client']) 
    && !empty($_POST['phone'])
    &&!empty($_POST['id'])){

    $sql="UPDATE client SET nom_client=?,phone=? WHERE id=?";
    $req=$con->prepare($sql);

    $req->execute(array(
       $_POST['nom_client'],
       $_POST['phone'],
       $_POST['id']
    ));

    if($req->rowCount()!=0){
        $_SESSION['message']['text']='Client modifié avec succès !';
        $_SESSION['message']['type']='success';
    }else{
        $_SESSION['message']['text']="Rien n'a été modifié !";
        $_SESSION['message']['type']='warning';
    }
}else{
    $_SESSION['message']['text']="Veuillez remplir tous les champs svp";
    $_SESSION['message']['type']='danger';
}

header("Location:../vue/client.php");