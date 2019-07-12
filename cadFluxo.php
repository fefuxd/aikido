<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("incluiFluxo.php"); ?>



<?php
    // Insercao no banco
     if (isset ($_POST["tituloFluxo"])  ) {
		$USERPROF      = $_SESSION['IDUSER'];
		$IDESCOLAPROF  = $_SESSION['IDESCOLAPROF'];
		$resultadoArquivo = publicarImagem($_FILES['arquivoFluxo']);
		
		$mensagem = $resultadoArquivo[0];
		
        $dataFluxo    		 =  utf8_decode ($_POST["dataFluxo"]);
		$tituloFluxo         =  $_POST["tituloFluxo"];	
		$pathFluxo 			 =  $resultadoArquivo[1];
		
        $inserir          = "INSERT INTO caixa ";
        $inserir         .=  "( escolaId, usuarioId, dataFluxo, tituloFluxo, pathFluxo ) ";
        $inserir         .= "VALUES ";
        $inserir         .= "( $IDESCOLAPROF, $USERPROF, '$dataFluxo' , UCASE('$tituloFluxo'), '$pathFluxo' )";
		
		
        
        $operacao_inserir = mysqli_query($conecta,$inserir);
        if (!$operacao_inserir )   {
            die("Erro ao cadastrar no banco");
        }
        
    } 
		


	// Lista de amigos
    $select2 = "SELECT * FROM caixa ";
    
    $lista_amigo = mysqli_query($conecta, $select2);
   
	
	if ( !$lista_amigo ) {
            die("Falha no banco");
        }
		
		
	// Ver nivel dos usuários
    $select3 = "SELECT * FROM usuario WHERE usuarioId = {$user} ";
    
    $lista_nivel = mysqli_query($conecta, $select3);
   
	
	if ( !$lista_nivel ) {
            die("Falha no banco");
        } else {
		$dados_niveis = mysqli_fetch_assoc($lista_nivel);
        $nivelId   = $dados_niveis["nivelId"];	
			
		}



?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro Fluxo de caixa</title>
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    </head>

   		 <body>
     	   <main>  
             <div class="centralizar">  
			 <?php if ( $nivelId > 1 ) { ?>
			 <div class="subtitulo"><h1>Cadastro de caixa</h1></div>
        		
                
              		<form action="cadFluxo.php" method="post" name="formCad" enctype="multipart/form-data">
               		

                   <fieldset class="grupo">
                       <div class="campo">
                      		<label for="dataFluxo">Data <span style="font-weight:bold;">*</span></label>
                			<input type="date" name="dataFluxo" required>
                       </div>
                       <div class="campo">
                      		<label for="tituloFluxo">Titulo <span style="font-weight:bold;">*</span></label>
                			<input type="text" maxlength="200" name="tituloFluxo" required>
                       </div>
                   </fieldset>
                        
              
                   <fieldset class="grupo">
                       <div class="campo">
                      <label for="arquivoFluxo">Inserir ata</label>
                      <input type="file" name="arquivoFluxo">
                         <?php
						 
						 		if (isset($mensagem) ) {
								 	echo $mensagem;	
								} 
						 
						 ?>
                         </div>
                         <br>
                  </fieldset>
                  <br>
					<button type="submit" style="display:none;" class="botao">Cadastrar</button>
        <?php 
				}
				?>
                
                <?php
					if(isset($operacao_inserir)){
					 	?>
                     
                        <?php echo '
							<script type="text/JavaScript">
							alert("Fluxo de caixa cadastrado com sucesso!");
							location.href="cadFluxo.php"
							</script>
							'; ?>
						
				
						
						<?php	
						
					}
				
				
				?>
                
                </form>  
                <br><br>
                
                <h1> Fluxo de caixa </h1>
  <br>
   <table> 
            <tr>
             <th> Data </th> 
             <th> Titulo </th>
             <th> Visualizar </th>
              <?php if ( $nivelId > 1 ) { ?> 	
             <th> Remover </th>
             <?php } ?>
            </tr>
           
            <?php
                while($linha = mysqli_fetch_assoc($lista_amigo )) 
                {
            ?>
              
            <tr> 
             <td> <?php echo date("d/m/Y", strtotime ($linha["dataFluxo"])) ?> </td>	
             <td> <?php echo utf8_encode($linha["tituloFluxo"]) ?> </td>
             <td> <?php echo '<a href="http://www.brasilaikido.com.br/restrito/'.utf8_encode($linha["pathFluxo"]).'"><i class="fa fa-eye"></i></a>'?> </td>
             <?php if ( $nivelId > 1 ) { ?> 
             <td> <a title="Desativar" href="excluirFluxo.php?codigo=<?php echo $linha["fluxoId"] ?>"><i class="fa fa-times"></i></a></td>
             <?php } ?>
            </tr>
   
		<?php
            }
        ?>
                 
                             
            </div>
        </main>
		<script>
			function verificaMostraBotao(){
				$('input[type=file]').each(function(index){
					if ($('input[type=file]').eq(index).val() != ""){
						$('.botao').show();
					}
					});
					}
			
				$('input[type=file]').on("change", function(){
					verificaMostraBotao();
				});
				
				$('.botao').on("click", function(){
				$('.botao').hide();
				});

		</script>
      
    </body>
   
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>