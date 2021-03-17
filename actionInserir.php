<?php
require_once("Controller/UserControl.class.php");
require_once("model/User.class.php");

// RECEBER AS INFORMAÇÕES DO FORMULÁRIO;
$user = new User();
// popular objeto modelo
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$user = new User();
$user->setName($name);
$user->setEmail($email);
$user->setPassword(md5($password));
$controle = new UserControl();
if($controle->inserir($user)){
   header("Location: http://localhost/starUser/");
}
?>
