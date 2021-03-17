<?php 
    class User{
        private $name;
        private $email;
        private $password;

        public function getName(){
            return $this->name;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getPassword(){
            return $this->password;
        }
        
        public function setName($n){
            $this->name = $n;
        }
        public function setEmail($e){
            $this->email = $e;
        }
        public function setPassword($p){
            $this->password = $p;
        }
    }
?>
