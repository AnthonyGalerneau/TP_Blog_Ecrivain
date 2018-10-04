
<?php $title = 'Nouveau billet'; ?>

<?php ob_start(); ?>
<div id="newPost">
	<div class="retourAdmin">
		<p><a href="/admin"> Retour à l'accueil de l'administration</a></p>
	</div>
	 
	<h2>Créer un nouveau billet</h2>


	<div id="formulaire_commentaire">

	    <form action="/add-nouveau-billet" method="post" enctype="multipart/form-data">
		    <p><label for="title"> Titre :</label> <br>
		    	<input type="text" name="title" id="title" /></p>
		    <p><label for="content"> Texte : </label> <br>
		    	<textarea name="content" rows="10" cols="35" id="content"></textarea></p>
		    <p><label for="image">(jpg, jpeg, gif, png | max. 2 Mo) :</label><br /></p>
		    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
		    <input class="file" type="file" name="image" id="image" />
		    <p><button type="submit" /> Valider </button> </p>
		    <input type="hidden" for="comment_date" name="comment_date" id="comment_date value="<?php echo '' . time();?>" /> 
	    </form>
	</div>
</div>
<?php
$content = ob_get_clean(); ?>

<?php require('view/admin/template.php'); ?>