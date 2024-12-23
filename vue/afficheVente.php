<?php
    session_start();
    include_once '../model/function.php';
    if (empty(@$_SESSION['etatConnexion'])) {
    header('Location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Vente</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<div class="article">
    <?php
    include_once 'entete.php';
    ?>
    <h2>Nos Ventes</h2>
    <a href="menuprincipal.php" class="back_btn vente"><i class="fa-solid fa-arrow-left"></i>Retour</a>
    <?php
                if(!empty($_SESSION['message']['text'])){
            ?>
            <p class="<?php echo $_SESSION['message']['type']?>"><?php echo $_SESSION['message']['text']?></p>
            <?php
                }
            ?>
    <table class="table table-striped">
  <thead class="table-dark">
      <th scope="col">Nom du Produit</th>
      <th scope="col">Nom Client</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix</th>
      <th scope="col">Date</th>
      <th scope="col" colspan="2">Actions</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $ventes=getVente();
    if(!empty($ventes) && is_array($ventes)){
        foreach($ventes as $key=>$value){
        ?>
        <tr>
            <th><?= $value['nom_article']?></th>
            <th><?= $value['nom_client']?></th>
            <td><?= $value['quantite']?></td>
            <td><?= $value['prix']?></td>
            <td><?= date('d/m/Y',strtotime($value['date_v']))?></td>
            <td colspan="2">
                <a href=""><i class="fa-solid fa-print"></i></a>
                <a onclick="annuleVente(<?= $value['id']?>,<?= $value['idArticle']?>,<?= $value['quantite']?>)"><i class="fa-solid fa-ban"></i></a>
            <td>
        </tr>
        <?php
    }
    }
 ?>
  </tbody>
</table>
</div> 

    <script>

        function annuleVente(idVente,idArticle,quantite){
            if(confirm('Voulez-vous vraiment annuler cette vente ?')){
                window.location.href="../model/annulerVente.php?idVente="+idVente+"&idArticle="+idArticle+"&quantite="+quantite;
            }
        }

    </script>
    <?php
        unset($_SESSION['message']['text']);
        unset($_SESSION['message']['type']);
    ?>
</body>
</html>