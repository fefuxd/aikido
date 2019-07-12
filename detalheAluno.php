<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>

<?php
   if (isset($_GET["codigo"]) ) {
    $alunoId = $_GET["codigo"];
    } 
    // Consulta ao banco de dados
    $consulta = "SELECT alunoId, a.graduacaoId, a.usuarioId, nomeAluno, dataNascimento, rg, cpf, endereco, numero, fotoAluno, bairro, complemento, cidade, cep, email, telefone, celular, dataCadAluno, numeroCarteira, graduacaoNome, usuarioNome, a.escolaId, obsAluno, nomeEscola, a.logId, logAbv, nomeResp, rgResp, cpfResp, (YEAR(CURDATE())-YEAR(dataNascimento)) - (RIGHT(CURDATE(),5)<RIGHT(dataNascimento,5)) as idade FROM aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId INNER JOIN usuario u ON a.usuarioId = u.usuarioId INNER JOIN escola e ON a.escolaId = e.escolaId INNER JOIN logradouro l ON a.logId = l.logId WHERE alunoId = {$alunoId} ";
    $detalhe = mysqli_query($conecta, $consulta);


        if ( !$detalhe ) {
            die("Falha no banco");
        } else {
            $dados_detalhe 			= mysqli_fetch_assoc($detalhe);
            $alunoId        	    = $dados_detalhe["alunoId"];
			$graduacaoId			= $dados_detalhe["graduacaoId"];
			$usuarioId				= $dados_detalhe["usuarioId"];
            $nomeAluno  		    = $dados_detalhe["nomeAluno"];	
			$dataNascimento    	    = $dados_detalhe["dataNascimento"];
			$idade		    	    = $dados_detalhe["idade"];
			$nomeResp          	    = $dados_detalhe["nomeResp"];
		    $rgResp	     		    = $dados_detalhe["rgResp"];
			$cpfResp     		    = $dados_detalhe["cpfResp"];
            $rg          		    = $dados_detalhe["rg"];
		    $cpf	     		    = $dados_detalhe["cpf"];
			$logAbv     		    = $dados_detalhe["logAbv"];
			$numeroCarteira		    = $dados_detalhe["numeroCarteira"];
			$endereco   		    = $dados_detalhe["endereco"];
			$numero     		    = $dados_detalhe["numero"];
            $bairro   				= $dados_detalhe["bairro"];
            $complemento		    = $dados_detalhe["complemento"];    
			$cidade         	    = $dados_detalhe["cidade"];
			$cep	         	    = $dados_detalhe["cep"];
			$email   				= $dados_detalhe["email"];
			$telefone  				= $dados_detalhe["telefone"];
			$celular   				= $dados_detalhe["celular"];
			$dataCadAluno			= $dados_detalhe["dataCadAluno"];
			$nomeProfessor			= $dados_detalhe["usuarioNome"];
			$nomegraduacao			= $dados_detalhe["graduacaoNome"];
			$nomeEscola				= $dados_detalhe["nomeEscola"];
			$obsAluno				= $dados_detalhe["obsAluno"];
			$fotoAluno				= $dados_detalhe["fotoAluno"];
						
        }
		



	

// Seleção de estados
    $select = "SELECT nomeAluno, nome FROM aluno a INNER JOIN estados e ON a.estadoID = e.estadoID WHERE alunoId = {$alunoId} ";
    
    $lista_estados = mysqli_query($conecta, $select);
   
	
	if ( !$lista_estados ) {
            die("Falha no banco");
        } else {
            $dados_estados = mysqli_fetch_assoc($lista_estados);
            $estadoID   = $dados_estados["nome"];
        
						
        }
		
		
// Histórico de graduação
    $select2 = "SELECT graduacaoAlunoId, g.graduacaoId, g.alunoId, dataGraduacao, nomeAluno, graduacaoNome FROM graduacaoaluno g INNER JOIN aluno a ON g.alunoId = a.alunoId INNER JOIN graduacao h ON g.graduacaoId = h.graduacaoId WHERE g.alunoId = {$alunoId} ";
    
    $lista_graduacoes = mysqli_query($conecta, $select2);
   
	
	if ( !$lista_graduacoes ) {
            die("Falha no banco");
        }
	
	

?>



<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detalhes de <?php echo utf8_encode($nomeAluno) ?></title>
        <link rel="stylesheet" href="css/fichaAluno.css">
        <link href="css/printFicha.css" type="text/css" rel="stylesheet" media="print">
    </head>

 <body>

    <main>  
    <div class="subir" </div>
           <div class="centralizar"> 
           
 <span class="titulo"><center>- FICHA DE INSCRIÇÃO -</center></span>
 <div class="fotoperfil">
 
 <img src="<?php echo $fotoAluno ?>">
 </div>

<div>     
<table id="ficha">
	<tr>
    	<td> <b>Aluno (a): </b><?php echo utf8_encode($nomeAluno) ?> </td>
        <td> <b>Cadastrado em: </b><?php echo date("d/m/Y",  strtotime($dataCadAluno)) ?> </td>
    </tr>
    
    <tr>
    	<td> <b>Nascimento: </b><?php echo date("d/m/Y",  strtotime($dataNascimento)) ?> </td>
        <td> <b>Idade: </b><?php echo utf8_encode($idade) ?> anos </td>
    </tr>
    
    <tr>
    	<td> <b>RG: </b><?php echo $rg ?></b> </td>
        <td> <b>CPF: </b><?php echo $cpf ?></b> </td>
    </tr>
    
    <tr>
    	<td> <b>Nome do Responsável: </b><?php echo utf8_encode($nomeResp) ?> </td>
        <td> <b>Número da carteira: </b><?php echo $numeroCarteira ?></b> </td>        
    </tr>
    
    <tr>
    	<td> <b>RG do Responsável: </b><?php echo $rgResp ?></b> </td>
        <td> <b>CPF do Responsável: </b><?php echo $cpfResp ?></b> </td>
    </tr>
    
    <tr>
    	<td> <b>Unidade: </b><?php echo utf8_encode($nomeEscola) ?> </td>
        <td> <b>Graduacao atual: </b><?php echo utf8_encode($nomegraduacao) ?> </td>
    </tr>
    
    <tr>
    	<td> <b>Endereço: </b><?php echo utf8_encode($logAbv) ?> <?php echo utf8_encode($endereco) ?>, <?php echo $numero ?> - <?php echo utf8_encode($complemento) ?> </td>
        <td> <b>Bairro: </b><?php echo utf8_encode($bairro) ?> </td>
    </tr>
    
    <tr>
    	<td> <b>Cidade: </b><?php echo utf8_encode($cidade) ?> / <?php echo utf8_encode($estadoID) ?> </td>
        <td> <b>CEP: </b><?php echo $cep ?> </td>
    </tr>
    
    <tr>
    	<td> <b>Telefone: </b><?php echo $telefone ?> </td>
        <td> <b>Celular: </b><?php echo $celular ?> </td>
    </tr>
    
    <tr>
    	<td> <b>E-mail: </b><?php echo $email ?> </td>
        <td> <b>Professor: </b><?php echo utf8_encode($nomeProfessor) ?> </td>
    </tr>
    
    </table>
    
    <table style="margin-top:6px;" id="ficha">
    <tr style="height:50px;">
    	<td> <b>Observação: </b><?php echo $obsAluno ?> </td>
        
    </tr>
	</table>
  

 <br>
<span class="titulo"><center> Histórico de graduação </center> </span>
 <br>
   <table id="ficha"> 
            <tr>
             <th> Data </th> 
             <th> Graduação </th> 	
             
             
            </tr>
           
            <?php
                while($linha = mysqli_fetch_assoc($lista_graduacoes)) 
                {
            ?>
              
            <tr> 
             <td> <?php echo date("d/m/Y", strtotime ($linha["dataGraduacao"])) ?> </td>
             <td> <?php echo utf8_encode($linha["graduacaoNome"]) ?> </td>
            
            </tr>
   
		<?php
            }
        ?>

        
        
      </table> 
      <br>
      <br>
      	<form id="form1"> 
            <input type="button" style="float:left; margin-top:20px;" class="botao" value="Imprimir" onclick="window.print();">
        </form>
 

     <?php 
      // Reativar o aluno se ele estiver inativo
    $selectInativos = "SELECT status FROM aluno WHERE alunoId = {$alunoId} ";
    
    $lista_inativo = mysqli_query($conecta, $selectInativos);
   
	
	if ( !$lista_inativo ) {
            die("Falha no banco");
        } 
		
            $dados_inativo = mysqli_fetch_assoc($lista_inativo);
            $status   = $dados_inativo["status"];
			
	if( $status < 1 ) {
		   

   ?>
        	<fieldset>
        	<form action="detalheAluno.php?codigo=<?php echo $alunoId ?>" method="post">
            <fieldset class="grupo">
            <div class="campo">   
            <input type="hidden" name="aluninho" value="<?php echo $alunoId ?>"/>    
            <input type="submit" name="reativar" class="botao" value="Ativar aluno"/>
            
            </div>
            </fieldset>
            
            
     <?php
     if(isset($_POST["aluninho"])){
		 
	   
        $tr = "UPDATE aluno SET status = 1 WHERE alunoId = {$alunoId} ";
	
	   	
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");

    } 
   }
           
			if(isset($consulta_tr)){
	 echo '					<script type="text/JavaScript">
							alert("Aluno ativado com sucesso");
							location.href="listaAluno.php"
							</script>
							'; 	
			}
			?>
            
            
	

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