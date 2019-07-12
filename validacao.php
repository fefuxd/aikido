<?php require_once("conexao/conexao.php"); ?>
<?php
		session_start();
	
	// Teste de segurança
      
	
      if (!isset ( $_SESSION["IDUSER"]) ) {
		  			session_destroy();
                    header("location:index.php");	
					}
     
	// Checar se usuário já possui senha cadastrada	
	$teste = "SELECT resetaSenha from usuario WHERE usuarioId = {$_SESSION['IDUSER']} ";
	$con_teste = mysqli_query($conecta,$teste);
	if(!$con_teste) {
		die ("Erro interno");
	}
	
	$info_teste = mysqli_fetch_assoc($con_teste);
	$testinho = $info_teste["resetaSenha"];
	if( $testinho <> 1){
		header("location:resetar.php");
	}
	



	 
	// Verificar se o usuário esta inativo 
	$status_necessario = 1;
	if ( $_SESSION['STATUSUSER'] < $status_necessario ) {
		echo '<script type="text/JavaScript">
							alert("Este usuário esta desativado. Entre em contato com o administrador");
							location.href="index.php"
			  </script>';		
	}



	// Checar nivel de acesso do usuário 
    $nivel_necessario = 2;
      
    
    if ($_SESSION['NIVELUSER'] < $nivel_necessario) {
     
        // Redireciona o visitante para a pagina conforme nivel de acesso
        include ("mUser.php");
    } else {
		include ("mAdmin.php");	
	}
      
    ?>