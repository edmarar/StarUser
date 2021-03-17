<?php
require_once("Controller/Conexao.class.php");
require_once("model/User.class.php");
class UserControl{
   public function inserir($user){
      try{
         if(get_class($user) == "User"){  
            try {
               $conexao = new Conexao("Controller/confDB.ini"); // Abrindo conexão com o banco
               $result = false;
               // Preparando o comando sql para execução
               $sql = "INSERT INTO user (name,email,password) VALUES(:n,:e,:p);";
               $comando = $conexao->getPDO()->prepare($sql);
               //Criando as variáveis de referência 
               $name = $user->getName();
               $email = $user->getEmail();
               $password = $user->getPassword();
               $comando->bindParam("n", $name);
               $comando->bindParam("e", $email);
               $comando->bindParam("p", $password);
               if($comando->execute()){
                  $result = true;
                  echo ":)";
               }
            } catch (PDOException $ex) {
               echo ":( - Erro no banco: {$ex->getMessage()}";
            } catch (Exception $ex) {
               echo ":( - Erro geral: {$ex->getMessage()}";
            } finally {
               $conexao->fecharConexao();
               return $result;
            }
         }else{
            return false;
         }
      }catch(PDOException $e){
         echo "ERRO: {$e->getMessage()}";
      }
   }
   public function apagar($name){
      // 1 - Abrir a conexao com o Banco
      // 2 - Preparar a execução (Reunir informações passadas)
      // 3 - Executar o comando em SQL
      // 4 - Fechar conexão com o banco
      // retornar SE bem sucedido.
      try{
         if(gettype($name) == 'string'){
            try {
               $result = false;
               $conexao = new Conexao("Controller/confDB.ini");
               $sql = "DELETE FROM user WHERE name=:n;";
               $comando = $conexao->getPDO()->prepare($sql);
               $comando->bindParam("n",$name);
               if($comando->execute()){
                  $result = true;
                  echo ":)";
               }
            } catch (PDOException $ex) {
               echo ":( - Erro no banco {$ex->getMessage()}";
            } catch (Exception $ex) {
               echo ":( - Erro geral: {$ex->Message()}";
            } finally {
               $conexao->fecharConexao();
            }
         }else{
            return false;
            echo ':( - ERROR';
         }
      }catch(PDOException $e){
         echo "ERRO: {$e->getMessage()}";
      }
   }
  
   public function selecionarTodos(){
      // 1 - Abrir a conexao com o Banco
      // 2 - Preparar a execução (Reunir informações passadas)
      // 3 - Executar o comando em SQL
      // 4 - Fechar conexão com o banco
      // retornar SE bem sucedido.
      try{
         $conexao = new Conexao("Controller/confDB.ini");
         $comando = $conexao->getPDO()->prepare("SELECT * FROM user;");
         if($comando->execute()){
            $lista = $comando->fetchAll(PDO::FETCH_CLASS, "User");
            $conexao->fecharConexao();
            return $lista;
         }else{
            $conexao->fecharConexao();
            return null;
         }
      }catch(PDOException $e){
         echo ("[-] Erro do sistema: {$e->getMessage()}");
      }
   }
   public function selecionarUm($email){
      try{
         $conexao = new Conexao("controller/confDB.ini");
         $sql = "SELECT * FROM user WHERE email=:e";
         $comando = $conexao->getPDO()->prepare($sql);
         $comando->bindParam("e", $email);
         if($comando->execute()){
            $consulta = $comando->fetchAll(PDO::FETCH_OBJ);
            $user = new User();
            $user->setName($consulta[0]->name);
            $user->setEmail($consulta[0]->email);
            $user->setPassword($consulta[0]->password);
            return $user;
         }else{
            $conexao->fecharConexao();
            return null;
         }
      }catch(PDOException $e){
         echo "Erro ao atualizar: {$e->getMessage()}";
      }
   }
   public function editar($user){
      try{
         $conexao = new Conexao("controller/confDB.ini");
         if(get_class($user) == "User"){
            $sql = "UPDATE user SET name=:n, password=:p WHERE email=:e;";
            $comando = $conexao->getPDO()->prepare($sql);
            $name = $user->getName();
            $password = $user->getPassword();
            $email = $user->getEmail();
            $comando->bindParam("n", $name);
            $comando->bindParam("p", $password);
            $comando->bindParam("e", $email);
            if($comando->execute()){
               $conexao->fecharConexao();
               return true;
            }else{
               $conexao->fecharConexao();
               return false;
            }
         }else{
            return false;
         } 
      }catch(PDOException $ex){
         echo "[-] {$ex->getMessage()}";
      }
   }
}
?>
