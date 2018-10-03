<?php $title = 'Editeur de billets'; ?>

<?php ob_start(); ?>
<div class="retourAdmin">
    <p><a href="/admin"> Retour à l'accueil de l'administration</a></p>
</div>
<div id="editeur">
    <h2>Editeur - Vos derniers billets</h2>

    <div id="articles">
    <?php
    while ($data = $posts->fetch())
    {
        $extrait = substr($data['content'], 0,50);
        $space = strrpos($extrait, ' ');
    ?>
        <div class="news">
            <div class="imageBilletAccueil" style="background-image:url(/<?= $data['image'] ?>)">
                <img src="/<?= $data['image'] ?>">
            </div>
            <div class="extraitBilletAccueil">
                <h3>
                <a href="/editer-billet/<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a>
                </h3>
                <p class="date">
                    <em>le <?= $data['creation_date_fr'] ?></em>
                </p>
                
                <p>"<?= nl2br(htmlspecialchars(substr($extrait, 0, $space).'...')) ?>"</p>
                <p><em><a href="/editer-billet/<?= $data['id'] ?>">Editer</a></em></p>
            </div>
        </div>
    <?php
    }
    $posts->closeCursor();
    ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
 
<?php require('view/admin/template.php'); ?>