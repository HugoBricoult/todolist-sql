<?php
session_start();
if(isset($_POST['username']) & isset($_POST['password'])){
    $password = md5($_POST['password']);
    $username = $_POST['username'];
    $data = $bdd->query("SELECT * FROM user WHERE nickname = '$username'");
    $result = $data->fetch();
    if($result == false){
        echo "Username incorrect, veuillez entrer un identifiant correct ou vous inscrire <a href='index.php?page=register'>ici</a>.";
    }else{
        if($password == $result['password']){
            $_SESSION['login'] = $username;
            $_SESSION['password'] = $password;
            header("Location:index.php?page=todo");
        }else{
            echo "Mauvais mot de passe.";
        }
    }
}
if(isset($_POST['disconnect'])){
    session_destroy();
}

?>
<div class="container login">
    <h2>Se Connecter</h2>
    <form action="index.php?page=login" method="post">
        <label for="username">Nom utilisateur</label>
        <input type="text" name="username" id="username">
        <label for="password">Mot de passe</label>
        <input type="text" name="password" id="password">
        <input type="submit" value="Se connecter">
    </form>
    <p>Pas encore inscrit ? <a href="index.php?page=register">Inscrivez vous !</a></p>
</div>