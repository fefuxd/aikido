<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>

<?php

    // Consulta ao banco de dados
    $consulta = "SELECT alunoId, a.graduacaoId, a.usuarioId, nomeAluno, dataNascimento, rg, cpf, endereco, numero, bairro, complemento, cidade, cep, email, telefone, celular, dataCadAluno, graduacaoNome, usuarioNome, a.escolaId, nome, sigla, a.estadoID, nomeEscola, a.logId, logAbv, nomeResp, rgResp, cpfResp, (YEAR(CURDATE())-YEAR(dataNascimento)) - (RIGHT(CURDATE(),5)<RIGHT(dataNascimento,5)) as idade FROM aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId INNER JOIN usuario u ON a.usuarioId = u.usuarioId INNER JOIN escola e ON a.escolaId = e.escolaId INNER JOIN estados es ON a.estadoID = es.estadoID INNER JOIN logradouro l ON a.logId = l.logId WHERE status = 1 ORDER BY nomeAluno  ";
    $detalhe = mysqli_query($conecta, $consulta);

        if ( !$detalhe ) {
            die("Falha no banco");
        } 	




if ( isset($_GET['escola'])  ) {
		$testao = $_GET["escola"];
		$consulta = "SELECT alunoId, a.graduacaoId, a.usuarioId, nomeAluno, dataNascimento, rg, cpf, endereco, numero, bairro, complemento, cidade, cep, email, telefone, celular, dataCadAluno, graduacaoNome, usuarioNome, a.escolaId, nome, sigla, a.estadoID, nomeEscola, a.logId, logAbv, nomeResp, rgResp, cpfResp, (YEAR(CURDATE())-YEAR(dataNascimento)) - (RIGHT(CURDATE(),5)<RIGHT(dataNascimento,5)) as idade FROM aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId INNER JOIN usuario u ON a.usuarioId = u.usuarioId INNER JOIN escola e ON a.escolaId = e.escolaId INNER JOIN estados es ON a.estadoID = es.estadoID INNER JOIN logradouro l ON a.logId = l.logId WHERE status = 1 AND a.escolaId = {$testao} ORDER BY nomeAluno ";
		
		
	}
   
   
    $detalhe = mysqli_query($conecta, $consulta);
    if(!$detalhe) {
        die("erro no banco");
    }




if ( isset($_GET['ativo'])  ) {
 $consulta = "SELECT alunoId, a.graduacaoId, a.usuarioId, nomeAluno, dataNascimento, rg, cpf, endereco, numero, bairro, complemento, cidade, cep, email, telefone, celular, dataCadAluno, graduacaoNome, usuarioNome, a.escolaId, nome, sigla, a.estadoID, nomeEscola,  a.logId, logAbv, nomeResp, rgResp, cpfResp, (YEAR(CURDATE())-YEAR(dataNascimento)) - (RIGHT(CURDATE(),5)<RIGHT(dataNascimento,5)) as idade FROM aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId INNER JOIN usuario u ON a.usuarioId = u.usuarioId INNER JOIN escola e ON a.escolaId = e.escolaId INNER JOIN estados es ON a.estadoID INNER JOIN logradouro l ON a.logId = l.logId = es.estadoID WHERE status = 1 ORDER BY nomeAluno ";
 
}
    $detalhe = mysqli_query($conecta, $consulta);

        if ( !$detalhe ) {
            die("Falha no banco");
        }




// Seleção de Unidades
    $select2 = "SELECT * ";
    $select2 .= "FROM escola ";
    $lista_unidade = mysqli_query($conecta, $select2);
    if (!$lista_unidade){
       die("Erro no banco");   
        
    }



?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Relatório</title>
        <link href="css/print.css" type="text/css" rel="stylesheet" media="print">
        <style>
			table#tabelaRelatorio {
			
			width: 4000px;
			margin-left:15px;
			margin-right:15px;
			
	
			 }
								  
			table#tabelaRelatorio tr td,
			table#tabelaRelatorio tr th
			 {
			  
			  font-size:15px;
			
			 }						  
		
		</style>
        
    </head>

 <body>
     
     <main class="relatorio">
         <div class="subtitulo" style="margin-top: 20px; margin-left:15px;"><h1>Relatório de alunos</h1><h4>Relatórios dos alunos da unidade</h4> </div>
     
     
     
     	<!-- Barra de pesquisa escola -->
            <form name="escola" action="relatorioTotal.php" method="get">
            <fieldset class="grupo">
            <div class="campo">
            <select name="escola" style="width: 250px; margin-left:15px;" onchange="this.form.submit();" >
                            <option value="" disabled selected>Unidades</option>
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
                            </div>
     
      	    <div class="campo">
     		<input type="submit" class="botao" name="botao" value="Todos"/>
     		</div>
            </fieldset>
     
 </form>
 	<div class="nomeUnidade">
 <?php 
		if( isset($_GET['escola'])  ) {
		$linha = mysqli_fetch_assoc($detalhe);
		
		?> <span style="font-size:26px; line-height:50px; font-weight:400; color:#000; margin-left:15px;">Unidade:</span> <span style="font-size:26px; line-height:50px; color:#4b8ef9; "> <?php echo utf8_encode($linha["nomeEscola"]); ?> </span> <?php	
		} else {
		?> <span style="font-size:26px; line-height:50px; color:#4b8ef9; margin-left:15px;"> <?php echo "Todas as unidades"; ?> </span> <?php
			}	
			
	mysqli_data_seek( $detalhe,  0);
	 ?>
 
    </div>
    
     <table id="tabelaRelatorio"> 
            <tr>
             <th> Nome do Aluno </th>
             <th> Dt. Cadastro </th> 
             <th> Dt. Nasc. </th>
             <th> Idade </th> 
             <th> Professor </th>
             <th> Unidade </th>  	
             <th> Faixa </th>
             <th> Reponsável </th>
             <th> RG Resp </th>
             <th> CPF Resp </th> 
             <th> RG </th>
             <th> CPF </th>
             <th> Endereço </th>
             <th> Bairro </th>
             <th> CEP </th>
             <th> Cidade/Estado </th>
             <th> Telefone </th>
             <th> Celular </th>
             <th> Email </th>
            </tr>
    
            
    <?php
                while($linha = mysqli_fetch_assoc($detalhe)) 
                {
            ?> 
            
            
          <tr> 
             <td> <?php echo utf8_encode($linha["nomeAluno"]) ?> </td>
             <td> <?php echo date("d/m/Y",  strtotime($linha["dataCadAluno"])) ?> </td>
             <td> <?php echo date("d/m/Y",  strtotime($linha["dataNascimento"])) ?> </td>  
             <td> <?php echo utf8_encode($linha["idade"]) ?> anos </td>
             <td> <?php echo utf8_encode($linha["usuarioNome"]) ?> </td>
             <td> <?php echo utf8_encode($linha["nomeEscola"]) ?> </td>
             <td> <?php echo utf8_encode($linha["graduacaoNome"]) ?> </td>
             <td> <?php echo utf8_encode($linha["nomeResp"]) ?> </td>
             <td> <?php echo utf8_encode($linha["rgResp"]) ?> </td>
             <td> <?php echo utf8_encode($linha["cpfResp"]) ?> </td>
             <td> <?php echo utf8_encode($linha["rg"]) ?> </td>
             <td> <?php echo utf8_encode($linha["cpf"]) ?> </td>
             <td> <?php echo utf8_encode($linha["logAbv"]) ?> <?php echo utf8_encode($linha["endereco"]) ?>, <?php echo utf8_encode($linha["numero"]) ?> - <?php echo utf8_encode($linha["complemento"]) ?> </td>
             <td> <?php echo utf8_encode($linha["bairro"]) ?> </td>
             <td> <?php echo utf8_encode($linha["cep"]) ?> </td>
             <td> <?php echo utf8_encode($linha["cidade"]) ?> / <?php echo utf8_encode($linha["sigla"]) ?> </td>
             <td> <?php echo utf8_encode($linha["telefone"]) ?> </td>
             <td> <?php echo utf8_encode($linha["celular"]) ?> </td>
             <td> <?php echo utf8_encode($linha["email"]) ?> </td> 
          </tr>
   
		<?php
            }
        ?>
      </table>          
      
         <form id="form1"> 
            <input type="button" style="float:left; margin-top:20px; margin-left:15px;" class="botao" value="Imprimir" onclick="window.print();">
        </form>
   	</main>


        
 </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>