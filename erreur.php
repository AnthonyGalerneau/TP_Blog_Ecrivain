<?php
$title = htmlspecialchars('Connexion'); ?>

<?php ob_start(); ?>
<header>
    <div class="imageHeader" style="background-image:url(/public/img/header.jpg)">
        <img src="/public/img/header.jpg">
    </div>
    <div class="titre">
        <h1>Billet simple pour l'Alaska</h1>
        <hr>
        <h2>Jean Forteroche</h2>
    </div>  
</header> 

<div class="lienRetour">
    <p><a href="/">Retour à la liste des billets</a></p>
</div>

<div class="erreur">
   <h3>
      <?php
      switch($_GET['erreur'])
      {
         case '400':
         echo 'Échec de l\'analyse HTTP.';
         break;
         case '401':
         echo 'Le pseudo ou le mot de passe n\'est pas correct !';
         break;
         case '402':
         echo 'Le client doit reformuler sa demande avec les bonnes données de paiement.';
         break;
         case '403':
         echo 'Requête interdite !';
         break;
         case '404':
         echo 'La page n\'existe pas ou plus !';
         break;
         case '405':
         echo 'Méthode non autorisée.';
         break;
         case '500':
         echo 'Erreur interne au serveur ou serveur saturé.';
         break;
         case '501':
         echo 'Le serveur ne supporte pas le service demandé.';
         break;
         case '502':
         echo 'Mauvaise passerelle.';
         break;
         case '503':
         echo ' Service indisponible.';
         break;
         case '504':
         echo 'Trop de temps à la réponse.';
         break;
         case '505':
         echo 'Version HTTP non supportée.';
         break;
         default:
         echo 'Erreur !';
      }
      ?>
   </h3>
</div/

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>