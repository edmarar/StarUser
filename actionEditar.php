<?php
   require_once("controller/UserControl.class.php");
   $user = new User();
   $name = filter_input(INPUT_POST, 'name');
   $email = filter_input(INPUT_POST, 'email');
   $password = filter_input(INPUT_POST, 'password');
   $user->setName($name);
   $user->setEmail($email);
   $user->setPassword(md5($password));
   $controle = new UserControl();
   if($controle->editar($user)){
      header("Location: http://localhost/starUser");
   }else{
      echo "Ocorreu um erro ao atualizar";
   }
?>