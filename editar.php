<!doctype html>
<?php
$email = filter_input(INPUT_POST, 'email');
if(!isset($email)){
   echo " 
   <html lang='pt-br'>
       <head>
           <meta charset='UTF-8'>
           <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
           <link rel='stylesheet' href='view/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css'>
           <script src='view/bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js'></script>  
           <link rel='stylesheet' type='text/css' href='view/js/alertify/css/alertify.min.css' /> 
           <script src='view/js/alertify/alertify.min.js'></script>  
           <link rel='stylesheet' type='text/css' href='view/style/main.css' />   
       </head>
       <body style='background-color: #eadaa2;'>
         <nav class='navbar navbar-expand-lg navbar-dark' style='background-color: #251101;'>
         <div class='container-fluid'>
            <a class='navbar-brand font3' href='index.php'>StarUser</a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation' id='btn'>
               <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
               <div class='navbar-nav'>
               <a class='nav-link font3' aria-current='page' href='apagar.php'>Apagar</a>
               <a class='nav-link font3' href='editar.php'>Editar</a>
               <a class='nav-link font3' href='users.php'>StarUsers</a>
               </div>
            </div>
         </div>
         </nav>
         <br />
           <div class='container'>
               <form action='../starUser/editar.php' method='post' class='form'>
                  <div class='row'>
                     <label class='col-sm-2 col-form-label col-form-label-lg font2' for='email'> Email: </label>
                  </div>
                  <div class='col-sm-10'>
                     <input class='form-control form-control-lg' type='email' name='email' id='email' required />
                  </div>
                  <br />
                  <div class='row'>
                    <input class='btn btn-lg col-md-4 offset-md-4 font3' type='submit' value='Editar' style='background-color: #3c0000'>
                  </div>
               </form>
           </div>
       </body>
   </html> ";
}else{
   require_once("controller/UserControl.class.php");
   $controle = new UserControl();
   $user = $controle->selecionarUm($email);
   if($user != null){
      echo "
        <html lang='pt-br'>
         <head>
             <meta charset='UTF-8'>
             <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
             <link rel='stylesheet' href='view/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css'>
             <link rel='stylesheet' type='text/css' href='view/js/alertify/css/alertify.min.css' />
             <script src='view/bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js'></script> 
             <script src='view/js/alertify/alertify.min.js'></script> 
             <link rel='stylesheet' type='text/css' href='view/style/main.css' />       
         </head>
         <body style='background-color: #eadaa2;'>
            <nav class='navbar navbar-expand-lg navbar-dark' style='background-color: #251101;'>
            <div class='container-fluid'>
               <a class='navbar-brand font3' href='index.php'>StarUser</a>
               <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation' id='btn'>
                  <span class='navbar-toggler-icon'></span>
               </button>
               <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
                  <div class='navbar-nav'>
                  <a class='nav-link font3' aria-current='page' href='apagar.php'>Apagar</a>
                  <a class='nav-link font3' href='editar.php'>Editar</a>
                  <a class='nav-link font3' href='users.php'>StarUsers</a>
                  </div>
               </div>
            </div>
            </nav>
             <br />
             <div class='container'>
                 <form action='../starUser/actionEditar.php' method='post' class='form'>
                    <div class='row'>
                       <label class='font2 col-sm-4 col-form-label col-form-label-lg' for='name'> 
                        Nome de usuário: 
                       </label>
                    </div>
                    <div class='col-sm-10'>
                      <input class='form-control form-control-lg' type='text' name='name' id='name' value='{$user->getName()}' required />
                    </div>
                    <div class='row'>
                       <label class='font2 col-sm-2 col-form-label col-form-label-lg' for='password'> 
                        Senha: 
                       </label>
                    </div>
                    <div class='col-sm-10'>
                       <input class='form-control form-control-lg' type='password' name='password' id='password' required />
                    </div>
                    <input type='hidden' name='email' id='email' value='{$user->getEmail()}' />
                    <br />
                    <div class='row'>
                        <input class='btn btn-lg col-md-4 offset-md-4 font3' type='submit' value='Editar' style='background-color: #3c0000'>
                    </div>
                 </form>
             </div>
         </body>
        </html>
      ";
   }else{
      header("Location: http://localhost/starUser");
   }
}
?>

