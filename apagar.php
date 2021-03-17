<?php 
if(!isset($_GET['name'])){
    require_once('view/delete.html');
}else{
    require_once("Controller/UserControl.class.php");
    $controle = new UserControl();

    if($controle->apagar($_GET['name'])){
        header("Location: http://localhost/starUser");
    }else{
        echo "[-] Erro ao remover o item";
    }
}
?>
