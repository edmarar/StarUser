<?php 
    require_once("Controller/UserControl.class.php");
    $controle = new UserControl();
    $lista = $controle->selecionarTodos();
    echo "
    	<html lang='pt-br'>
	       <head>
	           <meta charset='UTF-8'>
	           <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
	           <link rel='stylesheet' href='view/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css'>
        	   <script src='view/bootstrap-5.0.0-beta2-dist/js/bootstrap.min.js'></script>  
	           <link rel='stylesheet' type='text/css' href='view/js/alertify/css/alertify.min.css' />
	           <script src='view/js/alertify/alertify.min.js'></script>     
			   <link rel='stylesheet' href='view/style/main.css' />
	       </head>
	       <body>
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
	       </body>
	   </html> 
    ";
    if($lista != null){
       require_once('view/users.html');
    }
?>