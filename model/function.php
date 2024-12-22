<?php
include_once 'connexion.php';

function getArticle($id=null){
    if(!empty($id)){
    $sql="SELECT * FROM article WHERE id=?";

    $req=$GLOBALS['con']->prepare($sql);

    $req->execute(array($id));

    return $req->fetch();
    }else{
    $sql="SELECT * FROM article";

    $req=$GLOBALS['con']->prepare($sql);

    $req->execute();

    return $req->fetchAll();
    }
}

function getClient($id=null){
    if(!empty($id)){
    $sql="SELECT * FROM client WHERE id=?";

    $req=$GLOBALS['con']->prepare($sql);

    $req->execute(array($id));

    return $req->fetch();
    }else{
    $sql="SELECT * FROM client";

    $req=$GLOBALS['con']->prepare($sql);

    $req->execute();

    return $req->fetchAll();
    }
}

function getVente(){
    $sql="SELECT nom_article, nom_client, v.quantite, prix, date_v FROM client AS c, vente AS v, article AS a WHERE v.id_article=a.id AND v.id_client=c.id";

    $req=$GLOBALS['con']->prepare($sql);

    $req->execute();

    return $req->fetchAll();
}

function getUser($id=null){
    if(!empty($id)){
        $sql="SELECT * FROM utilisateur WHERE id=?";

        $req=$GLOBALS['con']->prepare($sql);

        $req->execute(array($id));

    return $req->fetch();
    }else{
        $sql="SELECT * FROM utilisateur";

        $req=$GLOBALS['con']->prepare($sql);

        $req->execute();

        return $req->fetchAll();
        }
}