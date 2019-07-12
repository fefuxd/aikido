<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("verificacaoNivel.php"); ?>


<?php
    // Insercao no banco
    if (isset ($_POST["nomeAmigo"])  ) {
		
	
        $nomeAmigo    			 =  utf8_decode ($_POST["nomeAmigo"]);
		$nascimentoAmigo         =  $_POST["nascimentoAmigo"];
        $emailAmigo     		 =  utf8_decode ($_POST["emailAmigo"]);
		
		
		
        
        $inserir          = "INSERT INTO amigo ";
        $inserir         .= "(nomeAmigo, nascimentoAmigo, emailAmigo ) ";
        $inserir         .= "VALUES ";
        $inserir         .= "( UCASE('$nomeAmigo'), '$nascimentoAmigo' , UCASE('$emailAmigo') )";
		
		
        
        $operacao_inserir = mysqli_query($conecta,$inserir);
        if (!$operacao_inserir )   {
            die("Erro ao cadastrar no banco");
        }
        
    } 
		


	// Lista de amigos
    $select2 = "SELECT * FROM amigo ";
    
    $lista_amigo = mysqli_query($conecta, $select2);
   
	
	if ( !$lista_amigo ) {
            die("Falha no banco");
        }



?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de amigo</title>
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    </head>

   		 <body>
     	   <main>  
             <div class="centralizar">  
			 
			 <div class="subtitulo"><h1>Cadastro de Amigo</h1><h4>Cadastre aqui seus amigos</h4></div>
        		
              		<form action="cadAmigo.php" method="post">
               		

                   <fieldset class="grupo">
                       <div class="campo">
                      		 <label for="nomeAmigo">Nome do amigo <span style="font-weight:bold;">*</span></label>
                			<input type="text" name="nomeAmigo" style="width: 600px" maxlength="200" placeholder="Nome do amigo" required>
                       </div>
                       <div class="campo">
                      		<label for="nascimentoAmigo">Data de nascimento <span style="font-weight:bold;">*</span></label>
                			<input type="date" style="width: 250px" min="1910-01-01" name="nascimentoAmigo" required>
                       </div>
                   </fieldset>
                        
              
                   <fieldset class="grupo">
                       <div class="campo">
                       		<label for="emailAmigo">E-mail</label>
                 			<input type="text" name="emailAmigo" style="width: 868px" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="200" placeholder="Digite o e-mail" > 
                       </div>
                  </fieldset>
                  <br>
					<button type="submit" class="botao">Cadastrar</button>
        
                
                <?php
					if(isset($operacao_inserir)){
					 	?>
                     
                        <?php echo '
							<script type="text/JavaScript">
							alert("Amigo cadastrado com sucesso!");
							location.href="cadAmigo.php"
							</script>
							'; ?>
						
				
						
						<?php	
						
					}
				
				
				?>
                
                </form>  
                <br><br>
                
                <h1> Amigos cadastrado </h1>
  <br>
   <table> 
            <tr>
             <th> Nome </th> 
             <th> Nascimento </th>
             <th> Email </th> 	
             <th> Remover </th>
            </tr>
           
            <?php
                while($linha = mysqli_fetch_assoc($lista_amigo )) 
                {
            ?>
              
            <tr> 
             <td> <?php echo utf8_encode($linha["nomeAmigo"]) ?> </td>
             <td> <?php echo date("d/m/Y", strtotime ($linha["nascimentoAmigo"])) ?> </td>
             <td> <?php echo utf8_encode($linha["emailAmigo"]) ?> </td>
             <td> <a title="Desativar" href="excluirAmigo.php?codigo=<?php echo $linha["amigoId"] ?>"><i class="fa fa-times"></i></a></td>
            </tr>
   
		<?php
            }
        ?>
                 
                             
            </div>
        </main>

      
    </body>
   
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>