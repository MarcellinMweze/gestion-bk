<?php
    session_start();
    include_once '../model/function.php';

    if (empty(@$_SESSION['etatConnexion'])) {
    header('Location:index.php');
}

    if(!empty($_GET['id'])){
        $article=getArticle($_GET['id']);
        $_SESSION['id']=$_GET['id'];
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="article">
    <?php
    include_once 'entete.php';
    ?>
        <h2>Modifier Produit</h2>
    <div class="form">
        <a href="menuprincipal.php" class="back_btn"><i class="fa-solid fa-arrow-left"></i>Retour</a>
            <?php
                if(!empty($_SESSION['message']['text'])){
            ?>
            <p class="<?php echo $_SESSION['message']['type']?>"><?php echo $_SESSION['message']['text']?></p>
            <?php
                }
            ?>
        <form action="../model/modifArticleM.php" method="POST">
        <input value="<?= !empty($_GET['id'])? $article['id']:"" ?>" type="hidden" name="id" id="id">
        <label for='nom_article' class="nom_article">Nom Produit</label>
        <input value="<?= !empty($_GET['id'])? $article['nom_article']:""?>" type="text" name="nom_article" autocomplete="off" id="nom_article">
        <label for="quantite">Quantité</label>
        <input value="<?= !empty($_GET['id'])? $article['quantite']:""?>" type="number" name="quantite" autocomplete="off" id="quantite">
        <label for="prix_unit">Prix Unitaire</label>
        <input value="<?= !empty($_GET['id'])? $article['prix_unit']:"" ?>" type="number" name="prix_unit" autocomplete="off" id="prix_unit">
        <input type="submit" value="Modifier" name="button">
        </form>
        
    </div>

    <h2>Liste des Produits</h2>

    <table class="table table-striped">
  <thead class="table-dark">
      <th scope="col">Nom du Produit</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix Unit.</th>
      <th scope="col">Actions</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $articles=getArticle();
    if(!empty($articles) && is_array($articles)){
        foreach($articles as $key=>$value){
        ?>
        <tr>
            <th><?= $value['nom_article']?></th>
            <td><?= $value['quantite']?></td>
            <td><?= $value['prix_unit']?></td>
            <td>
                <a href="?id=<?= $value['id']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href=""><i class="fa-solid fa-trash"></i></a>
            <td>
        </tr>
        <?php
    }
    }
 ?>
  </tbody>
</table>

    </div>
    <?php
        unset($_SESSION['message']['text']);
        unset($_SESSION['message']['type']);
    ?>
</body>
</html>

