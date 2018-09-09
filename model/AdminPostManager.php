<?php

namespace AnthonyGalerneau\Blog\Model;

require_once("model/Manager.php");

class AdminPostManager extends Manager
{
	public function getPostsAdmin()
	{
	    $db = $this->dbConnect();
	    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

	    return $req;
	}

	public function getPostAdmin($postId)
	{
	    $db = $this->dbConnect();
	    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?');
	    $req->execute(array($postId));
	    $post = $req->fetch();

	    return $post;
	}
}