Modérer les commentaires
<?php $title = ob_get_clean(); ?>

<?php ob_start(); ?>
<p><a href="index.php?action=admin"> Retour à l'accueil de l'administration</a></p>
 
 
<h2>Modérer les commentaires</h2>
 
<p>Les commentaires suivant ont été signalé :</p>
<?php

while ($comment = $comments->fetch())
{
?>
<div class="affichComment">
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <p><a href="index.php?action=validComment&amp;valid=<?=$comment['id'] ?>">Valider</a> - <a href="index.php?action=deleteComment&amp;delete=<?=$comment['id'] ?>">Supprimer</a></p>
</div>

<?php
}

$content = ob_get_clean(); ?>
 
<?php require('view/admin/template.php'); ?>