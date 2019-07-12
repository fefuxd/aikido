<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("verificacaoNivel.php"); ?>

<?php
	
	
	
    
	if (isset ($_POST["usuarioNome"]) ) {
		$usuarioLogin				 =  utf8_decode ($_POST["usuarioLogin"]);
		$nivelId   					 =  utf8_decode ($_POST["nivelId"]);
		$dataCadastro    			 =  utf8_decode ($_POST["dataCadastro"]);
		$usuarioNome    			 =  utf8_decode ($_POST["usuarioNome"]);
		$escolaId	    			 =  utf8_decode ($_POST["escolaId"]);
		
		// Checa se usuário ja existe
		$checa = "SELECT * from usuario WHERE usuarioLogin = '$usuarioLogin' ";
		$con_checa = mysqli_query($conecta,$checa);
	    if(!$con_checa) {
		die ("Erro interno");
	}
	
	
	if( mysqli_num_rows($con_checa) > 0){
		echo '
							<script type="text/JavaScript">
							alert("Este login já existe!");
							</script>
							';
		
	}  else {
	
	// Caso não exista - Insere no banco	
        $inserir          = "INSERT INTO usuario ";
        $inserir         .=  "(usuarioNome, usuarioLogin, senha, nivelId, dataCadastro, escolaId ) " ;
        $inserir         .= "VALUES " ;
        $inserir         .= "(UCASE('$usuarioNome'),'$usuarioLogin','','$nivelId','$dataCadastro', '$escolaId' ) " ;
		
		
        
        $operacao_inserir = mysqli_query($conecta,$inserir);
        if (!$operacao_inserir )  {
            die("Erro ao cadastrar no banco");
        }
        
    }
	
}


	// Seleção de Unidades
    $select2 = "SELECT * ";
    $select2 .= "FROM escola ";
    $lista_unidade = mysqli_query($conecta, $select2);
    if (!$lista_unidade){
       die("Erro no banco");   
        
    }

 
?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Usuário</title>
    </head>

   		 <body>
     	   <main>  
			  <div class="centralizar"> 
               <div class="subtitulo"><h1>Cadastro de Usuário</h1><h4>Cadastre aqui os usuários do sistema</h4> </div>

            <form action="cadUsuario.php" method="post">
                <fieldset>
                    <fieldset class="grupo">
                        <div class="campo">
                			<input type="text" name="usuarioNome" style="width: 220px" maxlength="99"   placeholder="Nome do usuário" required>
                        </div>
                        <div class="campo">
                			<input type="text" name="usuarioLogin" style="width: 220px" maxlength="99"   placeholder="Login" required>  
                        </div>
                        
                        <div class="campo">
                            <select name="nivelId" style="width: 100px" required>
                            <option value="" disabled selected>Nível</option>
							<option value="1">PROFESSOR </option>
                            <option value="2">ADMINISTRADOR </option>        
                            </select> 
                        </div>
                     
                        <div class="campo">
                            <select name="escolaId" style="width: 230px" required >
                            <option value="" disabled selected>Selecione a Unidade</option>
                            <?php
                                while($linha2 = mysqli_fetch_assoc($lista_unidade) ){
                                    
        
                            ?>
                            <option value="<?php echo $linha2["escolaId"]; ?>">
                                <?php echo utf8_encode($linha2["nomeEscola"]);    ?>
                            </option>
                             
                             
                            <?php
                                }
                                
                            ?>
                            </select>
                 			<input type="hidden" value="<?php echo date('Y-m-d');?>" name="dataCadastro" id="dataCadastro" required>

                        </fieldset>
    					      	<button type="submit" class="botao">Cadastrar</button>
                        </div>
        
                <?php
					if(isset($operacao_inserir)){
					 	?>
                     
                        <?php echo '
							<script type="text/JavaScript">
							alert("Usuário cadastrado com sucesso!");
							location.href="cadUsuario.php"
							</script>
							'; ?>
						
				
						
						<?php	
						
					}
				
				
				?>
                    </fieldset>
                </fieldset>
            </form>                           
			</div>
        </main>

      
    </body>
   
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>