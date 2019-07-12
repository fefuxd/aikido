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
    if (isset($_FILES['fotoDoAluno'] ) AND ( $_POST["alunoId"] == $id ) ) {
		$resultadoFoto = publicarImagem($_FILES['fotoDoAluno']);
		
		$mensagem = $resultadoFoto[0];
		
        
		$fotoAluno 			   =  $resultadoFoto[1];
		
		
        
        $tID            = $_POST["alunoId"];
        
        // Objeto para alterar
        
        $alterar  = "UPDATE aluno ";
        $alterar .= "SET ";
       
		$alterar .= "fotoAluno					= '{$fotoAluno}' ";
	
		
		
		
        $alterar .= "WHERE alunoId 	= {$tID} ";
        
        $operacao_alterar = mysqli_query($conecta, $alterar);
        if (!$operacao_alterar) {
            die("Erro na alteração");
        } 
		
	}

	

?>
		


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alteração de Cadastro</title>
   
    </head>

    <body>
 
        <main>  
        	<div class="centralizar">
           <div class="subtitulo"> <h1>Alteração de foto</h1><h4><?php echo utf8_encode($info_clientes["nomeAluno"])  ?></h4> </div>
             
                <form action="alterarFoto.php?codigo=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                    
                  
                  	  <fieldset class="grupo">
                      <div class="campo">
 
                      <div class="fotoperfil">
                      <img src="<?php echo utf8_encode($info_clientes["fotoAluno"])  ?>">
                      </div>
                      <input type="file" name="fotoDoAluno" >
                       <?php
						 
						 		if (isset($mensagem) ) {
								 	echo $mensagem;	
								} 
						 
						 ?>

                      </div>
                      </fieldset>
                      	<input type="hidden" name="alunoId" value="<?php echo $info_clientes["alunoId"] ?>">
                          <button type="submit" class="botao">Confirmar alteração</button>
                          </div>
                      
                    
                    <?php
					if(isset($operacao_alterar) ){
					 	?>
                     
                        <?php echo '
							<script type="text/JavaScript">
							alert("Foto alterada com sucesso");
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