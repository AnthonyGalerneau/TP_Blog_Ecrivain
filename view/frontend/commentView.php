<?php
$title = 'Modifier le commentaire'; ?>

<?php ob_start(); ?>
<header>
    <div class="imageHeaderAdmin" style="background-image:url(/public/img/header.jpg)">
        <img src="/public/img/header.jpg">
    </div>
    <div class="titreAdmin">
        <h1>Billet simple pour l'Alaska</h1>
        <hr>
        <h2>Modifier commentaire - Jean Forteroche</h2>
    </div>  
</header>
<div class="lienRetour">
	<p><a href="/billet/<?= $post['id'] ?>">Retour au billet</a></p>
</div>
 
<div class="editComment">
	<h2>Editer le commentaire</h2>
	 
	<form action="/billet-<?=$post['id']?>-add-modif-comment-<?=$comment['id']?>" method="post">
			<p><label for="author"> Pseudo :</label></p>
			<p><input type="text" name="author" id="author" value="<?php echo $comment['author'] ?>"></p>
	        <p><label for="comment">Nouveau commentaire</label></p>
	        <p><textarea id="comment" name="comment" rows="5" cols="50"><?php echo $comment['comment'] ?></textarea></p>
	    <div>
	        <p><input type="Submit" /></p>
	    </div>
	</form>
</div>
<?php
$content = ob_get_clean(); ?>
 
<?php require('view/frontend/template.php'); ?>

