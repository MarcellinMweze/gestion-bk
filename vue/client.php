<?php
    session_start();

    if (empty(@$_SESSION['etatConnexion'])) {
    header('Location:index.php');
    }

    include_once '../model/function.php';
    if(!empty($_GET['id'])){
        $client=getClient($_GET['id']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="article">
    <?php
    include_once 'entete.php';
    ?>
        <h2>Nouveau Client</h2>
    <div class="form">
        <a href="menuprincipal.php" class="back_btn"><i class="fa-solid fa-arrow-left"></i>Retour</a>
            <?php
                if(!empty($_SESSION['message']['text'])){
            ?>
            <p class="<?php echo $_SESSION['message']['type']?>"><?php echo $_SESSION['message']['text']?></p>
            <?php
                }
            ?>
        <form action="<?= !empty($_GET['id']) ? '../model/modifClient.php':'../model/ajoutClient.php'?>" method="POST">
        <input value="<?= !empty($_GET['id']) ? $client['id']:''?>" type="hidden" name="id" id="id">
        <label for='nom_client' class="nom_client">Nom Client</label>
        <input value="<?= !empty($_GET['id']) ? $client['nom_client']:''?>" type="text" name="nom_client" autocomplete="off" id="nom_client">
        <label for="phone">Téléphone</label>
        <input value="<?= !empty($_GET['id']) ? $client['phone']:''?>" type="tel" name="phone" autocomplete="off" id="phone">
        <input type="submit" value="<?= !empty($_GET['id']) ? 'Modifier':'Ajouter'?>" name="button">
        </form>
        
    </div>

    <h2>Liste des Produits</h2>

    <table class="table table-striped">
  <thead class="table-dark">
      <th scope="col">Nom du Client</th>
      <th scope="col">Phone</th>
      <th scope="col">Actions</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $client=getClient();
    if(!empty($client) && is_array($client)){
        foreach($client as $key=>$value){
        ?>
        <tr>
            <th><?= $value['nom_client']?></th>
            <td><?= $value['phone']?></td>
            <td>
                <a href="?id=<?= $value['id']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="../model/supprimerClient.php"><i class="fa-solid fa-trash"></i></a>
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