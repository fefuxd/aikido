 <?php require_once("conexao/conexao.php"); ?>
 <?php require_once("validacao.php"); ?>
 <?php
      if ( isset($_GET["codigo"]) ) {
		 $seila = $_GET["codigo"];
	   
        $tr3 = "delete from graduacaoaluno WHERE graduacaoAlunoId = {$seila} ";
	
	   	
    $consulta_tr3 = mysqli_query($conecta, $tr3);
    if(!$consulta_tr3) {
        die("erro no banco");

    } 
   }
           
			if(isset($consulta_tr3)  ){
				$aluno = $_GET["idaluno"];
			?>	
	 						<script type="text/JavaScript">
	 						var idDoAluno = "<?php echo $aluno; ?>";
							alert("Registro excluído");
							location.href="alterarGraduacao.php?codigo="+ idDoAluno;
							</script>
							; 
                            
                            <?php	
			}
			?>