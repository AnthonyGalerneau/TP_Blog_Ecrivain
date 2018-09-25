<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= 'Jean Forteroche - ' . $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>

        <header>
            <div class="imageHeaderAdmin" style="background-image:url(public/img/header.jpg)">
                <img src="public/img/header.jpg">
            </div>
            <div class="titreAdmin">
                <h1>Billet simple pour l'Alaska</h1>
                <hr>
                <h2>Admin - Jean Forteroche</h2>
            </div>  
        </header> 
   
        <?=  $content ?>

        <footer>
            <div class="login">
                <?php
                if(session_id() == "") {
                    ?>
                    <p><a href="index.php?action=login">Admin</a></p>
                <?php  
                } 
                else
                {
                ?>
                   <p><a href="index.php?action=logout">Déconnexion</a></p>
               <?php
                }
                ?>
                
            </div>
        </footer>
    </body>
</html>