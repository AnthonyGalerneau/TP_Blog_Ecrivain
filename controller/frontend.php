<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnexionManager.php');


function listPosts()
{
    $postManager = new \AnthonyGalerneau\Blog\Model\PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \AnthonyGalerneau\Blog\Model\PostManager();
    $commentManager = new \AnthonyGalerneau\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \AnthonyGalerneau\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function modifComment($postId, $id)
{
    $commentManager = new \AnthonyGalerneau\Blog\Model\CommentManager();
    $postManager = new \AnthonyGalerneau\Blog\Model\PostManager();

    $modifComment = $commentManager->getModifComment($postId, $id);
    $post = $postManager->getPost($postId);
    $comment = $modifComment->fetch();
    if ($comment === false) 
    {
        throw new Exception('Commentaire introuvable !');
    } else {
        require('view/frontend/commentView.php');
    }
   
}

function addModifComment($postId, $id, $author, $comment)
{
    $commentManager = new \AnthonyGalerneau\Blog\Model\CommentManager();
    $req = $commentManager->addModifComment($postId, $id, $author, $comment); 

   if ($req === false) 
   {
        throw new Exception('Impossible de modifier le commentaire !');
    } else 
    {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function login()
{
    $connexionManager = new \AnthonyGalerneau\Blog\Model\ConnexionManager();
    $resultat = $connexionManager->getLog(); 
 
    if (isset($_POST['pseudo']) && isset($_POST['pass'])) 
    {
        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
        if (!$resultat)
        {
            echo '<p>Mauvais identifiant ou mot de passe !<br> <a href="index.php"> essayez à nouveau</a></p>';
        }
        else
        {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['pseudo'] = $_POST['pseudo'];
                echo '<p>Vous êtes connecté !</p>';
            }
            else {
                echo '<p>Mauvais identifiant ou mot de passe !</p>';
            }
        }
    }
    require('view/frontend/connexionView.php');

}





