<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>




<?php
    

	// Tabela de clientes---------------------------------------------------------
	
	
    $tr = "SELECT alunoId, nomeAluno, endereco, usuarioId, a.graduacaoId, graduacaoNome, numero, cidade, a.estadoID, sigla, nomeEscola, telefone, a.logId, logAbv,(YEAR(CURDATE())-YEAR(dataNascimento)) - (RIGHT(CURDATE(),5)<RIGHT(dataNascimento,5)) as idade FROM aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId INNER JOIN estados e ON a.estadoID = e.estadoID INNER JOIN escola es ON a.escolaId = es.escolaId INNER JOIN logradouro l ON a.logId = l.logId WHERE status = 1 AND a.escolaId = {$escolaId} ORDER BY nomeAluno ";
	
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");
    }

   

?>


<?php


    if(isset($_GET['ativo'])){
        $tr = "SELECT alunoId, nomeAluno, endereco, usuarioId, a.graduacaoId, graduacaoNome, numero, cidade, a.estadoID, sigla, nomeEscola, telefone, a.logId, logAbv, (YEAR(CURDATE())-YEAR(dataNascimento)) - (RIGHT(CURDATE(),5)<RIGHT(dataNascimento,5)) as idade FROM aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId INNER JOIN estados e ON a.estadoID = e.estadoID INNER JOIN escola es ON a.escolaId = es.escolaId INNER JOIN logradouro l ON a.logId = l.logId WHERE status = 1 AND a.escolaId = {$escolaId} ORDER BY nomeAluno ";
	
	}
   	
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");

    }
    


 
    if(isset($_GET['inativo'])){
        $tr = "SELECT alunoId, nomeAluno, endereco, usuarioId, a.graduacaoId, graduacaoNome, numero, cidade, a.estadoID, sigla, nomeEscola, telefone, a.logId, logAbv, (YEAR(CURDATE())-YEAR(dataNascimento)) - (RIGHT(CURDATE(),5)<RIGHT(dataNascimento,5)) as idade FROM aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId INNER JOIN estados e ON a.estadoID = e.estadoID INNER JOIN escola es ON a.escolaId = es.escolaId INNER JOIN logradouro l ON a.logId = l.logId WHERE status = 0 ORDER BY nomeAluno ";
	
	}
   	
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");

    }
	
	
	if(isset($_GET['todos'])){
        $tr = "SELECT alunoId, nomeAluno, endereco, usuarioId, a.graduacaoId, graduacaoNome, numero, cidade, a.estadoID, sigla, nomeEscola, telefone, a.logId, logAbv, (YEAR(CURDATE())-YEAR(dataNascimento)) - (RIGHT(CURDATE(),5)<RIGHT(dataNascimento,5)) as idade FROM aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId INNER JOIN estados e ON a.estadoID = e.estadoID INNER JOIN escola es ON a.escolaId = es.escolaId INNER JOIN logradouro l ON a.logId = l.logId WHERE status = 1 ORDER BY nomeAluno ";
	
	}
   	
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");

    }
	

	  
	if ( isset($_GET['escola'])  ) {
		$testao = $_GET["escola"];
		$tr = "SELECT alunoId, nomeAluno, endereco, usuarioId, a.graduacaoId, graduacaoNome, numero, cidade, a.estadoID, sigla, nomeEscola, telefone, a.logId, logAbv, (YEAR(CURDATE())-YEAR(dataNascimento)) - (RIGHT(CURDATE(),5)<RIGHT(dataNascimento,5)) as idade FROM aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId INNER JOIN estados e ON a.estadoID = e.estadoID INNER JOIN escola es ON a.escolaId = es.escolaId INNER JOIN logradouro l ON a.logId = l.logId WHERE status = 1 AND a.escolaId = {$testao} ORDER BY nomeAluno ";
		
		
	}
   
   
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");
    }
	
	
	
	// Select para o input de buscar aluno	
	if ( isset($_GET["aluno"])  ) {
		$nome_aluno = $_GET["aluno"];
	$tr = "SELECT alunoId, nomeAluno, endereco, usuarioId, a.graduacaoId, graduacaoNome, numero, cidade, a.estadoID, sigla, nomeEscola, telefone, a.logId, logAbv, (YEAR(CURDATE())-YEAR(dataNascimento)) - (RIGHT(CURDATE(),5)<RIGHT(dataNascimento,5)) as idade FROM aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId INNER JOIN estados e ON a.estadoID = e.estadoID INNER JOIN escola es ON a.escolaId = es.escolaId INNER JOIN logradouro l ON a.logId = l.logId WHERE status = 1 ";
	$tr .= "AND nomeAluno LIKE '%{$nome_aluno}%' ORDER BY nomeAluno ";
		
	}
   
   
    $consulta_tr = mysqli_query($conecta, $tr);
    if(!$consulta_tr) {
        die("erro no banco");
    }
	



	// Seleção de Unidades
    $select2 = "SELECT * ";
    $select2 .= "FROM escola ";
    $lista_unidade = mysqli_query($conecta, $select2);
    if (!$lista_unidade){
       die("Erro no banco");   
        
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
        	<div class="centralizarTabelaAluno">
       
				<!-- Barra de pesquisa por nome -->
           <form class="search" name="search" action="listaAluno.php" method="get">
              <input type="search" name="aluno" placeholder="Nome do aluno..." >
           </form>
           
    <?php       
	
	
          // Segurança para checar se aluno pertence a escola do professor lgoado
    if ( $nivelId >= 2 ) {
		
		
		  
     ?>      
           		<!-- Barra de pesquisa escola -->
                <div class="filtros">
            <form name="escola" action="listaAluno.php" method="get">
            <fieldset class="grupo">
            <div class="campo">       
               <input type="submit" name="ativo" class="botao" value="Meus alunos"/>
              </div>
               <div class="campo">
    		   <input type="submit" name="todos"  class="botao" value="Todos Ativos"/>             
               </div>
              <div class="campo">
    		   <input type="submit" name="inativo" class="botao" value="Todos Inativos"/>             
               </div>
            
            
            <div class="campo">
            <select name="escola" style="width: 250px" onchange="this.form.submit();" >
                            <option value="" disabled selected>Buscar alunos por unidade</option>
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
                  <!-- Botões de filtro -->   
              
               </fieldset>
    			</form>
		</div>
	<?php 
		if( isset($_GET['escola'])  ) {
		$linha = mysqli_fetch_assoc($consulta_tr);
		
		?> <center><span style="font-size:26px; line-height:50px; font-weight:400; color:#000;">Unidade:</span> <span style="font-size:26px; line-height:50px; color:#4b8ef9;"> <?php echo utf8_encode($linha["nomeEscola"]); ?> </span></center> <?php	
		} else {
		 if( isset($_GET['aluno']) OR isset($_GET['inativo']) OR isset($_GET['todos'])  ) {
			 
			  	} else {
				?> <center><span style="font-size:26px; line-height:50px; font-weight:400; color:#000;">Unidade:</span> <span style="font-size:26px; line-height:50px; color:#4b8ef9;"><?php echo utf8_encode($escolaProf); ?> </span></center> <?php
				}
		}
	
	mysqli_data_seek( $consulta_tr,  0);
	 ?>
   
   <?php
	}
	?>
		

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
             <td> <?php echo utf8_encode($linha["logAbv"]) ?> <?php echo utf8_encode($linha["endereco"]) ?>, <?php echo utf8_encode($linha["numero"]) ?> </td>
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

        
	 </body>
    
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>