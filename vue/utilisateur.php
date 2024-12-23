<?php
    session_start();

    include_once '../model/function.php';

    if (empty(@$_SESSION['etatConnexion'])) {
    header('Location:index.php');
    }

    if(!empty($_GET['id'])){
        $user=getUser($_GET['id']);
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="article">
    <?php
    include_once 'entete.php';
    ?>
        <h2>Nouveau Utilisateur</h2>
    <div class="form">
        <a href="menuprincipal.php" class="back_btn"><i class="fa-solid fa-arrow-left"></i>Retour</a>
            <?php
                if(!empty($_SESSION['message']['text'])){
            ?>
            <p class="<?php echo $_SESSION['message']['type']?>"><?php echo $_SESSION['message']['text']?></p>
            <?php
                }
            ?>
        <form action="<?= !empty($_GET['id']) ? '../model/modifUtilisateur.php':'../model/ajoutUtilisateur.php'?>" method="POST">
        <label for='nom' class="nom">Nom Utilisateur</label>
        <input value="<?= !empty($_GET['id']) ? $user['nom']:''?>" type="text" name="nom" autocomplete="off" id="nom">
        <input value="<?= !empty($_GET['id']) ? $user['id']:''?>" type="hidden" name="id" id="id">
        <label for="passw">Mot de passe</label>
        <div class="passwordshow">
        <input value="<?= !empty($_GET['id']) ? $user['passw']:''?>" type="password" name="passw" id="passw">
        <img src="../public/img/img2.png" alt="photo vue" class="eye" onClick="changer()" id="eye">
        </div>
        <label for='priorite' class="priorite">Niveau de priorité</label>
        <input value="<?= !empty($_GET['id']) ? $user['priorite']:''?>" type="number" name="priorite" autocomplete="off" id="priorite">
        <input type="submit" value="<?= !empty($_GET['id']) ? 'Modifier':'Ajouter'?>" name="button">
        </form>
        
    </div>

    <h2>Liste des Utilisateurs</h2>

    <table class="table table-striped">
  <thead class="table-dark">
      <th scope="col">Nom d'utilisateur</th>
      <th scope="col">Mot de passe</th>
      <th scope="col">Niveau de Priorité</th>
      <th scope="col">Actions</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $users=getUser();
    if(!empty($users) && is_array($users)){
        foreach($users as $key=>$value){
        ?>
        <tr>
            <th><?= $value['nom']?></th>
            <td><?= $value['passw']?></td>
            <td><?= $value['priorite']?></td>
            <td>
                <a href="?id=<?= $value['id']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="../model/supprimerUser.php/?id=<?= $value['id']?>"><i class="fa-solid fa-trash"></i></a>
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
    e = true;
    function changer() {
    if (e) {
        document.getElementById('passw').setAttribute("type", "text");
        document.getElementById('eye').src = "../public/img/img1.png";
        document.getElementById('eye').style.top=13+"px";
        e = false;
    } else {
        document.getElementById('passw').setAttribute("type", "password");
        document.getElementById('eye').src = "../public/img/img2.png";
        document.getElementById('eye').style.top=19+"px";
        e = true;
    }

    }

    </script>

    <?php
        unset($_SESSION['message']['text']);
        unset($_SESSION['message']['type']);
    ?>
</body>
</html>