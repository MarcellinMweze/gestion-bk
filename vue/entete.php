
<div class="menu-principal">
        <div class="nav-titre"> 
        <div class="image-user">
        <img src="../public/img/user.png" alt="Image de l'utilisateur">
        </div>
        <p>Bienvenue <strong><?= !empty($_SESSION['user']) ? $_SESSION['user']:''?></strong></p>
</div>

