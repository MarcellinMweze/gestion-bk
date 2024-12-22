<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['nom']) and $_POST['nom'] !== '' and
        isset($_POST['passw']) and $_POST['passw'] !== ''
    ) {
        $nom = ($_POST['nom']);
        $passw = ($_POST['passw']);

        include_once 'connexion.php';

        try {
            $req = $con->prepare("SELECT nom,passw,priorite FROM utilisateur WHERE nom = ? AND passw = ? ");
            $req->execute(array($nom, $passw));
            $haut = 5;
            $bas = 1;

            if ($req->rowCount() > 0) {
                $rep = $req->fetch(PDO::FETCH_ASSOC);
                if ($rep['nom'] == $nom and $rep['passw'] == $passw and $rep['priorite'] == $haut) {

                    header('Location: ../vue/menuprincipal.php');
                    $_SESSION['user']=$rep['nom'];
                    $_SESSION['etatConnexion']=true;
                } elseif ($rep['nom'] == $nom and $rep['passw'] == $passw and $rep['priorite'] == $bas) {
                    header('Location: ../vue/use.php');
                    $_SESSION['user']=$rep['nom'];
                    $_SESSION['etatConnexion']=true;
                }
            } else {
                $_SESSION['message']['text']="Votre username ou mot de passe incorrect !";
                $_SESSION['message']['type']='danger';
                header('Location: ../vue/index.php');
            }
        } catch (PDOException $e) {
            die("Error" . $e->getMessage());
        }
    } else {
        $_SESSION['message']['text']="Veuillez remplir tous les champs svp !";
        $_SESSION['message']['type']='danger';
        header('Location: ../vue/index.php');
    }
} else {
    header('location: ../vue/index.php');
}



