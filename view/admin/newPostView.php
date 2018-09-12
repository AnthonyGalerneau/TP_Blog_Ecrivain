Nouveau billet
<?php $title = ob_get_clean(); ?>

<?php ob_start(); ?>
<p><a href="index.php?action=admin"> Retour à l'accueil de l'administration</a></p>
 
 
<h2>Nouveau billet</h2>


<div id="formulaire_commentaire">
    <form action="index.php?action=addNewPost" method="post">
    <p><label for="title"> Titre :<input type="text" name="title" id="title" /></label></p>
    <p><label for="content"> Texte : <textarea name="content" rows="10" cols="35" id="content"></textarea></label></p>
    <button type="submit" /> Valider </button> 
    <input type="hidden" for="comment_date" name="comment_date" id="comment_date value="<?php echo '' . time();?>" /> 
    
    </form>
</div>
<?php
$content = ob_get_clean(); ?>

<?php require('view/admin/template.php'); ?>