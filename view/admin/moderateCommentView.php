<?php $title = 'Modérer les commentaires'; ?>

<?php ob_start(); ?>

<div class="retourAdmin">
	<p><a href="index.php?action=admin"> Retour à l'accueil de l'administration</a></p>
</div>
 
 
<h2>Modérer les commentaires</h2>
 
<p>Les commentaires suivant ont été signalé :</p>
<?php

while ($comment = $comments->fetch())
{
?>
<div class="affichCommentReport">
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <p><a href="index.php?action=validComment&amp;valid=<?=$comment['id'] ?>">Valider</a> - <a href="index.php?action=deleteComment&amp;delete=<?=$comment['id'] ?>">Supprimer</a></p>
</div>

<?php
}
?>
<hr>
<?php
while ($otherComment = $otherComments->fetch())
{
?>

<div class="affichCommentOther">
    <p><strong><?= htmlspecialchars($otherComment['author']) ?></strong> le <?= $otherComment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($otherComment['comment'])) ?></p>
    <p><a href="index.php?action=deleteComment&amp;delete=<?=$comment['id'] ?>">Supprimer</a></p>
</div>
<?php
}

$content = ob_get_clean(); ?>
 
<?php require('view/admin/template.php'); ?>