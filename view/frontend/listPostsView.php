
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<header>
    <div class="imageHeader" style="background-image:url(public/img/header.jpg)">
        <img src="public/img/header.jpg">
    </div>
    <div class="titre">
        <h1>Billet simple pour l'Alaska</h1>
        <hr>
        <h2>Jean Forteroche</h2>
    </div>  
</header> 

<div id="Edito">
    <div class="titreAccueil">
        <h2>Bienvenue</h2>
    </div>

    <div class="texteEdito">
        <p>Je vous souhaites la bienvenue sur ce blog créé pour la diffusion du nouveau Roman de Jean Forteroche. <br>
        Jean travaille actuellement sur la sortie de son nouvel ouvrage "Billet simple pour l'Alaska" et il a décidé de vous le faire partager, chapitre par chapitre, au moyen de ce blog. <br>
        N'hésitez pas à laisser vos commentaires à la partion de chaque épisode, Jean se fera un plaisir de vous répondre et pourquoi pas de prendre en compte vos suggestions por les chapitres suivant.</p>
        <br>
        <p>Bonne lecture à toutes et à tous !</p>
    </div>
    
</div>

<div class="titreAccueil">
    <h2>Derniers billets du blog</h2>
</div>

<div id="articles">
<?php
while ($data = $posts->fetch())
{
    $extrait = substr($data['content'], 0,50);
    $space = strrpos($extrait, ' ');
?>
    <div class="news">
        <div class="imageBilletAccueil" style="background-image:url(<?= $data['image'] ?>)">
            <img src="<?= $data['image'] ?>">
        </div>
        <div class="extraitBilletAccueil">
            <h3>
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a>
            </h3>
            <p class="date">
                <em>le <?= $data['creation_date_fr'] ?></em>
            </p>
            
            <p>"<?= nl2br(htmlspecialchars(substr($extrait, 0, $space).'...')) ?>"</p>
           
            <p><em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a></em></p>
            
        </div>
    </div>
<?php
}
$posts->closeCursor();
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>