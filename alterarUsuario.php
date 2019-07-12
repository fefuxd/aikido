<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("verificacaoNivel.php"); ?>

<?php 
// Consulta a tabela de usuarios
    $tr = "SELECT * ";
    $tr .= "FROM usuario ";
        if ( isset($_GET["codigo"]) ) {
            $id = $_GET["codigo"];
            $tr .= "WHERE usuarioId = {$id} ";
        } else {
            $tr .= "WHERE usuarioId = 1 ";
        }

    $con_clientes = mysqli_query($conecta,$tr);
    if (!$con_clientes ) {
        die ("Erro na consulta");
    }

    $info_clientes = mysqli_fetch_assoc($con_clientes);
?>


<?php
    if (isset($_POST["usuarioNome"] )  AND ( $_POST["usuarioId"] == $id ) ) {
        $usuarioNome	   		   = utf8_decode($_POST["usuarioNome"]);
		$usuarioLogin		 	   = utf8_decode($_POST["usuarioLogin"]);
		$nivel	        	 	   = utf8_decode($_POST["niveis"]);
		
        
        $tID            = $_POST["usuarioId"];
        
        // Objeto para alterar
        
        $alterar  = "UPDATE usuario ";
        $alterar .= "SET ";
        $alterar .= "usuarioNome 			    = UPPER('{$usuarioNome}'), ";
		$alterar .= "usuarioLogin 				= UPPER('{$usuarioLogin}'), ";
        $alterar .= "nivelId	 				= UPPER('{$nivel}') ";
		
		
        $alterar .= "WHERE usuarioId 	= {$tID} ";
        
        $operacao_alterar = mysqli_query($conecta, $alterar);
        if (!$operacao_alterar) {
            die("Erro na alteração");
        } 
        
    }



  // Consulta aos estados
    $estados = "SELECT * ";
    $estados .= "FROM nivel ";
    $lista_estados = mysqli_query($conecta,$estados);
    if ( !$lista_estados ) {
        die ("Erro no banco");
        
    }
	

?>





<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alteração de Usuário</title>
   
    </head>

    <body>
 
        <main>  
            <div class="centralizar">
                <form action="alterarUsuario.php?codigo=<?php echo $id ?>" method="post">
                    <div class="subtitulo"> <h1>Alteração de cadastro</h1><h4>Alterar dados de usuário cadastrado</h4> </div>
                  
                  
      				<fieldset class="grupo">
                    <div class="campo">            
                    <label for="usuarioNome">Nome do usuário</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["usuarioNome"])  ?>" style="width: 330px" maxlength="99" name="usuarioNome" id="usuarioNome" required>
          			</div>
                  
                    
                    <div class="campo">          
                    <label for="usuarioLogin">Login</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["usuarioLogin"])  ?>" style="width: 320px" maxlength="99" name="usuarioLogin" id="usuarioLogin" required>
                    </div>
                   
                   
                    
                    <div class="campo">
                    <label for="niveis">Nivel</label>
                    <select id="niveis" name="niveis" style="width: 140px;" required> 
                        <?php 
                            $meuestado = $info_clientes["nivelId"];
                            while($linha = mysqli_fetch_assoc($lista_estados)) {
                                $estado_principal = $linha["nivelId"];
                                if($meuestado == $estado_principal) {
                        ?>
                            <option value="<?php echo $linha["nivelId"] ?>" selected>
                                <?php echo utf8_encode($linha["nomeNivel"]) ?>
                            </option>
                        <?php
                                } else {
                        ?>
                            <option value="<?php echo $linha["nivelId"] ?>" >
                                <?php echo utf8_encode($linha["nomeNivel"]) ?>
                            </option>                        
                        <?php 
                                }
                            }
                        ?>
                    </select>
                    </div>
                    <input type="hidden" name="usuarioId" value="<?php echo $info_clientes["usuarioId"] ?>" required>
                    </fieldset>
                    
                    <input type="submit" class="botao" value="Confirmar alteração">
                    
                    <?php
					if(isset($operacao_alterar)){
					 	?>
                     
                        <?php echo '
							<script type="text/JavaScript">
							alert("Usuário alterado com sucesso");
							location.href="listaUsuario.php"
							</script>
							'; ?>
						
				
						
						<?php	
						
					}
				
				
				?>
                    
                                               
                </form>   
       
        </main>

     
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>