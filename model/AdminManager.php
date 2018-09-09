<?php

namespace AnthonyGalerneau\Blog\Model;

require_once("model/Manager.php");

class AdminManager extends Manager
{
	public function admin()
	{
		$db = $this->dbConnect();
        $req = $db->query('SELECT id, pseudo  FROM members ');

	    return $req;
	}
}