<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("incluiFoto.php"); ?>

<?php 
// Consulta a tabela de alunos
    $tr = "SELECT * ";
    $tr .= "FROM aluno ";
        if ( isset($_GET["codigo"]) ) {
            $id = $_GET["codigo"];
            $tr .= "WHERE alunoId = {$id} ";
        } else {
            $tr .= "WHERE alunoId = 1 ";
        }

    $con_clientes = mysqli_query($conecta,$tr);
    if (!$con_clientes ) {
        die ("Erro na consulta");
    }

    $info_clientes = mysqli_fetch_assoc($con_clientes);
?>

<?php

  
   // Segurança para checar se aluno pertence a escola do professor lgoado
    if ( $nivelId < 2 ) {
  
  
	$teste = "SELECT a.escolaId as escolaAluno, u.escolaId as escolaProf, u.usuarioId FROM aluno a INNER JOIN usuario u WHERE alunoId = {$id} AND u.usuarioId = {$usuarioId} ";
	$con_teste = mysqli_query($conecta,$teste);
	if(!$con_teste) {
		die ("Erro interno");
	}
	
	$info_teste = mysqli_fetch_assoc($con_teste);
	$testinho = $info_teste["escolaAluno"];
	$testao   = $info_teste["escolaProf"];
	if( $testao <> $testinho ) {
	 echo '
							<script type="text/JavaScript">
							alert("Este aluno não pertence a sua unidade");
							location.href="mlistaAluno.php"
							</script>
							';	
	} 
	}
?>

<?php
    if (isset($_POST["nomeAluno"] ) AND ( $_POST["alunoId"] == $id ) ) {
		$resultadoFoto = publicarImagem($_FILES['fotoDoAluno']);
		
		$mensagem = $resultadoFoto[0];
		
        $nomeAluno	   		   = utf8_decode($_POST["nomeAluno"]);
		$dataNascimento        = $_POST["dataNascimento"];
		$nomeResp     		   = utf8_decode ($_POST["nomeResp"]);
		$rgResp	 			   = $_POST["rgResp"];
		$cpfResp			   = $_POST["cpfResp"];	
        $rg    			       = $_POST["rg"];
		$cpf 				   = $_POST["cpf"];
		$graduacaoId           = utf8_decode($_POST["graduacao"]);
		$logId 				   = $_POST["logradouro"];
		$endereco      		   = utf8_decode($_POST["endereco"]);
		$numero				   = $_POST["numero"];
		$bairro      		   = utf8_decode($_POST["bairro"]);
        $complemento           = utf8_decode($_POST["complemento"]);
		$cidade         	   = utf8_decode($_POST["cidade"]);
        $cep          		   = $_POST["cep"];
	    $estado         	   = utf8_decode($_POST["estados"]);
		$telefone      		   = $_POST["telefone"];
		$celular       		   = $_POST["celular"];
		$email				   = $_POST["email"];
		$dataCadAluno 	       = $_POST["dataCadAluno"];
		$obsAluno         	   = utf8_decode($_POST["obsAluno"]);
		$fotoAluno 			   = $resultadoFoto[1];
		$numeroCarteira		   = $_POST["numeroCarteira"];
		
        
        $tID            = $_POST["alunoId"];
        
        // Objeto para alterar
        
        $alterar  = "UPDATE aluno ";
        $alterar .= "SET ";
        $alterar .= "nomeAluno 				    = UPPER('{$nomeAluno}'), ";
		$alterar .= "dataNascimento 			= UPPER('{$dataNascimento}'), ";
		$alterar .= "nomeResp 					= UPPER('{$nomeResp}'), ";
		$alterar .= "rgResp				    	= UPPER('{$rgResp}'), ";
		$alterar .= "cpfResp				    = UPPER('{$cpfResp}'), ";
        $alterar .= "rg 					    = UPPER('{$rg}'), ";
		$alterar .= "cpf				    	= UPPER('{$cpf}'), ";
		$alterar .= "graduacaoId		    	= UPPER('{$graduacaoId}'), ";
		$alterar .= "logId				    	= UPPER('{$logId}'), ";
		$alterar .= "endereco 			    	= UPPER('{$endereco}'), ";
        $alterar .= "numero				        = UPPER('{$numero}'), ";
        $alterar .= "bairro						= UPPER('{$bairro}'), ";
		$alterar .= "complemento 			    = UPPER('{$complemento}'), ";
		$alterar .= "cidade 					= UPPER('{$cidade}'), ";
		$alterar .= "cep 						= UPPER('{$cep}'), ";     
		$alterar .= "estadoID					= UPPER('{$estado}'), ";
		$alterar .= "telefone 					= UPPER('{$telefone}'), ";
		$alterar .= "celular 					= UPPER('{$celular}'), ";
		$alterar .= "email 						= UPPER('{$email}'), ";
		$alterar .= "dataCadAluno 				= UPPER('{$dataCadAluno}'), ";
		
		$alterar .= "numeroCarteira				= UPPER('{$numeroCarteira}'), ";
		$alterar .= "obsAluno					= UPPER('{$obsAluno}') ";
		
		
		
        $alterar .= "WHERE alunoId 	= {$tID} ";
        
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
	
	// Consulta as graduações
    $graduacoes = "SELECT * ";
    $graduacoes .= "FROM graduacao ";
    $lista_graduacao = mysqli_query($conecta,$graduacoes);
    if ( !$lista_graduacao ) {
        die ("Erro no banco");
        
    }

// Seleção de logradouro
    $select4  = "SELECT * ";
    $select4 .= "FROM logradouro ";
    $lista_logradouro = mysqli_query($conecta, $select4);
    if (!$lista_logradouro){
       die("Erro no banco");   
        
    }

?>




<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alteração de Cadastro</title>
        <link rel="stylesheet" href="css/fichaAluno.css">
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

    <body onload="verifIdade()">
 
        <main>  
        	<div class="centralizar">
           <div class="subtitulo"> <h1>Alteração de cadastro</h1><h4>Alterar dados de aluno cadastrado</h4> </div>
             
                <form action="alterarAluno.php?codigo=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                    
                  
                  	  <fieldset class="grupo">
                      <div class="campo">
 
                      <div style="margin-bottom:10px;" class="fotoperfil">
                      <img src="<?php echo utf8_encode($info_clientes["fotoAluno"])  ?>">
                      <a style="text-decoration:none; color: #000; font-size:16px; margin-left:35px;" href="alterarFoto.php?codigo=<?php echo $id ?>">Alterar Foto</a>
                      </div>
                      

                      </div>
                      </fieldset>
                      <fieldset class="grupo">
                          <div class="campo">
                        <label for="nome">Nome do Aluno</label>
                        <input type="text" value="<?php echo utf8_encode($info_clientes["nomeAluno"])  ?>" style="width: 600px" maxlength="200" name="nomeAluno" id="nomeAluno" required>
                          </div>
                          <div class="campo">
                        <label for="dataNascimento">Data de Nascimento</label>
                           <input type="date" onchange="verifIdadeAlt()" id="bday" value="<?php echo utf8_encode($info_clientes["dataNascimento"])  ?>" style="width: 252px" name="dataNascimento" id="dataNascimento" >
                          </div>
                      </fieldset>
                    
                    <div id="responsavel">
                            
                    <fieldset class="grupo">
                        
                        <div class="campo">
                       		<label for="nomeResp">Nome do Responsável</label>
                			<input type="text" style="width: 397px" value="<?php echo utf8_encode($info_clientes["nomeResp"])  ?>" id="nomeResp" name="nomeResp" maxlength="30"  placeholder="Nome do Responsável">
                       </div>                       
                       <div class="campo">
                       		<label for="rg">RG do Responsável</label>
                			<input type="text" style="width: 189.3px" value="<?php echo utf8_encode($info_clientes["rgResp"])  ?>" id="rgResp" OnKeyPress="formatar('##.###.###-#', this)" maxlength="12" name="rgResp" placeholder="RG do Responsável">
                       </div>
                       <div class="campo">
                       		<label for="cpf">CPF do Responsável</label>
                			<input type="text" style="width: 209.3" value="<?php echo utf8_encode($info_clientes["cpfResp"])  ?>" id="cpfResp" name="cpfResp" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14"  placeholder="CPF do Responsável">
                       </div>
                       
                      
                       </fieldset>
                        
                        
                        
                        </div>
                    
                      <fieldset class="grupo">
                      <div class="campo">                    
                    <label for="graduacao">Graduação</label>
                    <select id="graduacao" name="graduacao" style="width: 230px;" > 
                        <?php 
                            $minhaGrad = $info_clientes["graduacaoId"];
                            while($linha2 = mysqli_fetch_assoc($lista_graduacao)) {
                                $grad_principal = $linha2["graduacaoId"];
                                if($minhaGrad == $grad_principal) {
                        ?>
                            <option value="<?php echo $linha2["graduacaoId"] ?>" selected>
                                <?php echo utf8_encode($linha2["graduacaoNome"]) ?>
                            </option>
                        <?php
                                } else {
                        ?>
                            <option value="<?php echo $linha2["graduacaoId"] ?>" >
                                <?php echo utf8_encode($linha2["graduacaoNome"]) ?>
                            </option>                        
                        <?php 
                                }
                            }
                        ?>
                    </select>
                          </div>
                          <div class="campo">
                    <label for="rg">RG</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["rg"])  ?>" style="width: 189.3px;" OnKeyPress="formatar('##.###.###-#', this)" maxlength="12" name="rg" id="rg" >
                          </div>
                          <div class="campo">                    
                    <label for="cpf">CPF</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["cpf"])  ?>" style="width: 209.3px;" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14"  name="cpf" id="cpf" >
                    	  </div>
                          <div class="campo">                    
                    <label for="numeroCarteira">Carteira</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["numeroCarteira"])  ?>" style="width: 189.3;" maxlength="29"  name="numeroCarteira" id="numeroCarteira" > 
                          </div>
                      </fieldset>
                      <fieldset class="grupo">
                      <div class="campo">                    
                    <label for="logradouro">Logradouro</label>
                    <select id="logradouro" name="logradouro" style="width: 150px" > 
                        <?php 
                            $meuLog = $info_clientes["logId"];
                            while($linha = mysqli_fetch_assoc($lista_logradouro)) {
                                $log_principal = $linha["logId"];
                                if($meuLog == $log_principal) {
                        ?>
                            <option value="<?php echo $linha["logId"] ?>" selected>
                                <?php echo utf8_encode($linha["logAbv"]) ?> - <?php echo utf8_encode($linha["logNome"]) ?>
                            </option>
                        <?php
                                } else {
                        ?>
                            <option value="<?php echo $linha["logId"] ?>" >
                                <?php echo utf8_encode($linha["logAbv"]) ?> - <?php echo utf8_encode($linha["logNome"]) ?>
                            </option>                        
                        <?php 
                                }
                            }
                        ?>
                    </select>
                          </div>
                          <div class="campo">
                    <label for="endereco" >Endereço</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["endereco"])  ?>" style="width: 350px" maxlength="150" name="endereco" id="endereco" >
                          </div>
                          <div class="campo">
                    <label for="numero">Número</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["numero"])  ?>" style="width: 100px" maxlength="10" name="numero" id="numero" >
                          </div>
                          <div class="campo">
                    <label for="bairro">Bairro</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["bairro"])  ?>" style="width: 220px" maxlength="150"  name="bairro" id="bairro" >
                          </div>  
                          </fieldset>
                          
                    <fieldset class="grupo">
                          <div class="campo">
                    <label for="complemento">Complemento</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["complemento"])  ?>" style="width: 410px" maxlength="250" name="complemento" id="complemento" >
                          </div>

                          <div class="campo">
                    <label for="cidade">Cidade</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["cidade"])  ?>" style="width: 200px" maxlength="200" name="cidade" id="cidade" >
                          </div>
                          <div class="campo">                    
                    <label for="estados">Estado</label>
                    <select id="estados" name="estados" style="width: 60px" > 
                        <?php 
                            $meuestado = $info_clientes["estadoID"];
                            while($linha = mysqli_fetch_assoc($lista_estados)) {
                                $estado_principal = $linha["estadoID"];
                                if($meuestado == $estado_principal) {
                        ?>
                            <option value="<?php echo $linha["estadoID"] ?>" selected>
                                <?php echo utf8_encode($linha["sigla"]) ?>
                            </option>
                        <?php
                                } else {
                        ?>
                            <option value="<?php echo $linha["estadoID"] ?>" >
                                <?php echo utf8_encode($linha["sigla"]) ?>
                            </option>                        
                        <?php 
                                }
                            }
                        ?>
                    </select>
                          </div>
                          <div class="campo">
                    <label for="cep">CEP</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["cep"])  ?>" style="width:150px;" OnKeyPress="formatar('##.###-###', this)" maxlength="10" name="cep" id="cep" >
                          </div>
                          
                          
                      </fieldset>
                      <fieldset class="grupo">
                    <div class="campo">
                    <label for="telefone" >Telefone</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["telefone"])  ?>" style="width: 426px" onkeydown="mascaraTel( this )" onkeyup="mascaraTel( this )" maxlength="14" name="telefone" id="telefone" >
                          </div>
                          <div class="campo">                    
                    <label for="celular" >Celular</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["celular"])  ?>" style="width: 426px" onkeydown="mascaraCel( this )" onkeyup="mascaraCel( this )" maxlength="15" name="celular" id="celular" > 
                          </div>
                      </fieldset>
                      <fieldset class="grupo">
                    <div class="campo">
                    <label for="email">E-mail</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["email"])  ?>" style="width: 868px" maxlength="200" name="email" id="email" >
                    </div> 
                    </fieldset>
                    <fieldset class="grupo"> 
                    <div class="campo">  
                    <label for="obsAluno">Observação</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["obsAluno"])  ?>" style="width: 868px;" maxlength="1000" name="obsAluno" id="obsAluno">
                  	</div>  
                    <fieldset class="grupo"> 
                    <div class="campo"> 
                    <label for="dataCadAluno">Data de início</label>
                    <input type="date" value="<?php echo $info_clientes["dataCadAluno"] ?>" name="dataCadAluno" id="dataCadAluno"  >
                    </div>
                    </fieldset>             
                    <input type="hidden" name="alunoId" value="<?php echo $info_clientes["alunoId"] ?>">
                        <div class="campo">
                        <input type="hidden" value="<?php echo date('Y-m-d');?>" name="dataGraduacao" id="dataGraduacao" >
                        </fieldset>
                          <button type="submit" class="botao">Confirmar alteração</button>
                          </div>
                      
                    
                    <?php
					if(isset($operacao_alterar) ){
					 	?>
                     
                        <?php echo '
							<script type="text/JavaScript">
							alert("Aluno alterado com sucesso");
							location.href="listaAluno.php"
							</script>
							'; ?>
						
				
						
						<?php	
						
					}
				
				
				?>
                    
                    </fieldset>                            
                </form>   
       <div class="centralizar">
        </main>

     
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>