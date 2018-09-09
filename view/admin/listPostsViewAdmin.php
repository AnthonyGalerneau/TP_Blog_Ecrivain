<?php $title = 'Editeur de billets'; ?>

<?php ob_start(); ?>
<h3>Vos derniers billets</h3>

<p><a href="index.php?action=admin"> Retour à l'accueil de l'administration</a></p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=modifPostAdmin&amp;id=<?= $data['id'] ?>">Editer</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>
 
<?php require('view/admin/template.php'); ?>