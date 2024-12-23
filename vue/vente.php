<?php
    session_start();
    if (empty(@$_SESSION['etatConnexion'])) {
    header('Location:../index.php');
}
    include_once '../model/function.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="article">
    <?php
    include_once 'entete.php';
    ?>
        <h2>Nouvelle Vente</h2>
    <div class="form">
        <a href="menuprincipal.php" class="back_btn"><i class="fa-solid fa-arrow-left"></i>Retour</a>
            <?php
                if(!empty($_SESSION['message']['text'])){
            ?>
            <p class="<?= $_SESSION['message']['type']?>"><?= $_SESSION['message']['text']?></p>
            <?php
                }
            ?>
        <form action="../model/ajoutVente.php" method="POST">
        <label for='id_article' class="nom_article">Nom Produit</label>
        <select onchange="setPrix()"name="id_article" id="id_article">
            <option value="" disabled selected>--Choisir le Produit --</option>
            <?php
                 $articles=getArticle();
                if(!empty($articles) && is_array($articles)){
                    foreach($articles as $key=>$value){
                      ?> 
                      <option data-prix="<?= $value['prix_unit']?>" value="<?= $value['id']?>"><?= $value['nom_article'].'  -  '.$value['quantite'].' '.'caisses en stock'.' (Prix Unit.: '.$value['prix_unit'].')'?></option>
                      <?php
                    }
                }
            ?>
        </select>

        <label for='id_client' class="id_client">Nom Produit</label>
        <select name="id_client" id="id_client">
            <option value="" disabled selected>--Choisir le Client --</option>
            <?php
                 $clients=getClient();
                if(!empty($clients) && is_array($clients)){
                    foreach($clients as $key=>$value){
                      ?> 
                      <option value="<?= $value['id']?>"><?= $value['nom_client']?></option>
                      <?php
                    }
                }
            ?>
        </select>

        <label for="quantite">Quantité</label>
        <input onkeyup="setPrix()"type="number" name="quantite" autocomplete="off" id="quantite">
        <label for="prix">Prix</label>
        <input type="number" name="prix" autocomplete="off" id="prix">
        <input type="submit" value="Valider" name="button">
        </form>
        
    </div>
    </div>
    <?php
        unset($_SESSION['message']['text']);
        unset($_SESSION['message']['type']);
    ?>

    <script>
        function setPrix(){
            var article=document.querySelector('#id_article');
            var quantite=document.querySelector('#quantite');
            var prix=document.querySelector('#prix');

        var prixUnit=article.options[article.selectedIndex].getAttribute('data-prix');

            prix.value=Number(quantite.value)*Number(prixUnit);
        }
    </script>
</body>
</html>