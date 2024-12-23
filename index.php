<?php
session_start();

if (isset($_SESSION['etatConnexion']) and $_SESSION['etatConnexion'] == true) {
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Stock-</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="connexion">
        <div class="s-connexion">
        <h2>Bienvenue au Depôt Relais Guest House BK</h2>
        
        <form action="model/indexT.php" class="fconnexion" method="POST">
            <?php
                if(!empty($_SESSION['message']['text'])){
            ?>
            <p class="<?php echo $_SESSION['message']['type']?>"><?php echo $_SESSION['message']['text']?></p>
            <?php
                }
            ?>
            <label for="nom">Nom d'utilisateur</label>
            <input type="text" id="nom" name="nom" autocomplete="off" placeholder="Entrez votre username">
            <label for="password">Mot de passe</label>
            <div class="passwordshow">
            <input type="password" name="passw" id="password" autocomplete="off" placeholder="Entrez votre mot de passe">
            <img src="public/img/img2.png" alt="photo vue" class="eyes" onClick="changer()" id="eyes">
            </div>
            <input type="submit" value="Connexion">
        </form>
        </div>   
    </div> 
    
    <script>
    e = true;
    function changer() {
    if (e) {
        document.getElementById('password').setAttribute("type", "text");
        document.getElementById('eyes').src = "public/img/img1.png";
        e = false;
    } else {
        document.getElementById('password').setAttribute("type", "password");
        document.getElementById('eyes').src = "public/img/img2.png";
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