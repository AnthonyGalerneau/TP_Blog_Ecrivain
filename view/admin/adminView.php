<?php
$title = htmlspecialchars('Admin'); ?>

<?php ob_start(); ?>
<?php
 echo '<p>Bonjour <strong>' . $_SESSION['pseudo'] . '</strong>! </p> <br> <p><a href="index.php">Retour accueil</a></p>';
?>


 <p>Bienvenue dans l'administration du Blog !</p>

 
<div class="menuAdmin">
    <h2>Ici vous pouvez :</h2>

    <h3>Créer un nouveau billet</h3>
    <h3>Editer vos Billets </h3>
    <h3>supprimer des commentaires</h3>

</div>
    
<?php $content = ob_get_clean(); ?>
<?php require('view/admin/template.php'); ?>
