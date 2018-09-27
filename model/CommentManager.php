<?php

namespace AnthonyGalerneau\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
	public function getComments($postId)
	{
	    $db = $this->dbConnect();
	    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE id_post = ? ORDER BY comment_date DESC LIMIT 0, 5');
	    $comments->execute(array($postId));

	    return $comments;
	}

	public function postComment($postId, $author, $comment)
	{
	    $db = $this->dbConnect();
	    $comments = $db->prepare('INSERT INTO comments(id_post, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
	    $affectedLines = $comments->execute(array($postId, $author, $comment));

	    return $affectedLines;
	}

	public function getModifComment($postId, $id)
    {
       $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, id_post, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id_post = ? AND id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId, $id));
        return $comments;
    }
    
    public function addModifComment($postId, $id, $author, $comment)
    {
        $db = $this->dbConnect();
        $req= $db->prepare('UPDATE comments SET author = ?, comment = ?, comment_date = NOW() WHERE id = ? and id_post = ?');
        $req->execute(array($author, $comment, $id, $postId));
        return $req;
    }

    public function reportComment()
	{
		$moderate = (int) $_GET['moderate'];
	    $db = $this->dbConnect();
	    $req = $db->prepare('UPDATE comments SET moderate = 1 WHERE id = ?');
	    $req->execute(array($moderate));  
	}

	public function getNbCommentsReport(){
	    $db = $this->dbConnect();
	    $comments = $db->query('SELECT COUNT(*) AS nb_comment_report FROM comments WHERE moderate = "1"');
	    $data = $comments->fetch();
	    return $data;

	}

    public function getCommentsReportAdmin()
	{
	    $db = $this->dbConnect();
	    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, moderate FROM comments WHERE moderate = "1" ORDER BY comment_date');
	    $comments->execute(array());

	    return $comments;
	}

	public function getOtherCommentsAdmin()
	{
	    $db = $this->dbConnect();
	    $otherComments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, moderate FROM comments WHERE moderate = "0" ORDER BY comment_date');
	    $otherComments->execute(array());

	    return $otherComments;
	}

	public function validComment()
	{
		$valid = (int) $_GET['valid'];
	    $db = $this->dbConnect();
	    $req = $db->prepare('UPDATE comments SET moderate = 0 WHERE id = ?');
	    $req->execute(array($valid));
	    
	}

	public function deleteComment()
	{
		$delete = (int) $_GET['delete'];
	    $db = $this->dbConnect();
	    $req = $db->prepare('DELETE FROM comments WHERE id = ?');
	    $req->execute(array($delete));
	    
	}
}
