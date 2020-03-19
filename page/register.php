<?php

if(isset($_POST['register'])){
    $getusername = $bdd->query("SELECT * FROM user WHERE nickname = '".$_POST['username']."'");
    $donees = $getusername->fetch();
    if($donees != false){
        echo "Pseudo déja existant ! veuillez en choisir un autre";
    }else{
        if($_POST['password'] == $_POST['passwordconf']){
            $pseudo = $_POST['username'];
            $password = md5($_POST['password']);
            $req = "INSERT INTO user (nickname, password) VALUES ('$pseudo', '$password')";
            $bdd->exec($req);
            echo '<script>window.location = "index.php?page=login"</script>';
        }else{
            echo "les Mots de passe ne sont pas identiques";
        }
    }
}
?>
<div class="container login">
    <h2>S'enregistrer</h2>
    <form action="index.php?page=register" method="post">
        <label for="username">Pseudo</label>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password</label>
        <input type="text" name="password" id="password"><br>
        <label for="passwordconf">Confirm Password</label>
        <input type="text" name="passwordconf" id="passwordconf"><br>
        <input type="submit" value="S'enregistrer" name="register">
    </form>
    <p>Retour au  <a href="index.php?page=login">Login</a></p>
</div>