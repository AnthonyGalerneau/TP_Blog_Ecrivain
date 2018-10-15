<?php

namespace AnthonyGalerneau\Blog\Model;

require_once("model/Manager.php");

class ConnexionManager extends Manager
{
	public function getLog()
	{
		$db = $this->dbConnect();
	    if (isset($_POST['pseudo']) && isset($_POST['pass'])) 
	    {
	        //  Récupération de l'utilisateur et de son pass hashé
	        $req = $db->prepare('SELECT id, pass FROM members WHERE pseudo = :pseudo');
	        $req->execute(array(
	            'pseudo' => htmlspecialchars($_POST['pseudo'])));
	        $resultat = $req->fetch();
	        return $resultat;
    	}
	}
}