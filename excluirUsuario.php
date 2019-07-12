<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("verificacaoNivel.php"); ?>


<?php
        if ( isset($_POST["usuarioNome"]) ) {
            $tID = $_POST["usuarioId"];
            $exclusao = "UPDATE usuario SET statusUsuario = 0 ";
            $exclusao .= "WHERE usuarioId = {$tID}";
            $con_exclusao = mysqli_query($conecta, $exclusao);
            if ( !$con_exclusao ) {
             die ("Registro não desativado");   
            } 
        }
		
        // Consulta a tabela de clientes
        $tr = "SELECT usuarioId, usuarioLogin, usuarioNome, u.nivelId, dataCadastro, nomeNivel FROM usuario u INNER JOIN nivel n ON u.nivelId = n.nivelId ";
        if ( isset($_GET["codigo"]) ) {
            $id = $_GET["codigo"];
            $tr .= "WHERE usuarioId = {$id} ";
        }

    $con_clientes = mysqli_query($conecta, $tr);
    if (!$con_clientes ) {
        die("Erro na consulta");
        
    }

    $info_clientes = mysqli_fetch_assoc($con_clientes);
	
	

?>




	


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Remoção de Usuário</title>
        
       
    </head>

    <body>
      
        
        <main>  
            	<div class="centralizar">
                <form action="excluirUsuario.php?codigo=<?php echo $id ?>" method="post">
                    <div class="subtitulo"><h1>Exclusão de Usuário</h1><h4>Desativar usuário: <?php echo $info_clientes["usuarioNome"]; ?> </h4></div>
                    <fieldset class="grupo">
                    <div class="campo">
                    <label for="usuarioNome">Nome do Usuario</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["usuarioNome"])  ?>" style="width: 850px" maxlength="99" name="usuarioNome" id="usuarioNome" >					</div>
                    </fieldset>
                    <fieldset class="grupo">
					<div class="campo">
                    <label for="usuarioLogin">Login</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["usuarioLogin"])  ?>" style="width: 850px" maxlength="99" name="usuarioLogin" id="usuarioLogin" >
                    </div>
                    </fieldset>
                    <fieldset class="grupo">
                    <div class="campo">
                    <label for="nomeNivel">Nivel</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["nomeNivel"])  ?>" style="width: 850px" maxlength="99" name="nomeNivel" id="nomeNivel" >
                    </div>
                    <input type="hidden" name="usuarioId" value="<?php echo $info_clientes["usuarioId"] ?>">
                    </fieldset>
                    
                    
                    
                    <input type="submit" style="float:left; margin-right:30px;" class="botao" value="Confirmar Remoção"> 
                    
                    
                    
                     <?php
					if(isset($con_exclusao)){
					 	?>
                     
                        <?php echo '
							<script type="text/JavaScript">
							alert("Usuário desativado com sucesso");
							location.href="listaUsuario.php"
							</script>
							'; ?>
						
				
						
						<?php	
						
					}
				
				
				?>
                                       
        </form>   
        
        
        
        
            <form method="POST" action="excluirUsuario.php?codigo=<?php echo $id ?>">
            <input type="submit" class="botao" name="resetPass" value="Resetar Senha"/>
            
            </form>

<?php
// Botão para resetar senha
    if(isset($_POST['resetPass'])){
        	$tr2 = "UPDATE usuario SET senha = '', resetaSenha = 0 WHERE usuarioId = {$id} ";
			$consulta_tr2 = mysqli_query($conecta, $tr2);
			
			
    if(!$consulta_tr2) {
        die("erro no banco");

	}
			
	
		}
		
		
					if(isset($consulta_tr2)){
					 	?>
                     
                        <?php echo '
							<script type="text/JavaScript">
							alert("Senha resetada com sucesso");
							location.href="main.php"
							</script>
							'; ?>
						
				
						
						<?php	
						
					}
				
				
				?>
		



        </main>

   
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>