
<?php

session_start();

require('controller/frontend.php');
require('controller/backend.php');

try {

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'login') {
            login();
        }
        elseif ($_GET['action'] == 'logout') {
            session_start();
            session_destroy();
            header('Location: index.php');
        }
        elseif ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                 // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                 throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'modifComment') {
            if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    modifComment($_GET['postId'], $_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addModifComment') {
            if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addModifComment($_GET['postId'], $_GET['id'], $_POST['author'], $_POST['comment']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'admin')
        {
            admin();
        }
        elseif ($_GET['action'] == 'listPostsAdmin') {
            listPostsAdmin();
        }
        elseif ($_GET['action'] == 'modifPostAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                modifPost($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }  
        }

        elseif ($_GET['action'] == 'addModifPost') 
        {  
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {

                if (!empty($_POST['title']) && !empty($_POST['content']) ) 
                {   
                    $extensions_valides = array( 'jpg', 'jpeg', 'gif', 'png' );
                    $extension_upload = strtolower(substr(strrchr($_FILES['image']['name'],'.'),1));
                    if (!empty($_FILES['image']['error'] == 4)) {
                        addModifPost($_GET['id'], $_POST['title'], $_POST['content']);
                    } 
                    elseif ( in_array($extension_upload,$extensions_valides) )
                    {
                        move_uploaded_file($_FILES['image']['tmp_name'], 'public/img/'.basename("image".time().".".$extension_upload));
                        addModifPostImg($_GET['id'], $_POST['title'], $_POST['content'], $_FILES['image']);
                    } else{
                        throw new Exception('Extension Incorrecte !');
                    }
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }  
        }

        elseif ($_GET['action'] == 'newPost') {
            newPost(); 
        }
        elseif ($_GET['action'] == 'addNewPost') 
        {
            if (!empty($_POST['title']) && !empty($_POST['content'])) 
            {
                $extensions_valides = array( 'jpg', 'jpeg', 'gif', 'png' );
                $extension_upload = strtolower(substr(strrchr($_FILES['image']['name'],'.'),1));
                if ( in_array($extension_upload,$extensions_valides) )
                {
                    move_uploaded_file($_FILES['image']['tmp_name'], 'public/img/'.basename("image".time().".".$extension_upload));
                    
                    addNewPost($_GET['id'], $_POST['title'], $_POST['content'], $_FILES['image']);
                    
                } else{
                    throw new Exception('Extension Incorrecte !');
                }
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }

        elseif ($_GET['action'] == 'reportComment') {
            if(isset($_GET['moderate']) AND !empty($_GET['moderate'])){
                moderate();
            } else 
            { 
                throw new Exception('Non !');
            }
        }
        elseif ($_GET['action'] == 'moderateComment')
        {   
            moderateComment();
            
        }
        elseif ($_GET['action'] == 'validComment') {
            if(isset($_GET['valid']) AND !empty($_GET['valid'])){
                validComment();
            } else 
            { 
                throw new Exception('Non !');
            }
        }
        elseif ($_GET['action'] == 'deleteComment') {
            if(isset($_GET['delete']) AND !empty($_GET['delete'])){
                deleteComment();
            } else 
            { 
                throw new Exception('Non !');
            }
        }
       
    } else {
        listPosts();
    }  
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
