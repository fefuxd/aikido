<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("incluiReuniao.php"); ?>

<?php
    // Insercao no banco
     if (isset ($_POST["tituloReuniao"])  ) {
		$USERPROF      = $_SESSION['IDUSER'];
		$IDESCOLAPROF  = $_SESSION['IDESCOLAPROF'];
		$resultadoArquivo = publicarImagem($_FILES['arquivoReuniao']);
		
		$mensagem = $resultadoArquivo[0];
		
        $dataReuniao    		 =  utf8_decode ($_POST["dataReuniao"]);
		$tituloReuniao        	 =  $_POST["tituloReuniao"];	
		$pathReuniao 			 =  $resultadoArquivo[1];
		
        $inserir          = "INSERT INTO reuniao ";
        $inserir         .=  "( escolaId, usuarioId, dataReuniao, tituloReuniao, pathReuniao ) ";
        $inserir         .= "VALUES ";
        $inserir         .= "( $IDESCOLAPROF, $USERPROF, '$dataReuniao' , UCASE('$tituloReuniao'), '$pathReuniao' )";
		
		
        
        $operacao_inserir = mysqli_query($conecta,$inserir);
        if (!$operacao_inserir )   {
            die("Erro ao cadastrar no banco");
        }
        
    } 
		


	// Lista de amigos
    $select2 = "SELECT * FROM reuniao ";
    
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
        <title>Cadastro de ata</title>
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		
    </head>

   		 <body>
     	   <main>  
             <div class="centralizar">  
			 <?php if ( $nivelId > 1 ) { ?>
			 <div class="subtitulo"><h1>Cadastro de ata</h1></div>
        		
                
              		<form action="cadReuniao.php" method="post" name="formCad" enctype="multipart/form-data">
               		

                   <fieldset class="grupo">
                       <div class="campo">
                      		<label for="dataReuniao">Data <span style="font-weight:bold;">*</span></label>
                			<input type="date" name="dataReuniao" required>
                       </div>
                       <div class="campo">
                      		<label for="tituloReuniao">Titulo <span style="font-weight:bold;">*</span></label>
                			<input type="text" maxlength="200" name="tituloReuniao" required>
                       </div>
                   </fieldset>
                        
              
                   <fieldset class="grupo">
                       <div class="campo">
                      <label for="arquivoReuniao">Inserir ata</label>
                      <input type="file" name="arquivoReuniao">
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
							alert("Ata de reunião cadastrada com sucesso!");
							location.href="cadReuniao.php"
							</script>
							'; ?>
						
				
						
						<?php	
						
					}
				
				
				?>
                
                </form>  
                <br><br>
                
                <h1> Atas de reunião </h1>
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
             <td> <?php echo date("d/m/Y", strtotime ($linha["dataReuniao"])) ?> </td>	
             <td> <?php echo utf8_encode($linha["tituloReuniao"]) ?> </td>
             <td> <?php echo '<a href="http://www.brasilaikido.com.br/restrito/'.utf8_encode($linha["pathReuniao"]).'"><i class="fa fa-eye"></i></a>'?> </td>
             <?php if ( $nivelId > 1 ) { ?> 
             <td> <a title="Desativar" href="excluirReuniao.php?codigo=<?php echo $linha["reuniaoId"] ?>"><i class="fa fa-times"></i></a></td>
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