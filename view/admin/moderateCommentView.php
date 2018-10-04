<?php $title = 'Modérer les commentaires'; ?>

<?php ob_start(); ?>

<div class="retourAdmin">
	<p><a href="/admin"> Retour à l'accueil de l'administration</a></p>
</div>
 
<div class="comment">
	<h2>Modérer les commentaires</h2>

	<h3>Les commentaires suivant ont été signalé :</h3>
	<?php
	while ($comment = $comments->fetch())
	{
	?>
	<div class="affichComment">
		<div class="headCommentSign">
		    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
		</div>
		<div class="contentComment">
			<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
		    <p><a class="valid" href="/valider-commentaires-<?=$comment['id'] ?>">Valider</a> - <a class="supp" href="supprimer-commentaires-<?=$comment['id'] ?>">Supprimer</a></p>
		</div>
	</div>

	<?php
	}
	?>
	<h3>Les commentaires non-signalés :</h3>
	<?php
	while ($otherComment = $otherComments->fetch())
	{
	?>

	<div class="affichComment">
	    <div class="headComment">
		    <p><strong><?= htmlspecialchars($otherComment['author']) ?></strong> le <?= $otherComment['comment_date_fr'] ?></p>
		</div>
		<div class="contentComment">
			<p><?= nl2br(htmlspecialchars($otherComment['comment'])) ?></p>
		    <p><a class="supp" href="supprimer-commentaires-<?=$otherComment['id'] ?>">Supprimer</a></p>
		</div>
	</div>
	<?php
	}
?>
</div>
<?php
$content = ob_get_clean(); ?>
 
<?php require('view/admin/template.php'); ?>