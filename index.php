<?php require_once("conexao/conexao.php"); ?>
<?php
        // Adicionar variave de sessao
        
    
    if ( isset( $_POST["usuario"]  ) ) {
         $usuario = $_POST["usuario"];
         $senha   = $_POST["senha"];
       
        $login = "SELECT * ";
        $login .= "FROM usuario ";
        $login .= "WHERE usuarioLogin = '{$usuario}' and senha = '{$senha}' ";
        
        $acesso = mysqli_query($conecta, $login);
        
        if ( !$acesso ) {
            die ("Falha na consulta ao banco");
        }
        
        $informacao = mysqli_fetch_assoc($acesso);
        
        if ( empty($informacao)  ) {
            $mensagem = "Usuário ou senha incorreto";
        } else {
            
			session_start();
			$_SESSION['IDUSER']	       =   $informacao['usuarioId'];
     	    $_SESSION['LOGINUSER']     =   $informacao['usuarioLogin'];
     	    $_SESSION['NIVELUSER']     =   $informacao['nivelId'];
			$_SESSION['STATUSUSER']    =   $informacao['statusUsuario'];
			$_SESSION['RESETPASS']     =   $informacao['resetaSenha'];
			$_SESSION['IDESCOLAPROF']  =   $informacao['escolaId'];
			
			if (!isset ( $_SESSION["IDUSER"]) ) {
		  			session_destroy();
                    '<script type="text/JavaScript">
							alert("Erro interno");
							location.href="index.php"
			  </script>';	
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
		echo '<script type="text/JavaScript">
							
							location.href="main.php"
			  </script>';
		}	
			}
        }
        
    }

?>

<head>

  <meta charset="utf-8">
  <title>Aiki Kaizen Dojo - Login</title>
    
  <link rel="shortcut icon" href="assets/favicon.icof" type="image/x-icon"/>

  <!-- CSS -->
  <link rel="stylesheet" href="css/login.css">


</head>


  <body>

    <body class="align">

    <div class="site__container">

    <div class="grid__container">
    
    <div id="logo"><center><img src="assets/imagens/logo-login.png" alt="Aikido Aiki Kaizen"/></center></div><br>
   
        <form action="index.php" method="post" class="form form--login">

        <div class="form__field">
            <label class="fontawesome-user" for="login__username"><span class="hidden">Usuário</span></label>
           <input type="text" 	placeholder="Usuário" name="usuario" id="usuario" size="30" maxlength="100" value=""> 
        </div> 
            
        <div class="form__field">
            <label class="fontawesome-lock" for="login__password"><span class="hidden">Senha</span></label>
            <input type="password" 	placeholder="Senha" name="senha" id="senha" size="30" maxlength="100">
        </div>  
            
        <div class="form__field">
			<input type="submit" value="Entrar">
        </div>

        <div class="aviso"><center>
		  <?php
                    if ( isset($mensagem) )  {
                        

                ?>
                    <p><?php echo $mensagem  ?></p>
                
                <?php

                    }

                ?>
        </center></div>

        </form>

	<p class="text--center">Desenvolvido por <a href="http://www.soluticom.com.br" target=”_blank”>Soluticom - Soluções em TI</a></p>

  </body>
  
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>