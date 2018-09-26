<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnexionManager.php');


function admin()
{  
    require('view/admin/adminView.php');
}

function listPostsAdmin()
{
    $adminPostManager = new \AnthonyGalerneau\Blog\Model\PostManager(); 
    $posts = $adminPostManager->getPosts(); 

    require('view/admin/listPostsViewAdmin.php');
}

function modifPost($id)
{
    $adminPostManager = new \AnthonyGalerneau\Blog\Model\PostManager(); 

    $editPost = $adminPostManager->getModifPost($id);
    $post = $editPost->fetch();
    if ($post === false) 
    {
        throw new Exception('billet introuvable !');
    } else {
        require('view/admin/editPostView.php');
    }
}

function addModifPostImg($id, $title, $content, $nameImg)
{
    $adminPostManager = new \AnthonyGalerneau\Blog\Model\PostManager(); 
    $req = $adminPostManager->addModifPostImg($id, $title, $content, $nameImg); 

   if ($req === false) 
   {
        throw new Exception('Impossible de modifier le billet !');
    } else 
    {
        header('Location: index.php?action=listPostsAdmin');
    }
}

function addModifPost($id, $title, $content)
{
    $adminPostManager = new \AnthonyGalerneau\Blog\Model\PostManager(); 
    $req = $adminPostManager->addModifPost($id, $title, $content); 

   if ($req === false) 
   {
        throw new Exception('Impossible de modifier le billet !');
    } else 
    {
        header('Location: index.php?action=listPostsAdmin');
    }
}

function deletePost()
{
    $commentManager = new \AnthonyGalerneau\Blog\Model\PostManager();
    $comment = $commentManager->deletePost();

    header('Location: index.php?action=listPostsAdmin');
}

function newPost()
{
    require('view/admin/newPostView.php');
}

function addNewPost($id, $title, $content, $nameImg)
{
    $adminPostManager = new \AnthonyGalerneau\Blog\Model\PostManager(); 

    $affectedLines = $adminPostManager->addNewPost($id, $title, $content, $nameImg);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le billet !');
    }
    else {
        header('Location: index.php');
    }
}
    

function moderate()
{
    $commentManager = new \AnthonyGalerneau\Blog\Model\CommentManager();
    $comment = $commentManager->reportComment();

    header('Location: index.php');
}

function moderateComment()
{
    $commentManager = new \AnthonyGalerneau\Blog\Model\CommentManager();
    $comments = $commentManager->getCommentsAdmin();

    if ($comments === false) {
        throw new Exception('Impossible de signaler le commentaire!');
    }
    else {
        require('view/admin/moderateCommentView.php');
    }
}

function validComment()
{
    $commentManager = new \AnthonyGalerneau\Blog\Model\CommentManager();
    $comment = $commentManager->validComment();

    header('Location: index.php?action=moderateComment');
}


function deleteComment()
{
    $commentManager = new \AnthonyGalerneau\Blog\Model\CommentManager();
    $comment = $commentManager->deleteComment();

    header('Location: index.php?action=moderateComment');
}