<?php
$title = htmlspecialchars('Admin'); ?>

<?php ob_start(); ?>
<div id="admin">
	<div class="session">
		<?php
		 echo '<p>Bonjour <strong>' . $_SESSION['pseudo'] . '</strong>!  </p><hr><p> <a href="index.php">Retour accueil</a></p>';
		?>
	</div>

	 <h1>Bienvenue dans l'administration du Blog !</h1>


	<div class="menuAdmin">
	    <h2>Ici vous pouvez :</h2>
	    <div class="menuAdminChoix">
		    <h3><a href="index.php?action=newPost">Créer un nouveau billet</a></h3>
		    <h3><a href="index.php?action=listPostsAdmin">Editer vos Billets</a></h3>
		    <h3><a href="index.php?action=moderateComment">Modérer les commentaires</a></h3>
		</div>
	</div>
</div>
    
<?php $content = ob_get_clean(); ?>
<?php require('view/admin/template.php'); ?>
