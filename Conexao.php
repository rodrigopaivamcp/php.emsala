<?php
abstract class Conexao
{
    public static function getInstance()
    {
        $dsn = 'mysql:host=localhost;dbname=bdpoo';
        $user = 'root';
        $pass = '';
        try{
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMOD_EXCEPTION);
            return $pdo;
        }catch (PDOException $exc){
            echo $exc->getMessage();
        }
    }
}