<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= 'Jean Forteroche - ' . $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
   
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