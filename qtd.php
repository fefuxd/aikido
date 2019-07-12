<?php require_once("conexao/conexao.php");
		 // Teste de segurança
      session_start();
      if (!isset ( $_SESSION["IDUSER"]) ) {
		  			session_destroy();
                    header("location:index.php");	
	  }
		// Verifica se usuário é novo e precisa colocar senha	
			$senha_necessaria = 1;
			if (isset( $_SESSION["IDUSER"] ) AND ( $_SESSION['RESETPASS'] < $senha_necessaria)) {
			header("location:resetar.php");
			} else {	
		$cont_acesso = $_SESSION["IDUSER"];
	    $n_acesso = "UPDATE usuario SET qtdAcesso = qtdAcesso +1 WHERE usuarioId = {$cont_acesso} ";
		$acesso_alterar = mysqli_query($conecta, $n_acesso);
       	if (!$acesso_alterar) {
        die("Erro na alteração");
      	} else {
		header("Location: main.php"); 
		}	
			}
?>