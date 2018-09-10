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

	public function getModifPost($id)
    {
       $db = $this->dbConnect();
        $post = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $post->execute(array($id));
        return $post;
    }

    public function addModifPost($id, $title, $content)
    {
        $db = $this->dbConnect();
        $req= $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $req->execute(array($id, $title, $content));
        return $req;
    }

    public function newPost()
	{
		$db = $this->dbConnect();
        $req = $db->query('SELECT title, content  FROM posts ');

	    return $req;
	}

    public function addNewPost($id, $title, $content)
	{
	    $db = $this->dbConnect();
	    $post = $db->prepare('INSERT INTO posts(id, title, content, creation_date) VALUES(?, ?, ?, NOW())');
	    $affectedLines = $post->execute(array($id, $title, $content));

	    return $affectedLines;
	}
}