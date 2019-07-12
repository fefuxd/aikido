<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>

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
// SELECT PARA CHECAR GRADUAÇÃO ATUAL DO ALUNO
		
	$checkGrad = "SELECT graduacaoId FROM aluno WHERE alunoId = {$id} ";
    
    $grad_atual = mysqli_query($conecta,$checkGrad);
    if ( !$grad_atual ) {
        die ("Erro no banco");
    } 
	$info_grad = mysqli_fetch_assoc($grad_atual);
	$atualGrad = $info_grad["graduacaoId"];


    if (isset($_POST["graduacaoId"] )  AND ( $_POST["alunoId"] == $id ) )  {
        
		$graduacaoId		   = utf8_decode($_POST["graduacaoId"]);
		
		
        
        $tID            = $_POST["alunoId"];
        
		
		
		
		
	
	
				
		
        // Objeto para alterar
        if ( $atualGrad <= $_POST["graduacaoId"] ) {
			
        $alterar  = "UPDATE aluno ";
        $alterar .= "SET ";
        
		$alterar .= "graduacaoId				= '{$graduacaoId}' ";
		

        $alterar .= "WHERE alunoId 	= {$tID} ";
        
        $operacao_alterar = mysqli_query($conecta, $alterar);
        if (!$operacao_alterar) {
            die("Erro na alteração");
        } 
		}
 
		$dataGraduacao		   = $_POST["dataGraduacao"];
	
		
		
		$inserir          = "INSERT INTO graduacaoaluno " ;
        $inserir         .= "(alunoId, graduacaoId, dataGraduacao ) " ;
        $inserir         .= "VALUES ";
        $inserir         .= "($tID, $graduacaoId , '$dataGraduacao' ) " ;
		
		
        
        $operacao_inserir = mysqli_query($conecta,$inserir);
        if (!$operacao_inserir )  {
            die("Erro ao cadastrar no banco");
        }
		
		}

	

?>
		

<?php
    	
	
   
	
	// Consulta as graduações
    $graduacoes = "SELECT * ";
    $graduacoes .= "FROM graduacao ";
    $lista_graduacao = mysqli_query($conecta,$graduacoes);
    if ( !$lista_graduacao ) {
        die ("Erro no banco");
        
    }


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
	
	
	
	// Histórico de graduação
    $select2 = "SELECT graduacaoAlunoId, g.graduacaoId, g.alunoId, dataGraduacao, nomeAluno, graduacaoNome FROM graduacaoaluno g INNER JOIN aluno a ON g.alunoId = a.alunoId INNER JOIN graduacao h ON g.graduacaoId = h.graduacaoId WHERE g.alunoId = {$id} ";
    
    $lista_graduacoes = mysqli_query($conecta, $select2);
   
	
	if ( !$lista_graduacoes ) {
            die("Falha no banco");
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
            <div class="subtitulo" style="width:100%;"> <h1>Alteração de Graduação</h1><h4>Aluno: <?php echo utf8_encode($info_clientes["nomeAluno"]) ?></h4> </div> 
            
                <form action="alterarGraduacao.php?codigo=<?php echo $id ?>" method="post">
                                              
                    <fieldset class="grupo">
                    <div class="campo">
                    <label for="graduacaoId">Graduação</label>
                    <select id="graduacaoId" name="graduacaoId" required style="width: 385px"> 
                        <?php 
                            $minhagraduacao = $info_clientes["graduacaoId"];
                            while($linha2 = mysqli_fetch_assoc($lista_graduacao)) {
                                $graduacao_principal = $linha2["graduacaoId"];
                                if($minhagraduacao == $graduacao_principal) {
                        ?>
                            <option value="<?php echo $linha2["graduacaoId"] ?>" selected>
                                <?php echo utf8_encode($linha2["graduacaoNome"]) ?>
                            </option>
                        <?php
                                } else {
                        ?>
                            <option value="<?php echo $linha2["graduacaoId"] ?>" >
                                <?php echo utf8_encode($linha2["graduacaoNome"]) ?>
                            </option>                        
                        <?php 
                                }
                            }
                        ?>
                    </select>
                        </div>
                        <div class="campo">
                        <label for="dataGraduacao">Data da graduação</label>
                        <input type="date" name="dataGraduacao" id="dataGraduacao" style="width: 385px" required>
                        </div>
                      </fieldset>
                      
                    <input type="hidden" name="alunoId" value="<?php echo $info_clientes["alunoId"] ?>" required>
                        <div class="campo">
                         <button type="submit" class="botao">Confirmar graduação</button>
                         </div>
                      </fieldset>
                    
                    <?php
					if(isset($operacao_alterar) OR isset($operacao_inserir) ){
					 	?>
                     
                        <script type="text/JavaScript">
	 						var idDoAluno = "<?php echo $id; ?>";
							alert("Graduado com sucesso!");
							location.href="alterarGraduacao.php?codigo="+ idDoAluno;
							</script>
							; 
                            
                            <?php	
			}
			?>
                    
                    </fieldset>                            
                </form>  
                
                <h1> Histórico de graduação </h1>
  <br>
   <table> 
            <tr>
             <th> Data </th> 
             <th> Graduado </th>
             <th> Remover </th> 	
              
             
            </tr>
           
            <?php
                while($linha = mysqli_fetch_assoc($lista_graduacoes)) 
                {
            ?>
              
            <tr> 
             <td> <?php echo date("d/m/Y", strtotime ($linha["dataGraduacao"])) ?> </td>
             <td> <?php echo utf8_encode($linha["graduacaoNome"]) ?> </td>
             <td> <a title="Desativar" href="excluirGrad.php?codigo=<?php echo $linha["graduacaoAlunoId"] ?>&idaluno=<?php echo $id ?>"><i class="fa fa-times"></i></a></td>
            
            </tr>
   
		<?php
            }
        ?>
                 
       </div>
        </main>

     
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>