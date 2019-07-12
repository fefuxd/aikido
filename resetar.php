<?php
require_once("conexao/conexao.php"); ?>
<?php
session_start();
if ( !isset( $_SESSION["IDUSER"] ) ) {
			header("location:index.php"); }
?>

<?php
		$status_necessario = 1;
		if ( $_SESSION['STATUSUSER'] < $status_necessario ) {
		echo '<script type="text/JavaScript">
							alert("Este usuário esta desativado. Entre em contato com o administrador");
							location.href="index.php"
			  </script>';		
	}

?>


<?php
$teste = "SELECT resetaSenha from usuario WHERE usuarioId = {$_SESSION['IDUSER']} ";
	$con_teste = mysqli_query($conecta,$teste);
	if(!$con_teste) {
		die ("Erro interno");
	}
	
	$info_teste = mysqli_fetch_assoc($con_teste);
	$testinho = $info_teste["resetaSenha"];
	if( $testinho <> 0){
		echo '<script type="text/JavaScript">
							
							location.href="main.php"
			  </script>';
	}
?>



<?php
		
		
		$nSenha = 		   $_SESSION['IDUSER'];
  		if (isset($_POST["senha"] )  ) {
	
	    
        $senha	   		   = utf8_decode($_POST["senha"]);
		$Nsenha	   		   = utf8_decode($_POST["Nsenha"]);

       if ( $senha <> $Nsenha ) {
		   
		$mensagem = "Senhas não conferem";   
		   
		   
	   } else {
        
        // Objeto para alterar
        
        $alterar  = "UPDATE usuario ";
        $alterar .= "SET ";
        
		$alterar .= "senha 			= '{$senha}', ";
		$alterar .= "qtdAcesso 		= qtdAcesso +1 , ";
		$alterar .= "resetaSenha	= 1 ";
        
		
		
		
        $alterar .= "WHERE usuarioId 	= {$nSenha} ";
        
        $operacao_alterar = mysqli_query($conecta, $alterar);
        if (!$operacao_alterar) {
            die("Erro na alteração");
        } else {
			echo '<script type="text/JavaScript">
							alert("Sucesso");
							location.href="main.php"
			  </script>';
			  }
        
    }
			}
?>

<head>

  <meta charset="utf-8">
  <title>Aiki Kaizen Dojo - Nova senha</title>
    
  <link rel="shortcut icon" href="assets/favicon.icof" type="image/x-icon"/>

  <!-- CSS -->
  <link rel="stylesheet" href="css/login.css">


</head>

<body>

    <body class="align">

    <div class="site__container">

    <div class="grid__container">
    
    <div id="logo" style="margin-left:-40px;"><center><img src="assets/imagens/logo.png"  alt="Aikido Aiki Kaizen"/></center></div><br>
    
    
    <form action="resetar.php" method="post" class="form form--login">
		<h3 style="color:#000; margin-left:70px;">Redefina sua senha</h3>
        
            
        <div class="form__field">
            <label class="fontawesome-lock" for="login__password"><span class="hidden">Nova senha</span></label>
            <input type="password" 	placeholder="Nova senha" name="senha" id="senha" size="30" maxlength="100" required>
        </div>  
        
        <div class="form__field">
            <label class="fontawesome-lock" for="login__password"><span class="hidden">Nova senha</span></label>
            <input type="password" 	placeholder="Confirmar nova senha" name="Nsenha" id="Nsenha" size="30" maxlength="100" required>
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

     
   <a href="http://www.soluticom.com.br" target=”_blank” style="margin-left:70px;">Soluticom - Soluções em TI</a></p>

  </body>
  
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>
                    
                  