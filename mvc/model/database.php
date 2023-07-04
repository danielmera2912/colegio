<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO("mysql:host=db;dbname=colegio", "root", "pestillo");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}

