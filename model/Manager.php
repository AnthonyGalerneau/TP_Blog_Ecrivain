<?php

namespace AnthonyGalerneau\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=TP_Blog_Ecrivain;charset=utf8', 'root', 'root');
        return $db;
    }
}