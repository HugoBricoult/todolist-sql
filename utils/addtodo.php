<?php
include '../utils/config.php';
if(isset($_POST['task']) & isset($_POST['login']) & isset($_POST['password'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $task = $_POST['task'];
    $data = $bdd->query("SELECT * FROM user WHERE nickname = '$login'");
    $result = $data->fetch();
    if($result == false){
        echo "Wrong username or password";
    }else{
        if($password == $result['password']){
            $requ = "INSERT INTO todo (todo, author, isdone) VALUES ('$task','$login',false)";
            $stmt = $bdd->exec($requ);
            if($stmt != false){
                //renvoyer l'id de la tache
                $rep = $bdd->lastInsertId();
                echo $rep;
            }else{
                echo "erreur lors de lenvoie de la tache";
            }
        }else{
            echo "Mauvais mot de passe.";
        }
    }
}else{
    echo 'Not What was expecteD';
}

?>