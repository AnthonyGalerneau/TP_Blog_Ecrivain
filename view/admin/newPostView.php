Nouveau billet
<?php $title = ob_get_clean(); ?>

<?php ob_start(); ?>
<p><a href="index.php?action=listPostsAdmin">Retour à la liste des billets</a></p>
 
 
<h2>Nouveau billet</h2>


<div id="formulaire_commentaire">
    <form action="index.php?action=addNewPost" method="post">
    <p><label for="title"> Titre :<input type="text" name="title" id="title" /></label></p>
    <p><label for="content"> Texte : <textarea name="content" rows="4" cols="30" id="content"></textarea></label></p>
    <p><input type="submit" /></p> 
    <input type="hidden" for="comment_date" name="comment_date" id="comment_date value="<?php echo '' . time();?>" /> 
    
</form>