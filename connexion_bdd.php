<?php
function connexionbdd($base)
{
    include_once "params.inc.php";
    $dsn = "mysql:host=" . HOST . ";dbname=" . $base;
    $user = USER;
    $password = PASSWORD;
    try {
        $connexion = new PDO($dsn, $user, $password);
        return $connexion;
    } catch (PDOException $exception) {
        echo "Connexion échouée " . $exception->getMessage();
        return false;
        exit();
    }
}
