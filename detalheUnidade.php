<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>
<?php require_once("verificacaoNivel.php"); ?>

<?php
   if (isset($_GET["codigo"]) ) {
    $escolaId = $_GET["codigo"];
    } else {
    Header("Location: listaUnidade.php");
         }
    // Consulta ao banco de dados
    $consulta = "SELECT escolaId, responsavelEscola, nomeEscola, enderecoEscola, numeroEscola, bairroEscola, cidadeEscola, telefoneEscola FROM escola WHERE escolaId = {$escolaId} ";
    $detalhe = mysqli_query($conecta, $consulta);


        if ( !$detalhe ) {
            die("Falha no banco");
        } else {
            $dados_detalhe 			= mysqli_fetch_assoc($detalhe);
            $escolaId        	    = $dados_detalhe["escolaId"];
            $responsavelEscola  	= $dados_detalhe["responsavelEscola"];	
			$nomeEscola	    	    = $dados_detalhe["nomeEscola"];
            $enderecoEscola         = $dados_detalhe["enderecoEscola"];
		    $numeroEscola	     	= $dados_detalhe["numeroEscola"];
			$bairroEscola			= $dados_detalhe["bairroEscola"];
			$cidadeEscola   		= $dados_detalhe["cidadeEscola"];
			$telefoneEscola     	= $dados_detalhe["telefoneEscola"];
			$usuarioNome			= $dados_detalhe["usuarioNome"];
            
            
						
        }
		



	

// Seleção de estados
    $select = "SELECT nomeEscola, nome FROM escola s INNER JOIN estados e ON s.estadoID = e.estadoID WHERE escolaId = {$escolaId} ";
    
    $lista_estados = mysqli_query($conecta, $select);
   
	
	if ( !$lista_estados ) {
            die("Falha no banco");
        } else {
            $dados_estados = mysqli_fetch_assoc($lista_estados);
            $estadoID   = $dados_estados["nome"];
        
						
        }
	

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detalhes de <?php echo utf8_encode($nomeEscola) ?></title>
    </head>

 <body>

    <main>  
           <div class="centralizar"> 
           <div class="subtitulo"><h1>Detalhes da unidade</h1><h4>Todas as informações da unidade</h4> </div> 
        
<ul>
                    
  <li><h2><?php echo utf8_encode($nomeEscola) ?></h2></li>
  <li><b>Responsável: </b><?php echo utf8_encode($responsavelEscola) ?></li>
  <li><b>Endereço: </b><?php echo utf8_encode($enderecoEscola) ?></li>
  <li><b>Número: </b><?php echo $numeroEscola ?></li>
  <li><b>Bairro: </b><?php echo utf8_encode($bairroEscola) ?></li>
  <li><b>Cidade: </b><?php echo utf8_encode($cidadeEscola) ?></li>
  <li><b>Estado: </b><?php echo utf8_encode($estadoID) ?></li>
  <li><b>Telefone: </b><?php echo $telefoneEscola ?></li>
</ul>
 
 		</div>
                
        
   	</main>

        
 </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>