<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("verificacaoNivel.php"); ?>


<?php
        if ( isset($_POST["nomeEscola"]) ) {
            $tID = $_POST["escolaId"];
            $exclusao = "UPDATE escola SET statusEscola = 0 ";
            $exclusao .= "WHERE escolaId = {$tID}";
            $con_exclusao = mysqli_query($conecta, $exclusao);
            if ( !$con_exclusao ) {
             die ("Registro não desativado");   
            } 
        }
		
        // Consulta a tabela de Unidades
        $tr = "SELECT * FROM escola ";
        if ( isset($_GET["codigo"]) ) {
            $id = $_GET["codigo"];
            $tr .= "WHERE escolaId = {$id} ";
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
        <title>Remoção de Unidade</title>
        
       
    </head>

    <body>
      
        
        <main>  
            <div class="centralizar">
                <form action="excluirUnidade.php?codigo=<?php echo $id ?>" method="post">
                    <div class="subtitulo"><h1>Exclusão de Unidade</h1><h4>Desativar unidade: <?php echo $info_clientes["nomeEscola"]; ?> </h4></div>
                    <fieldset class="grupo">
                    <div class="campo">
                    <label for="nomeEscola">Nome da Escola</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["nomeEscola"])  ?>" style="width: 850px" maxlength="99" name="nomeEscola" id="nomeEscola" >
					</div>
                    </fieldset>
                    <fieldset class="grupo">
                    <div class="campo">
                    <label for="enderecoEscola">Endereço</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["enderecoEscola"])  ?>" style="width: 850px" maxlength="99" name="enderecoEscola" id="enderecoEscola" >
                    </div>
                    </fieldset>
                    <fieldset class="grupo">
                    <div class="campo">
                    <label for="cidadeEscola">Cidade</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["cidadeEscola"])  ?>" style="width: 850px" maxlength="99" name="cidadeEscola" id="cidadeEscola" >
                    </div>
                    <input type="hidden" name="escolaId" value="<?php echo $info_clientes["escolaId"] ?>">
                    </fieldset>
                    <input type="submit" class="botao" value="Confirmar Exclusão"> 
                    
                     <?php
					if(isset($con_exclusao)){
					 	?>
                     
                        <?php echo '
							<script type="text/JavaScript">
							alert("Unidade desativada com sucesso");
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