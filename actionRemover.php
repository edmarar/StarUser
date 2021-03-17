<?php
require_once("Controller/UserControl.class.php");
$controle = new UserControl();
$name = filter_input(INPUT_POST, 'name');
if($controle->apagar($name)){
   header("Location: http://localhost/starUser");
} 
?>
