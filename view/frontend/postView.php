<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<header>
    <div class="imageHeader" style="background-image:url(/<?= $post['image'] ?>)">
        <img src="/<?= $post['image'] ?>">
    </div>
    <div class="titre">
        <h1><?= htmlspecialchars($post['title']) ?></h1>
        <hr>
        <h2>Jean Forteroche</h2>
    </div>  
</header> 


<div class="lienRetour">
    <p><a href="/">Retour à la liste des billets</a></p>
</div>

<div class="billet">
    <div class="date">
        <h3>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>
    </div>
    <div class="content">
        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>
</div>
<div class="comment">
    <h2>Commentaires</h2>

    <?php
    while ($comment = $comments->fetch())
    {
    ?>
        <div class="affichComment">
            <div class="headComment">
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> <a href="/billet/<?= $post['id'] ?>/modifier-commentaire/<?= $comment['id'] ?>">(modifier)</a></p>
            </div>
            <div class="contentComment">
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                <p class="signalement"><a href="/signaler-commentaire-<?=$comment['id'] ?>">Signaler le commentaire</a></p>
            </div>
        </div>
    <?php
    }
    ?>

    <div id="formComment">
        <form action="/addComment<?= $post['id'] ?>" method="post">
        <p><label for="author"> Pseudo :</label></p>
        <input type="text" name="author" id="author" />
        <p><label for="comment">  Commentaire : </label></p>
        <textarea name="comment" rows="5" cols="50" id="comment"></textarea><br>
        <button type="submit"/>Commenter</button> 
        <input type="hidden" for="comment_date" name="comment_date" id="comment_date value="<?php echo '' . time();?>" /> 
        <input for="id_post" type="hidden" name="id_post" id="id_post" value="<?php echo $_GET['post']; ?>" />  
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
