<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("incluiFoto.php"); ?>


<?php
    // Insercao no banco
    if (isset ($_POST["nomeAluno"])  ) {
		$USERPROF      = $_SESSION['IDUSER'];
		$IDESCOLAPROF  = $_SESSION['IDESCOLAPROF'];
		$resultadoFoto = publicarImagem($_FILES['fotoDoAluno']);
		
		$mensagem = $resultadoFoto[0];
		
        $nomeAluno    			 =  utf8_decode ($_POST["nomeAluno"]);
		$dataNascimento          =  $_POST["dataNascimento"];
        $graduacaoId     		 =  utf8_decode ($_POST["graduacaoId"]);
		$nomeResp     			 =  utf8_decode ($_POST["nomeResp"]);
		$rgResp	 			     =  $_POST["rgResp"];
		$cpfResp				 =  $_POST["cpfResp"];
		$rg	 					 =  $_POST["rg"];
		$cpf				     =  $_POST["cpf"];
		$logId				     =  $_POST["logradouro"];
		$endereco			     = utf8_decode ($_POST["endereco"]);
        $numero        		     =  $_POST["numero"];
        $bairro        			 =  utf8_decode ($_POST["bairro"]);
        $complemento             =  utf8_decode ($_POST["complemento"]);
        $cidade     			 =  utf8_decode ($_POST["cidade"]);
		$estados        	 	 =  $_POST["estados"];
		$cep					 =  $_POST["cep"];
		$email					 =  $_POST["email"];
		$telefone           	 =  $_POST["telefone"];
		$celular         	     =  $_POST["celular"];
		$dataCadAluno 	         =  $_POST["dataCadAluno"];
		$obsAluno     			 =  utf8_decode ($_POST["obsAluno"]);
		$fotoAluno 				 =  $resultadoFoto[1];
		$numeroCarteira    	     =  $_POST["numeroCarteira"];
		
		
        
        $inserir          = "INSERT INTO aluno ";
        $inserir         .=  "(usuarioId, nomeAluno, dataNascimento, graduacaoId, escolaId, nomeResp, rgResp, cpfResp,  rg, cpf, logId,  endereco, numero, bairro, complemento, cidade, estadoID, cep, email, telefone, celular, dataCadAluno, obsAluno, fotoAluno, numeroCarteira ) ";
        $inserir         .= "VALUES ";
        $inserir         .= "($USERPROF, UCASE('$nomeAluno'), '$dataNascimento', $graduacaoId, $IDESCOLAPROF, UCASE('$nomeResp'), UCASE('$rgResp'), UCASE('$cpfResp'), UCASE('$rg'), UCASE('$cpf'), $logId,  UCASE('$endereco'), UCASE('$numero'), UCASE('$bairro'), UCASE('$complemento'), UCASE('$cidade'), UCASE($estados), UCASE('$cep'), UCASE('$email'), UCASE('$telefone'), UCASE('$celular'), UCASE('$dataCadAluno'), UCASE('$obsAluno'), '$fotoAluno', '$numeroCarteira' )";
		
		
        
        $operacao_inserir = mysqli_query($conecta,$inserir);
        if (!$operacao_inserir )   {
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
	
	// Seleção de graduação
    $select2 = "SELECT * ";
    $select2 .= " FROM graduacao ";
    $lista_graduacao = mysqli_query($conecta, $select2);
    if (!$lista_graduacao){
       die("Erro no banco");   
        
    }
	
	// Seleção de logradouro
    $select3  = "SELECT * ";
    $select3 .= "FROM logradouro ";
    $lista_logradouro = mysqli_query($conecta, $select3);
    if (!$lista_logradouro){
       die("Erro no banco");   
        
    }

?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Aluno</title>
        <script src="js/script.js"> </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <script>
            stop = '';
            function mascaraTel( telefone ) {
            telefone.value = telefone.value.replace( /[^\d]/g, '' )
                                           .replace( /^(\d\d)(\d)/, '($1) $2' )
                                           .replace( /(\d{4})(\d)/, '$1-$2' );
            if ( telefone.value.length > 14 ) telefone.value = stop;
            else stop = telefone.value;    
            }
        </script>
        
        <script>
            stop = '';
            function mascaraCel ( celular ) {
            celular.value = celular.value.replace( /\D/g,"" )
                                           .replace( /^(\d{2})(\d)/g,"($1) $2" )
                                           .replace( /(\d)(\d{4})$/,"$1-$2" );
            if ( celular.value.length > 15 ) celular.value = stop;
            else stop = celular.value;    
            }
        </script>
        
        


    </head>

   		 <body>
     	   <main>  
             <div class="centralizar">  
			 
			 <div class="subtitulo"><h1>Cadastro de Aluno</h1><h4>Cadastre aqui os alunos da sua unidade</h4></div>
        		
              		<form action="cadAluno.php" method="post" name="formCad" enctype="multipart/form-data">
               		<fieldset class="grupo">
                      <div class="campo">
                      <label for="fotoDoAluno">Foto do aluno</label>
                      <input type="file" name="fotoDoAluno">
                         <?php
						 
						 		if (isset($mensagem) ) {
								 	echo $mensagem;	
								} 
						 
						 ?>
                         </div>
                         <br>
                    </fieldset>
                   <fieldset class="grupo">
                       <div class="campo">
                      		 <label for="nomeAluno">Nome do aluno <span style="font-weight:bold;">*</span></label>
                			<input type="text" name="nomeAluno" style="width: 600px" maxlength="200" placeholder="Nome do aluno" required>
                       </div>
                       <div class="campo">
                      		<label for="dataNascimento">Data de nascimento <span style="font-weight:bold;">*</span></label>
                			<input type="date" id="bday" style="width: 250px" min="1910-01-01" name="dataNascimento" onchange="verifIdade()" required>
                       </div>
                   </fieldset>
                        
                <div id="responsavel">
                            
                    <fieldset class="grupo">
                        
                        <div class="campo">
                       		<label for="nomeResp">Nome do Responsável</label>
                			<input type="text" style="width: 397px" id="nomeResp" name="nomeResp" maxlength="100"  placeholder="Nome do Responsável">
                       </div>                       
                       <div class="campo">
                       		<label for="rg">RG <span style="font-weight:bold;">*</span> <span style="font-size:10px;">(Não utilizar pontos nem traços)</span></label>
                			<input type="text" style="width: 189.3px" id="rgResp" OnKeyPress="formatar('##.###.###-#', this)" maxlength="12" name="rgResp" placeholder="RG do Responsável">
                       </div>
                       <div class="campo">
                       		<label for="cpf">CPF <span style="font-weight:bold;">*</span> <span style="font-size:10px;">(Não utilizar pontos nem traços)</span></label>
                			<input type="text" style="width: 209.3" id="cpfResp" onBlur="VerificaCPFResp();" name="cpfResp" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14"  placeholder="CPF do Responsável">
                       </div>
                       
                      
                       </fieldset>
                        
                        
                        
                        </div>
                        
                   <fieldset class="grupo">
                       <div class="campo">
                       		<label for="graduacaoId">Graduação <span style="font-weight:bold;">*</span></label>
                			<select name="graduacaoId" style="width: 230px" required>
                            <option value="" disabled selected>Selecione a graduação</option>
                            <?php
                                while($linha2 = mysqli_fetch_assoc($lista_graduacao) ){
                                    
        
                            ?>
                            <option value="<?php echo $linha2["graduacaoId"]; ?>">
                                <?php echo utf8_encode($linha2["graduacaoNome"]);    ?>
                            </option>
                             
                             
                            <?php
                                }
                                
                            ?>
                            </select>
                       </div>
                       <div class="campo">
                       		<label for="rg" id="rgLabel">RG <span style="font-weight:bold;">*</span> <span style="font-size:10px;">(Não utilizar pontos nem traços)</span></label>
                			<input type="text" style="width: 189.3px" OnKeyPress="formatar('##.###.###-#', this)" maxlength="12" id="rgAluno" name="rg" placeholder="Número do RG" required>
                       </div>
                       <div class="campo">
                       		<label for="cpf" id="cpfLabel">CPF <span style="font-weight:bold;">*</span> <span style="font-size:10px;">(Não utilizar pontos nem traços)</span></label>
                			<input type="text" style="width: 209.3" id="cpfAluno" name="cpf" onBlur="VerificaCPF();" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14"  placeholder="Número do CPF" required>
                       </div>
                       <div class="campo">
                       		<label for="numeroCarteira">Carteira</label>
                			<input type="text" style="width: 189.3" name="numeroCarteira" maxlength="30"  placeholder="Número da carteira">
                       </div>
                      
                       </fieldset>
                   <fieldset class="grupo">
                   <div class="campo">
                   			<label for="logradouro">Logradouro <span style="font-weight:bold;">*</span></label>
               	            <select name="logradouro" style="width: 150px" required>
                            <option value="" disabled selected>Logradouro</option>
                            <?php
                                while($linha3 = mysqli_fetch_assoc($lista_logradouro) ){
                                    
        
                            ?>
                            <option value="<?php echo $linha3["logId"]; ?>">
                                <?php echo utf8_encode($linha3["logAbv"]);    ?> - <?php echo utf8_encode($linha3["logNome"]);    ?>
                            </option>
                             
                             
                            <?php
                                }
                                
                            ?>
                            </select>  
                       </div>
                       <div class="campo">
                       		<label for="endereco">Endereço <span style="font-weight:bold;">*</span></label>
               	            <input type="text" name="endereco"  style="width: 350px" maxlength="150" placeholder="Endereço" required>  
                       </div>
                       <div class="campo">
                       		<label for="numero">Número <span style="font-weight:bold;">*</span></label>
                			<input type="text" name="numero" style="width: 100px" maxlength="10" placeholder="Número" required> 
                       </div>
                       <div class="campo">
                       		<label for="bairro">Bairro <span style="font-weight:bold;">*</span></label>
						    <input type="text" name="bairro"  style="width: 220px" maxlength="150" placeholder="Nome do bairro" required>
                       </div>
                   </fieldset>
                   <fieldset class="grupo">
                       <div class="campo">
                       		<label for="complemento">Complemento</label>
                 			<input type="text" name="complemento" style="width: 350px" maxlength="250" placeholder="Complemento">
                       </div>
                       <div class="campo">
                       		<label for="cidade">Cidade <span style="font-weight:bold;">*</span></label>
                 			<input type="text" name="cidade"  style="width: 200px" maxlength="200" placeholder="Nome da cidade" required>
                       </div>
                       <div class="campo">
                       		<label for="estados">UF <span style="font-weight:bold;">*</span></label>
                            <select name="estados" style="width: 60px" required>
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
                       		<label for="cep">CEP <span style="font-weight:bold;">*</span> <span style="font-size:10px;">(Não utilizar pontos nem traços)</span></label>
                 			<input type="text" name="cep" style="width: 210px" OnKeyPress="formatar('##.###-###', this)" maxlength="10" placeholder="Número do CEP" required>
                       </div>
                   </fieldset>
                   <fieldset class="grupo">
                       <div class="campo">
                       		<label for="email">E-mail</label>
                 			<input type="text" name="email" style="width: 868px" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="200" placeholder="Digite o e-mail" > 
                       </div>
                   </fieldset>
                   <fieldset class="grupo">
                       <div class="campo">
                       		<label for="telefone">Telefone <span style="font-size:10px;">(Digite apenas DDD e Número)</span></label>
                 			<input type="text" onkeydown="mascaraTel( this )" onkeyup="mascaraTel( this )" name="telefone" id="telefone" style="width: 426px" maxlength="14" placeholder="Número do telefone" >
                       </div>
                       <div class="campo">
                       		<label for="celular">Celular <span style="font-size:10px;">(Digite apenas DDD e Número)</span></label>
                            <input type="text" name="celular" onkeydown="mascaraCel( this )" onkeyup="mascaraCel( this )" id="celular" style="width: 426px" maxlength="15" placeholder="Número do celular" >
                       </div>
                   </fieldset>
                   <fieldset class="grupo">
                        <div class="campo">
                        <label for="obsAluno">Observação</label>
                        <textarea name="obsAluno" style="width:868px; height: 200px; max-width:868px; max-height:200px"; resize: none; placeholder="Digite a observação"></textarea>     
                       </div>
                       </fieldset>
                       <fieldset class="grupo">
                       <div class="campo">
                       <label for="dataCadAluno">Data de início <span style="font-weight:bold;">*</span></label>
                       <input type="date" value="<?php echo date('Y-m-d');?>" min="1980-01-01" maxlength="10" name="dataCadAluno" id="dataCadAluno" required >
                       </div>
                 	  </fieldset>
                      
                	<p> Campos com * são obrigatórios. </p>
                    <br>

    					      	<button type="submit" class="botao">Cadastrar</button>
        
                
                <?php
					if(isset($operacao_inserir)){
					 	?>
                     
                        <?php echo '
							<script type="text/JavaScript">
							alert("Aluno cadastrado com sucesso!");
							location.href="cadAluno.php"
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