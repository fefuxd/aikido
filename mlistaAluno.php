<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>




<?php
    

	// Tabela de clientes---------------------------------------------------------
	
	
    $tr = "SELECT alunoId, nomeAluno, endereco, usuarioId, a.graduacaoId, graduacaoNome, numero, cidade, a.estadoID, sigla, nomeEscola, telefone, a.logId, logAbv, (YEAR(CURDATE())-YEAR(dataNascimento)) - (RIGHT(CURDATE(),5)<RIGHT(dataNascimento,5)) as idade FROM aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId INNER JOIN estados e ON a.estadoID = e.estadoID INNER JOIN escola es ON a.escolaId = es.escolaId INNER JOIN logradouro l ON a.logId = l.logId WHERE status = 1 AND a.escolaId = {$escolaId} ORDER BY nomeAluno ";
	
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");
    }


	// Select para o input de buscar aluno	
	if ( isset($_GET["aluno"])  ) {
		$nome_aluno = $_GET["aluno"];
	$tr = "SELECT alunoId, nomeAluno, endereco, usuarioId, a.graduacaoId, graduacaoNome, numero, cidade, a.estadoID, sigla, nomeEscola, telefone, a.logId, logAbv, (YEAR(CURDATE())-YEAR(dataNascimento)) - (RIGHT(CURDATE(),5)<RIGHT(dataNascimento,5)) as idade FROM aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId INNER JOIN estados e ON a.estadoID = e.estadoID INNER JOIN escola es ON a.escolaId = es.escolaId INNER JOIN logradouro l ON a.logId = l.logId WHERE status = 1 AND a.escolaId = {$escolaId} ";
	$tr .= "AND nomeAluno LIKE '%{$nome_aluno}%' ORDER BY nomeAluno ";
		
	}
   
   
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");
    }
	


?>



<!doctype html>

<html>

  <head>
        <meta charset="UTF-8">
        <title>Pesquisa de Alunos</title>
      
  </head>

 	<body>
    
     
        
        <main>  
        	
       
				<!-- Barra de pesquisa por nome -->
           <form class="search" name="search" action="mlistaAluno.php" method="get">
              <input type="search" name="aluno" placeholder="Nome do aluno..." >
           </form>
           
 
		
<div class="centralizarTabelaAluno">
       <table> 
            <tr>
             <th> Nome do Aluno </th> 
             <th> Grau </th>
             <th> Idade </th> 
             <th> Endereço </th>
             <th> Cidade </th>  	
             <th> Telefone </th> 
             <th> Opções </th>
            </tr>
           
            <?php
                while($linha = mysqli_fetch_assoc($consulta_tr)) 
                {
            ?>
                
            <tr>
             
             <td> <?php echo utf8_encode($linha["nomeAluno"]) ?> </td>
             <td> <?php echo utf8_encode($linha["graduacaoNome"]) ?> <a title="Alterar Graduacao" href="alterarGraduacao.php?codigo=<?php echo $linha["alunoId"] ?>"><i class="fa fa-graduation-cap"></i></a> </td>
             <td> <?php echo utf8_encode($linha["idade"]) ?> anos </td>
             <td> <?php echo utf8_encode($linha["endereco"]) ?>, <?php echo utf8_encode($linha["numero"]) ?> </td>
             <td> <?php echo utf8_encode($linha["cidade"]) ?> / <?php echo utf8_encode($linha["sigla"]) ?> </td>
             <td> <?php echo $linha["telefone"] ?> </td> 
             <td> <a title="Detalhes" href="detalheAluno.php?codigo=<?php echo $linha["alunoId"] ?>"><i class="fa fa-info-circle"></i></a> <a title="Alterar" href="alterarAluno.php?codigo=<?php echo $linha["alunoId"] ?>"><i class="fa fa-pencil-square-o"></i></a> <a title="Desativar" href="excluirAluno.php?codigo=<?php echo $linha["alunoId"] ?>"><i class="fa fa-times"></i></a> </td>
            </tr>
   
		<?php
            }
        ?>
      </table>                
                
     
         
 	</div>
        </main>
</div>
        
	 </body>
    
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>