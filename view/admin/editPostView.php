Editer le billet
<?php $title = ob_get_clean(); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php?action=listPostsAdmin">Retour à la liste des billets</a></p>
 
 
<h2>Editer le billet</h2>
 
<form action="index.php?action=addModifPost&amp;id=<?= $post['id'] ?>" method="post">
		<p><label for="title"> Titre :<input type="text" name="title" id="title" value="<?php echo $post['title'] ?>"></label></p>
        <p><label for="content">Editer Billet :</label><br />
        <textarea id="content" name="content"><?php echo $post['content'] ?></textarea></p>
    <div>
        <p><input type="Submit" /></p>
    </div>
</form>
<?php
$content = ob_get_clean(); ?>
 
<?php require('view/admin/template.php'); ?>