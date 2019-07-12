<?php
require_once("conexao/conexao.php"); ?>
<?php
session_start();
if ( !isset( $_SESSION["IDUSER"] ) ) {
			header("location:index.php"); }
?>




<?php
$teste = "SELECT senha from usuario WHERE usuarioId = {$_SESSION['IDUSER']} ";
	$con_teste = mysqli_query($conecta,$teste);
	if(!$con_teste) {
		die ("Erro interno");
	}
	
	$info_teste = mysqli_fetch_assoc($con_teste);
	$senhaDoBanco = $info_teste["senha"];
	
?>



<?php
		
		
		$UID = 		   $_SESSION['IDUSER'];
  		if (isset($_POST["senhaAntiga"] )  ) {
	
	    $senhaAntiga	   				 = utf8_decode($_POST["senhaAntiga"]);
        $novaSenha	   		  			 = utf8_decode($_POST["novaSenha"]);
		$confirmaNovaSenha  		     = utf8_decode($_POST["confirmaNovaSenha"]);

   
	   if ( $senhaAntiga <> $senhaDoBanco ) {
		   
		$mensagem = "Senha atual não confere!";   
		
	   } else {
		   
		if ( $novaSenha <> $confirmaNovaSenha ) {
		   
		$mensagem = "Campo de nova senha não conferem!";      
		   
	  } else {
	  
	  	
        
        // Objeto para alterar
        
        $alterar  = "UPDATE usuario SET senha = '{$novaSenha}' WHERE usuarioId = {$UID} ";
        
        
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
	   
	   }
		
	
?>

<head>

  <meta charset="utf-8">
  <title>Aiki Kaizen Dojo - Alterar Senha</title>
    
  <link rel="shortcut icon" href="assets/favicon.icof" type="image/x-icon"/>

  <!-- CSS -->
  <link rel="stylesheet" href="css/login.css">


</head>

<body>

    <body class="align">

    <div class="site__container">

    <div class="grid__container">
    
    <div id="logo" style="margin-left:-40px;"><center><img src="assets/imagens/logo.png"  alt="Aikido Aiki Kaizen"/></center></div><br>
    
    
    <form action="alterarSenha.php" method="post" class="form form--login">
		<h3 style="color:#000; margin-left:100px;">Alterar Senha</h3>
        
         
        <div class="form__field">
            <label class="fontawesome-lock" for="login__password"><span class="hidden">Senha antiga</span></label>
            <input type="password" 	placeholder="Senha antiga" name="senhaAntiga" id="senhaAntiga" size="30" maxlength="100" required>
        </div>   
            
        <div class="form__field">
            <label class="fontawesome-lock" for="login__password"><span class="hidden">Nova senha</span></label>
            <input type="password" 	placeholder="Nova senha" name="novaSenha" id="novaSenha" size="30" maxlength="100" required>
        </div>  
        
        <div class="form__field">
            <label class="fontawesome-lock" for="login__password"><span class="hidden">Confirma Nova senha</span></label>
            <input type="password" 	placeholder="Confirmar nova senha" name="confirmaNovaSenha" id="confirmaNovaSenha" size="30" maxlength="100" required>
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
                    
                  