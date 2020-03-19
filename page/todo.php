<?php
session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['password'])){
    header("Location:index.php?page=login");
}
$user = $_SESSION['login'];
?>
<div class="container titre">
    <h1>TodoList</h1>
        <div class="profil">
            <h4>Bonjour <?= $_SESSION['login']?> !</h4>
            <form action='index.php?page=login' method="post"><button class="btn btn-secondary" type="submit" name="disconnect">Se déconnecter</button></form>
        </div>
    
</div>
<div class="container">


<h2>Ajouter une tâche</h2><br>
<input type="text" name="todo" id="todo"><br><br>
<button class="btn btn-secondary" onclick="addtask('<?= $_SESSION['login']?>' ,'<?= $_SESSION['password']?>')">Ajouter une tâche</button>


<h3>Liste des tâches</h3>
<ul id='todolist'>
<?php
$data = $bdd->query("SELECT * FROM todo WHERE author = '$user' AND isdone = '0'");
while($todo = $data->fetch()){ ?>
    <li id="<?= $todo['id'] ?>"><input onclick="changestats('<?= $todo['id'] ?>','<?=$_SESSION['login']?>','<?=$_SESSION['password']?>')" type="checkbox" ><p><?= $todo['todo'] ?></p></li>
<?php 
}
?>

</ul><hr>
<ul id='donelist'>
<?php
$data = $bdd->query("SELECT * FROM todo WHERE author = '$user' AND isdone = '1'");
while($todo = $data->fetch()){ ?>
    <li id="<?= $todo['id'] ?>"><input onclick="changestats('<?= $todo['id'] ?>','<?=$_SESSION['login']?>','<?=$_SESSION['password']?>')" type="checkbox" checked><p><?= $todo['todo'] ?></p></li>
<?php
}
?>
</ul>
</div>
<script src="./js/script.js"></script>