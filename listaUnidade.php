<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("verificacaoNivel.php"); ?>


<?php
    // Tabela de clientes---------------------------------------------------------
	
	
    $tr = "SELECT escolaId, nomeEscola, enderecoEscola, numeroEscola, e.estadoID, telefoneEscola, numeroEscola, cidadeEscola, responsavelEscola, sigla FROM escola e INNER JOIN estados s ON e.estadoID = s.estadoID WHERE statusEscola = 1 ";
	if ( isset($_GET["unidade"])  ) {
		$nome_unidade = $_GET["unidade"];
		$tr .= "AND nomeEscola LIKE '%{$nome_unidade}%' ORDER BY nomeEscola ";
		
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
        <title>Pesquisa de Unidades</title>
        
  </head>

 	<body>
     
        
        <main> 
        <div class="centralizarTabelaAluno"> 
        
				<!-- Barra de pesquisa -->
           <form class="search" name="search" action="listaUnidade.php" method="get">
              <input type="search" name="unidade" placeholder="Nome da unidade..">
           </form>





       <table> 
            <tr>
             <th> Nome da Unidade </th> 
             <th> Cidade </th>	
             <th> Telefone </th>
             <th> Responsável </th>
             <th> Opções </th> 
            </tr>
           
            <?php
                while($linha = mysqli_fetch_assoc($consulta_tr)) 
                {
            ?>
                
            <tr> 
             <td> <?php echo utf8_encode($linha["nomeEscola"]) ?> </td>
             <td> <?php echo utf8_encode($linha["cidadeEscola"]) ?> / <?php echo utf8_encode($linha["sigla"]) ?> </td>
             <td> <?php echo $linha["telefoneEscola"] ?> </td> 
             <td> <?php echo utf8_encode($linha["responsavelEscola"]) ?> </td>
             <td> <a title="Detalhes" style="margin-left:5px;" href="detalheUnidade.php?codigo=<?php echo $linha["escolaId"] ?>"><i class="fa fa-info-circle"></i></a> <a title="Alterar" href="alterarUnidade.php?codigo=<?php echo $linha["escolaId"] ?>"><i class="fa fa-pencil-square-o"></i></a> <a title="Desativar" href="excluirUnidade.php?codigo=<?php echo $linha["escolaId"] ?>"><i class="fa fa-times"></i></a></td>
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