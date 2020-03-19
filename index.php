<?php
session_start();

//set database tables and config link to database
include ('./utils/config.php');
include ('./utils/install.php');

//header
include ('./header.php');
$isconnect = true;
if(!isset($_SESSION['login']) || !isset($_SESSION['password'])){
    $isconnect = false;
}
//body
$pages = array("login","todo","register");
if(isset($_GET['page'])){
    if(in_array($_GET['page'],$pages)){
        include('./page/'.$_GET['page'].'.php');
    }else{
        include('./page/404.php');
    }
}else{
    if($isconnect){
        include ('./page/todo.php');
    }else{
        include ('./page/login.php');
    }
    
}

//footer
include ('./footer.php');



