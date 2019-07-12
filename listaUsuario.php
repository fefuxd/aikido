<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("verificacaoNivel.php"); ?>


<?php
    // Tabela de clientes---------------------------------------------------------
	
	
    $tr = "SELECT usuarioId, usuarioNome, usuarioLogin, u.nivelId, nomeNivel FROM usuario u INNER JOIN nivel n ON u.nivelId = n.nivelId WHERE statusUsuario = 1 ";
	if ( isset($_GET["usuarioPesquisa"])  ) {
		$nome_usuario = $_GET["usuarioPesquisa"];
		$tr .= "AND usuarioNome LIKE '%{$nome_usuario}%' ORDER BY usuarioNome ";
		
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
        <title>Pesquisa de Usuários</title>
        
  </head>

 	<body>
     
        
        <main>  
        <div class="centralizar">
        
				<!-- Barra de pesquisa -->
           <form class="search" name="search" action="listaUsuario.php" method="get">
              <input type="search" name="usuarioPesquisa" placeholder="Pesquisa">
           </form>





       <table> 
            <tr>
             <th> Nome do usuário </th> 
             <th> Login </th> 	
             <th> Nivel </th> 
             <th> Opções </th>
            </tr>
           
            <?php
                while($linha = mysqli_fetch_assoc($consulta_tr)) 
                {
            ?>
                
            <tr> 
             <td> <?php echo utf8_encode($linha["usuarioNome"]) ?> </td>
             <td> <?php echo utf8_encode($linha["usuarioLogin"]) ?> </td>
             <td> <?php echo $linha["nomeNivel"] ?> </td> 
             <td style="padding-left:15px;"> <a title="Alterar" href="alterarUsuario.php?codigo=<?php echo $linha["usuarioId"] ?>"><i class="fa fa-pencil-square-o"></i></a> <a title="Desativar" href="excluirUsuario.php?codigo=<?php echo $linha["usuarioId"] ?>"><i class="fa fa-times"></i></a></td>
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