<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>


<?php
        if ( isset($_POST["nomeAluno"]) ) {
            $tID = $_POST["alunoId"];
            $exclusao = "UPDATE aluno SET status = 0 ";
            $exclusao .= "WHERE alunoId = {$tID}";
            $con_exclusao = mysqli_query($conecta, $exclusao);
            if ( !$con_exclusao ) {
             die ("Registro não desativado");   
            } 
        }
		
        // Consulta a tabela de clientes
        $tr = "SELECT * FROM aluno ";
        if ( isset($_GET["codigo"]) ) {
            $id = $_GET["codigo"];
            $tr .= "WHERE alunoId = {$id} ";
        }

    $con_clientes = mysqli_query($conecta, $tr);
    if (!$con_clientes ) {
        die("Erro na consulta");
        
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


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exclusão de Cliente</title>
        
       
    </head>

    <body>
      
        
        <main>  
            <div class="centralizar">
                <form action="excluirAluno.php?codigo=<?php echo $id ?>" method="post">
                    <div class="subtitulo"><h1>Exclusão de Aluno</h1><h4>Desativar aluno: <?php echo utf8_encode($info_clientes["nomeAluno"]); ?> </h4></div>
                    <fieldset class="grupo">
                    <div class="campo">
                    <label for="nomeAluno">Nome do Aluno</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["nomeAluno"])  ?>" style="width: 850px" maxlength="200" name="nomeAluno" id="nomeAluno" >
                    </div>
                    </fieldset>
                    <fieldset class="grupo">
                    <div class="campo">
                    <label for="endereco">Endereço</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["endereco"])  ?>" style="width: 850px" maxlength="200" name="endereco" id="endereco" >
                    </div>
                    </fieldset>
                    <fieldset class="grupo">
                    <div class="campo">
                    <label for="cidade">Cidade</label>
                    <input type="text" value="<?php echo utf8_encode($info_clientes["cidade"])  ?>" style="width: 850px" maxlength="200" name="cidade" id="cidade" >
                    </div>
                    
                    <input type="hidden" name="alunoId" value="<?php echo $info_clientes["alunoId"] ?>">
                    </fieldset>
                    <input type="submit" class="botao" value="Desativar Aluno"> 
                    
                    
                     <?php
					if(isset($con_exclusao)){
					 	?>
                     
                        <?php echo '
							<script type="text/JavaScript">
							alert("Aluno desativado com sucesso");
							location.href="listaAluno.php"
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