<?php
include_once 'connexion.php';

function getArticle($id=null){
    if(!empty($id)){
    $sql="SELECT * FROM article WHERE id=?";

    $req=$GLOBALS['con']->prepare($sql);

    $req->execute(array($id));

    return $req->fetch();
    }else{
    $sql="SELECT * FROM article ORDER BY nom_article ASC";

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
    $sql="SELECT * FROM client ORDER BY nom_client ASC";

    $req=$GLOBALS['con']->prepare($sql);

    $req->execute();

    return $req->fetchAll();
    }
}

function getVente(){
    $sql="SELECT nom_article, nom_client, v.quantite, prix, date_v, v.id, a.id AS idArticle FROM client AS c, vente AS v, article AS a WHERE v.id_article=a.id AND v.id_client=c.id AND etat=? ORDER BY date_v DESC";

    $req=$GLOBALS['con']->prepare($sql);

    $req->execute(array(1));

    return $req->fetchAll();
}

function getUser($id=null){
    if(!empty($id)){
        $sql="SELECT * FROM utilisateur WHERE id=?";

        $req=$GLOBALS['con']->prepare($sql);

        $req->execute(array($id));

    return $req->fetch();
    }else{
        $sql="SELECT * FROM utilisateur ORDER BY nom ASC";

        $req=$GLOBALS['con']->prepare($sql);

        $req->execute();

        return $req->fetchAll();
        }
}