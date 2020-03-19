<?php
include '../utils/config.php';
if(isset($_POST['id']) & isset($_POST['login']) & isset($_POST['password'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $data = $bdd->query("SELECT * FROM user WHERE nickname = '$login'");
    $result = $data->fetch();
    if($result == false){
        echo "Wrong username or password";
    }else{
        if($password == $result['password']){
            $req = ("UPDATE todo SET isdone = NOT isdone WHERE id = $id");
            $stmt = $bdd->exec($req);
            echo $stmt;
        }else{
            echo '"bad password"';
        }
    }
}