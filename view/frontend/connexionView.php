
<?php
$title = htmlspecialchars('Connexion'); ?>

<?php ob_start(); ?>
<?php
 if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    header('Location: ../index.php?action=admin');
}
else
{
?>

<div class="loginform">
    <form action="" method="post">
        <legend>Identifiez-vous :</legend>
        <label for="pseudo">Votre identifiant</label>
        <input type="text" name="pseudo" id="pseudo" >
        <br>

        <label for="pass">Votre mot de passe</label>
        <input type="password" name="pass" id="pass">
        <br>

        <button type="submit">S'inscrire</button>
    </form>
    <p><a href="index.php">Retour accueil</a></p>
</div>

<?php 
}
?>
    

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
