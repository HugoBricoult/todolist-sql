<?php
//set database tables and config link to database
include ('./utils/config.php');
include ('./utils/install.php');

//header
include ('./header.php');

//body
$pages = array("login","todo","register");
if(isset($_GET['page'])){
    if(in_array($_GET['page'],$pages)){
        include('./page/'.$_GET['page'].'.php');
    }else{
        include('./page/404.php');
    }
}else{
    include ('./page/todo.php');
}

//footer
include ('./footer.php');



