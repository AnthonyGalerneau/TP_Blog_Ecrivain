<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= 'Jean Forteroche - ' . $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <?= 
        '<h1>Billet simple pour l\'Alaska</h1>
		<h2>Jean Forteroche</h2>' 
		. $content ?>

        <footer>
            <div class="login">
                <p><a href="index.php?action=login">Connexion Admin</a></p>
            </div>
        </footer>
    </body>
</html>