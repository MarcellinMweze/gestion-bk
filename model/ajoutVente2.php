<?php
session_start();
include_once 'connexion.php';
include_once 'function.php';

if(!empty($_POST['id_article'])
    && !empty($_POST['id_client'])
    && !empty($_POST['quantite'])
    && !empty($_POST['prix'])){
    


    $articles=getArticle($_POST['id_article']);

    if(!empty($articles) && is_array($articles)){
        if($articles['quantite']<$_POST['quantite']){
        $_SESSION['message']['text']="Cette quantite n'est pas disponible en stock! "." "."(Le Stock est de : ".$articles['quantite']." Caisses)";
        $_SESSION['message']['type']='danger';

        }else{
            $sql="INSERT INTO vente(id_article,id_client,quantite,prix) VALUES (?,?,?,?)";
            $rep=$con->prepare($sql);

            $rep->execute(array(
            $_POST['id_article'],
            $_POST['id_client'],
            $_POST['quantite'],
            $_POST['prix']));

            if($rep->rowCount()!=0){

                $sql="UPDATE article SET quantite=quantite-? WHERE id=?";
                $rep=$con->prepare($sql);

                    $rep->execute(array(
                    $_POST['quantite'],
                    $_POST['id_article']));

                if($rep->rowCount()!=0){
                $_SESSION['message']['text']='Vente effectuée avec succès !';
                $_SESSION['message']['type']='success';

                }else{
                $_SESSION['message']['text']="Impossible d'effectuer cette vente !";
                $_SESSION['message']['type']='danger';
                }
            }else{
                $_SESSION['message']['text']="Une Erreur s'est produite pendant l'opération !";
                $_SESSION['message']['type']='danger';
         }
        }
    }
}else{
    $_SESSION['message']['text']="Veuillez remplir tous les champs svp";
    $_SESSION['message']['type']='danger';
}

header("Location:../vue/use.php");