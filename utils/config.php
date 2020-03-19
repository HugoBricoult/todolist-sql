<?php
//config database
define("DATABASE_NAME","todolist");
define("DATABASE_USER","root");
define("DATABASE_PASSWORD","");
define("DATABASE_HOST","localhost");

try
{
	$bdd = new PDO('mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME.';charset=utf8', DATABASE_USER, DATABASE_PASSWORD);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}