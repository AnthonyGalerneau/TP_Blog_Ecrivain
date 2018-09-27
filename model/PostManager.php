<?php

namespace AnthonyGalerneau\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
	public function getPosts()
	{
	    $db = $this->dbConnect();
	    $req = $db->query('SELECT id, title, content, image, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0,8');

	    return $req;
	}

	public function getPost($postId)
	{
	    $db = $this->dbConnect();
	    $req = $db->prepare('SELECT id, title, content, image, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?');
	    $req->execute(array($postId));
	    $post = $req->fetch();

	    return $post;
	}

	public function getModifPost($id)
    {
       $db = $this->dbConnect();
        $post = $db->prepare('SELECT id, title, content, image, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $post->execute(array($id));
        return $post;
    }

    public function addModifPostImg($id, $title, $content, $nameImg)
    {
        $db = $this->dbConnect();
        $req= $db->prepare('UPDATE posts SET title = ?, content = ?, image = ? WHERE id = ?');
        $extension_upload = strtolower(substr(strrchr($_FILES['image']['name'],'.'),1));
	    $nameImg='public/img/'.basename("image".time().".".$extension_upload);
        $req->execute(array($title, $content, $nameImg, $id));
        return $req;
    }

    public function addModifPost($id, $title, $content)
    {
        $db = $this->dbConnect();
        $req= $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $req->execute(array($title, $content, $id));
        return $req;
    }

    public function deletePost()
    {
        $delete = (int) $_GET['delete'];
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $req->execute(array($delete));  
    }

    public function addNewPost($id, $title, $content, $nameImg)
	{
	    $db = $this->dbConnect();
	    $post = $db->prepare('INSERT INTO posts (id, title, content, image, creation_date) VALUES(?, ?, ?, ?, NOW())');
	    $extension_upload = strtolower(substr(strrchr($_FILES['image']['name'],'.'),1));
	    $nameImg='public/img/'.basename("image".time().".".$extension_upload);
	    $affectedLines = $post->execute(array($id, $title, $content, $nameImg));

	    return $affectedLines;
	}
}
	
