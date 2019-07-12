 <?php require_once("conexao/conexao.php"); ?>
 <?php require_once("validacao.php"); ?>
 <?php
      if ( isset($_GET["codigo"]) ) {
		 $seila = $_GET["codigo"];
	   
        $tr3 = "delete from reuniao WHERE reuniaoId = {$seila} ";
	
	   	
    $consulta_tr3 = mysqli_query($conecta, $tr3);
    if(!$consulta_tr3) {
        die("erro no banco");

    } else {
						echo'<script type="text/JavaScript">
							alert("Ata removida com sucesso!");
							location.href="cadReuniao.php"
							</script>'
							; 
		
	}
   }
           
		