<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("verificacaoNivel.php"); ?>

<?php 
// Consulta a tabela de alunos
    $tr = "SELECT * ";
    $tr .= "FROM escola ";
        if ( isset($_GET["codigo"]) ) {
            $id = $_GET["codigo"];
            $tr .= "WHERE escolaId = {$id} ";
        } else {
            $tr .= "WHERE escolaId = 1 ";
        }

    $con_clientes = mysqli_query($conecta,$tr);
    if (!$con_clientes ) {
        die ("Erro na consulta");
    }

    $info_clientes = mysqli_fetch_assoc($con_clientes);
?>


<?php
    if (isset($_POST["nomeEscola"] )  AND ( $_POST["escolaId"] == $id ) ) {
        $nomeEscola	   		   = utf8_decode($_POST["nomeEscola"]);
		$enderecoEscola		   = utf8_decode($_POST["enderecoEscola"]);
		$numeroEscola		   = $_POST["numeroEscola"];
		$bairroEscola      	   = utf8_decode($_POST["bairroEscola"]);
		$cidadeEscola          = utf8_decode($_POST["cidadeEscola"]);
		$telefoneEscola        = $_POST["telefoneEscola"];
		$estado         	   = utf8_decode($_POST["estados"]);
		$responsavel           = utf8_decode($_POST["responsaveis"]);
		
        
        $tID            = $_POST["escolaId"];
        
        // Objeto para alterar
        
        $alterar  = "UPDATE escola ";
        $alterar .= "SET ";
        $alterar .= "nomeEscola 			    = UPPER('{$nomeEscola}'), ";
		$alterar .= "enderecoEscola 			= UPPER('{$enderecoEscola}'), ";
        $alterar .= "numeroEscola 				= UPPER('{$numeroEscola}'), ";
		$alterar .= "bairroEscola				= UPPER('{$bairroEscola}'), ";
		$alterar .= "cidadeEscola 				= UPPER('{$cidadeEscola}'), ";
		$alterar .= "estadoID					= UPPER('{$estado}'), ";
		$alterar .= "responsavelEscola			= UPPER('{$responsavel}'), ";
		$alterar .= "telefoneEscola 			= UPPER('{$telefoneEscola}') ";
        
		
		
		
        $alterar .= "WHERE escolaId 	= {$tID} ";
        
        $operacao_alterar = mysqli_query($conecta, $alterar);
        if (!$operacao_alterar) {
            die("Erro na alteração");
        } 
        
    }

?>



<?php
    	
	
    // Consulta aos estados
    $estados = "SELECT * ";
    $estados .= "FROM estados ";
    $lista_estados = mysqli_query($conecta,$estados);
    if ( !$lista_estados ) {
        die ("Erro no banco");
        
    }
	
	 // Consulta responsavel
    $respons = "SELECT * ";
    $respons .= "FROM usuario ";
    $lista_resp = mysqli_query($conecta,$respons);
    if ( !$lista_resp ) {
        die ("Erro no banco");
        
    }
	
	

?>



<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alteração de Unidade</title>
   
    </head>

    <body>
 
        <main>  
            <div class="centralizar">
                <form action="alterarUnidade.php?codigo=<?php echo $id ?>" method="post">
                   <div class="subtitulo"> <h1>Alteração de Unidade</h1><h4>Alterar dados de unidade cadastrada</h4> </div>
                  
                  
                  	<fieldset>
                    <fieldset class="grupo">
                        <div class="campo">
                    <label for="nomeEscola">Nome da Unidade</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["nomeEscola"])  ?>" style="width: 850px" maxlength="99" name="nomeEscola" id="nomeEscola" required>
                    	</div>
                    </fieldset>
                    
                    
                    <fieldset>
                    <fieldset class="grupo">
                        <div class="campo">
                    <label for="enderecoEscola">Endereço</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["enderecoEscola"])  ?>" style="width: 380px" maxlength="99" name="enderecoEscola" id="enderecoEscola" required>
                   	    </div>
                    
                    	<div class="campo">
                    <label for="numeroEscola">Número</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["numeroEscola"])  ?>" style="width: 50px" maxlength="99" name="numeroEscola" id="numeroEscola" required>
                    </div>
                    	<div class="campo">
                    <label for="bairroEscola">Bairro</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["bairroEscola"])  ?>" style="width: 380px" maxlength="99" name="bairroEscola" id="bairroEscola" required> 
                    </div>
                    </fieldset>
                    
                    
                    <fieldset>
                    <fieldset class="grupo">
                  		<div class="campo">
                    <label for="cidadeEscola" >Cidade</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["cidadeEscola"])  ?>" style="width: 450px" maxlength="99" name="cidadeEscola" id="cidadeEscola" required>
                   	   </div>
                    
                    
                    	<div class="campo">
                    <label for="estados">Estado</label>
                    <select id="estados" name="estados" style="width: 383px" maxlength="99" required> 
                        <?php 
                            $meuestado = $info_clientes["estadoID"];
                            while($linha = mysqli_fetch_assoc($lista_estados)) {
                                $estado_principal = $linha["estadoID"];
                                if($meuestado == $estado_principal) {
                        ?>
                            <option value="<?php echo $linha["estadoID"] ?>" selected>
                                <?php echo utf8_encode($linha["nome"]) ?>
                            </option>
                        <?php
                                } else {
                        ?>
                            <option value="<?php echo $linha["estadoID"] ?>" >
                                <?php echo utf8_encode($linha["nome"]) ?>
                            </option>                        
                        <?php 
                                }
                            }
                        ?>
                    </select>
                    </div>
                    </fieldset>
                    <fieldset class="grupo">
                    	<div class="campo">
                    <label for="telefoneEscola">Telefone</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["telefoneEscola"])  ?>" style="width: 385px" OnKeyPress="formatar('## ####-####', this)" maxlength="12" name="telefoneEscola" id="telefoneEscola" required>
                    	</div>
                        <div class="campo">
                    <label for="responsaveis">Responsável</label>
                   	<input type="text" value="<?php echo utf8_encode($info_clientes["responsavelEscola"])  ?>" style="width: 449px" maxlength="99" name="responsaveis" id="responsaveis" required>
              			</div>
                    <input type="hidden" name="escolaId" value="<?php echo $info_clientes["escolaId"] ?>" required>
                    </fieldset>
                    <input type="submit" class="botao" value="Confirmar alteração">
                    
                    <?php
					if(isset($operacao_alterar)){
					 	?>
                     
                        <?php echo '
							<script type="text/JavaScript">
							alert("Unidade alterada com sucesso");
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