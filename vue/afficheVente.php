<?php
    session_start();
    include_once '../model/function.php';
    if (empty(@$_SESSION['etatConnexion'])) {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
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
    <table class="table table-striped">
  <thead class="table-dark">
      <th scope="col">Nom du Produit</th>
      <th scope="col">Nom Client</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix</th>
      <th scope="col">Date</th>
      <th scope="col">Actions</th>
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
            <td>
                <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
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
</body>
</html>