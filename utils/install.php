<?php
//verif table exists
//table user
$reqUser = "CREATE TABLE IF NOT EXISTS `todolist`.`user` ( `id` INT NOT NULL AUTO_INCREMENT , `nickname` VARCHAR(125) NOT NULL , `password` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;";
//table todo
$reqTodo = "CREATE TABLE IF NOT EXISTS `todolist`.`todo` ( `id` INT NOT NULL AUTO_INCREMENT , `todo` TEXT NOT NULL , `author` VARCHAR(125) NOT NULL , `isdone` BOOLEAN NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;";

//execute requests
$stmtUser = $bdd->exec($reqUser);
if($stmtUser === false){
    echo '<h2 class="text-danger">Erreur de création de la table User</h2>';
}
$stmtTodo = $bdd->exec($reqTodo);
if($stmtTodo === false){
    echo '<h2 class="text-danger">Erreur de création de la table Todo</h2>';
}