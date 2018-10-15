<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnexionManager.php');

function showListPostByPage($page)
{
    $postManager = new \AnthonyGalerneau\Blog\Model\PostManager();
    $articlesTotals = $postManager->nbpost();
    $pagesTotales = ceil($articlesTotals/4);
    if ($page<=$pagesTotales) {
        $depart = ($page-1)*4;
        $posts = $postManager->getPostByPage($depart);
        require ('view/frontend/listPostsView.php');
    }
}

function listPosts()
{
    $postManager = new \AnthonyGalerneau\Blog\Model\PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
    require('view/frontend/listPostsView.php');
}

function nbPosts()
{
    $postManager = new \AnthonyGalerneau\Blog\Model\PostManager(); // Création d'un objet
    $pagesTotales = $postManager->nbpost(); // Appel d'une fonction de cet objet
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
        header('Location: billet/' . $postId);
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
        header('Location: billet/' . $postId);
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
            header('Location: /erreur-401');
        }
        else
        {
            if ($isPasswordCorrect) 
            {
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['pseudo'] = $_POST['pseudo'];
                echo '<p>Vous êtes connecté !</p>';
            }
            else {
                header('Location: /erreur-401');
            }
        }
    }
    require('view/frontend/connexionView.php');

}







