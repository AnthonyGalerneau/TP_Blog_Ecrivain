
<?php
$title = htmlspecialchars('Connexion'); ?>

<?php ob_start(); ?>
<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    header('Location: /admin');
}
else
{
?>

<div class="loginTitre">
    <h1>Billet simple pour l'Alaska</h1>
    <hr>
    <h2>Jean Forteroche</h2>
</div>

<div class="loginform">
    <p><a href="/">Retour accueil</a></p>
    <form action="" method="post">
        <h2><legend>Identifiez-vous :</legend></h2>
        <p><label for="pseudo">Votre identifiant</label></p>
        <p><input type="text" name="pseudo" id="pseudo" ></p>
        <br>

        <p><label for="pass">Votre mot de passe</label></p>
        <p><input type="password" name="pass" id="pass"></p>
        <br>

        <p><button type="submit">S'inscrire</button></p>
    </form>
</div>

<?php 
}
?>
    

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
