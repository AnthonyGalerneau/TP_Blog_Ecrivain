
<?php $title = 'Editer le billet'; ?>

<?php ob_start(); ?>

<div class="retourAdmin">
    <p><a href="/admin"> Retour à l'accueil de l'administration</a></p>
    <p><a href="/editer-billets"> Retour à la liste des posts</a></p>
</div>

<div id="editeur">
    <h2>Editer le billet</h2>
</div>

<div id="formulaire_commentaire">
    <form action="/add-modif-billet-<?=$post['id']?>" method="post" enctype="multipart/form-data">     
        <p class="deletePost"><a href="/supprimer-billet-<?=$post['id'] ?>">Supprimer Le billet</a></p>
        <p>Changer image :</p>
        <p><img style= "max-width: 100px; max-height: 100px;" src="/<?= $post['image'] ?>"></p>

        <p><label for="image">(jpg, jpeg, gif, png | max. 2 Mo) :</label><br />
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" /><br />
        <input  class="file" type="file" name="image" id="image" /></p>
        <p><label for="title">Modifier titre :</label><br />
        <input type="text" name="title" id="title" value="<?php echo $post['title'] ?>"></p>
        <p><label for="content">Editer Billet :</label><br />
        <textarea name="content" rows="30" cols="70" id="content"><?php echo $post['content'] ?></textarea></p>
        <p><button type="submit" /> Valider </button> </p>
    </form>
</div>
<?php
$content = ob_get_clean(); ?>
 
<?php require('view/admin/template.php'); ?>