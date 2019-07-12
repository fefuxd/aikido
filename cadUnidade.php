<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("verificacaoNivel.php"); ?>
<?php
    // Insercao no banco
    if (isset ($_POST["nomeEscola"]) ) {
        $nomeEscola    			 =  utf8_decode ($_POST["nomeEscola"]);
		$enderecoEscola			 =  utf8_decode ($_POST["enderecoEscola"]);
        $numeroEscola            =  $_POST["numeroEscola"];
		$bairroEscola    		 =  utf8_decode ($_POST["bairroEscola"]);
		$cidadeEscola    		 =  utf8_decode ($_POST["cidadeEscola"]);
		$estadoEscola    		 =  utf8_decode ($_POST["estadoEscola"]);
		$telefoneEscola        	 =  $_POST["telefoneEscola"];
		$responsavelEscola       =  utf8_decode ($_POST["responsavelEscola"]);
		
		
		
        
        $inserir          = "INSERT INTO escola ";
        $inserir         .=  "(nomeEscola, enderecoEscola, numeroEscola, bairroEscola, cidadeEscola, estadoId, telefoneEscola, responsavelEscola ) ";
        $inserir         .= "VALUES ";
        $inserir         .= "(UCASE('$nomeEscola'),UCASE('$enderecoEscola'),UCASE('$numeroEscola'), UCASE('$bairroEscola'), UCASE('$cidadeEscola'),UCASE($estadoEscola),UCASE('$telefoneEscola'),UCASE('$responsavelEscola') )";
		
		
        
        $operacao_inserir = mysqli_query($conecta,$inserir);
        if (!$operacao_inserir )  {
            die("Erro ao cadastrar no banco");
        }
        
    }
	

    // Seleção de estados
    $select = "SELECT estadoID, nome, sigla ";
    $select .= "FROM estados ";
    $lista_estados = mysqli_query($conecta, $select);
    if (!$lista_estados){
       die("Erro no banco");   
        
    }
	
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Unidade</title>
    </head>
   		 <body>
     	   <main>
          	 <div class="centralizar">  
     		  	<div class="subtitulo"><h1>Cadastro de Unidade</h1><h4>Cadastre aqui as unidades</h4> </div>
        			
              				<form action="cadUnidade.php" method="post">
                            
                 <fieldset>
                    <fieldset class="grupo">
                        <div class="campo">
                			<input type="text" name="nomeEscola" style="width: 868px" maxlength="99"   placeholder="Nome da escola" required>
                        </div>
                    </fieldset>
                        
                    <fieldset class="grupo">
                    	<div class="campo">
                			<input type="text" name="enderecoEscola" style="width: 515px" maxlength="99"   placeholder="Endereço" required>
                        </div>
                        <div class="campo">
                			<input type="text" name="numeroEscola" style="width: 100px" maxlength="9"   placeholder="Número" required>
                        </div>
                        <div class="campo">
                			<input type="text" name="bairroEscola" style="width: 220px" maxlength="99"   placeholder="Bairro" required>
                        </div>
                    </fieldset>
                    
                    <fieldset class="grupo">
                        <div class="campo">
                			<input type="text" name="cidadeEscola" style="width: 305px" maxlength="99"   placeholder="Cidade" required>
                        </div>
                        <div class="campo">                            
                            <select name="estadoEscola" style="width:60px" maxlength="10" required>
                            <option value="" disabled selected>--</option>
                            <?php
                                while($linha = mysqli_fetch_assoc($lista_estados) ){
                                    
        
                            ?>
                            <option value="<?php echo $linha["estadoID"]; ?>">
                                <?php echo utf8_encode($linha["sigla"]);    ?>
                            </option>
                             
                             
                            <?php
                                }
                                
                            ?>
                            </select>
                            </div>
                     
                   		
                        <div class="campo">
                 			<input type="text" name="telefoneEscola" style="width: 138px" OnKeyPress="formatar('## ####-####', this)" maxlength="12"  placeholder="Telefone" required>
                        </div>
                        <div class="campo">
                            <input type="text" name="responsavelEscola" style="width: 316px" maxlength="199"  placeholder="Responsável" required> 
                        </div> 
   					</fieldset>
    					      	<button type="submit" class="botao">Cadastrar</button>
        
                
                <?php
					if(isset($operacao_inserir)){
					 	?>
                     
                        <?php echo '
							<script type="text/JavaScript">
							alert("Unidade cadastrada com sucesso!");
							location.href="listaUnidade.php"
							</script>
							'; ?>
						
				
						
						<?php	
						
					}
				
				
				?>
                
            </form>                           
		  </div>
        </main>

      
    </body>
   
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>