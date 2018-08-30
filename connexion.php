<?php 

try
{
    $db = new PDO('mysql:host=localhost;dbname=TP_Blog_Ecrivain', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$req = $db->prepare('SELECT id, pass FROM members WHERE pseudo = :pseudo');


if (isset($_POST['pseudo']) && isset($_POST['pass'])) 
{
    //  Récupération de l'utilisateur et de son pass hashé
    
    $req->execute(array(
        'pseudo' => htmlspecialchars($_POST['pseudo'])));
    $resultat = $req->fetch();

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

    if (!$resultat)
    {
        echo '<p>Mauvais identifiant ou mot de passe !</p>';
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
?>


 <head>  
    <link href="public/css/style.css" rel="stylesheet" /> 
</head>


<?php


if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    echo '<p>Bonjour <strong>' . $_SESSION['pseudo'] . '</strong>! </p> <br> <p><a href="index.php">Retour accueil</a></p>';
}
else
{
?>
<div class="loginform">
    <form action="" method="post">
        <legend>Identifiez-vous :</legend>
        <label for="pseudo">Votre identifiant</label>
        <input type="text" name="pseudo" id="pseudo">
        <br>

        <label for="pass">Votre mot de passe</label>
        <input type="password" name="pass" id="pass">
        <br>

        <button type="submit">S'inscrire</button>
    </form>
    <p><a href="index.php">Retour accueil</a></p>
</div>
    
<?php
}
?>


