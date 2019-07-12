<?php
 require_once("conexao/conexao.php"); ?>
<?php
 require_once("validacao.php"); ?>
<?php
    // Contador de Alunos
   $count_aluno = "SELECT count(alunoId) FROM aluno  ";

	$total_alunos = mysqli_query($conecta, $count_aluno);
	
		if ( !$total_alunos ) {
			   die("Falha no banco");
        } else {
            $dados_aluno = mysqli_fetch_assoc($total_alunos);
            $contador_alunos   = $dados_aluno["count(alunoId)"];
			
		}
?>

<?php
    // Contador de Unidade
   $count_unidade = "SELECT count(escolaId) FROM escola  ";

	$total_unidade = mysqli_query($conecta, $count_unidade);
	
		if ( !$total_unidade ) {
			   die("Falha no banco");
        } else {
            $dados_unidade = mysqli_fetch_assoc($total_unidade);
            $contador_unidade   = $dados_unidade["count(escolaId)"];
			
		}
?>

<?php
    // Contador de Usuários do sistema
   $count_usuario = "SELECT count(usuarioId) FROM usuario  ";

	$total_usuario = mysqli_query($conecta, $count_usuario);
	
		if ( !$total_usuario ) {
			   die("Falha no banco");
        } else {
            $dados_usuario = mysqli_fetch_assoc($total_usuario);
            $contador_usuario   = $dados_usuario["count(usuarioId)"];
			
		}
	
?>

<?php
    // Contador de Aniversariantes
   $count_aniversario = "SELECT count(dataNascimento) FROM aluno WHERE MONTH(dataNascimento) = MOD(MONTH(CURDATE()), 12) ORDER by DAY(dataNascimento)  ";

	$total_countAniv = mysqli_query($conecta, $count_aniversario);
	
		if ( !$total_countAniv ) {
			   die("Falha no banco");
        } else {
            $dados_countAniv = mysqli_fetch_assoc($total_countAniv);
            $contador_Aniv   = $dados_countAniv["count(dataNascimento)"];
			
		}
?>















<?php
    // Contador de alunos na faixa branca
   $count_grad = "SELECT count(a.graduacaoId) as faixaBranca, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 22 ";

	$total_countGrad50 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad50 ) {
			   die("Falha no banco");
        } else {
            $dados_grad50 = mysqli_fetch_assoc($total_countGrad50);
            $contador_Grad50   = $dados_grad50["faixaBranca"];
			$nomeGrad50        = $dados_grad50["graduacaoNome"];
			
		}
?>


<?php
    // Contador de alunos na faixa branca e cinza
   $count_grad = "SELECT count(a.graduacaoId) as faixaBrancaECinza, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 23 ";

	$total_countGrad51 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad51 ) {
			   die("Falha no banco");
        } else {
            $dados_grad51 = mysqli_fetch_assoc($total_countGrad51);
            $contador_Grad51   = $dados_grad51["faixaBrancaECinza"];
			$nomeGrad51        = $dados_grad51["graduacaoNome"];
			
		}
?>


<?php
    // Contador de alunos na faixa cinza
   $count_grad = "SELECT count(a.graduacaoId) as faixaCinza, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 24 ";

	$total_countGrad52 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad52 ) {
			   die("Falha no banco");
        } else {
            $dados_grad52 = mysqli_fetch_assoc($total_countGrad52);
            $contador_Grad52   = $dados_grad52["faixaCinza"];
			$nomeGrad52        = $dados_grad52["graduacaoNome"];
			
		}
?>


<?php
    // Contador de alunos na faixa verde
   $count_grad = "SELECT count(a.graduacaoId) as faixaVerde, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 25 ";

	$total_countGrad53 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad53 ) {
			   die("Falha no banco");
        } else {
            $dados_grad53 = mysqli_fetch_assoc($total_countGrad53);
            $contador_Grad53   = $dados_grad53["faixaVerde"];
			$nomeGrad53        = $dados_grad53["graduacaoNome"];
			
		}
?>


<?php
    // Contador de alunos na faixa vermelha
   $count_grad = "SELECT count(a.graduacaoId) as faixaVermelha, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 26 ";

	$total_countGrad54 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad54 ) {
			   die("Falha no banco");
        } else {
            $dados_grad54 = mysqli_fetch_assoc($total_countGrad54);
            $contador_Grad54   = $dados_grad54["faixaVermelha"];
			$nomeGrad54        = $dados_grad54["graduacaoNome"];
			
		}
?>


<?php
    // Contador de alunos na faixa bordô
   $count_grad = "SELECT count(a.graduacaoId) as faixaBordo, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 27 ";

	$total_countGrad55 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad55 ) {
			   die("Falha no banco");
        } else {
            $dados_grad55 = mysqli_fetch_assoc($total_countGrad55);
            $contador_Grad55   = $dados_grad55["faixaBordo"];
			$nomeGrad55        = $dados_grad55["graduacaoNome"];
			
		}
?>


<?php
    // Contador de alunos na faixa azul
   $count_grad = "SELECT count(a.graduacaoId) as faixaAzul, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 28 ";

	$total_countGrad56 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad56 ) {
			   die("Falha no banco");
        } else {
            $dados_grad56 = mysqli_fetch_assoc($total_countGrad56);
            $contador_Grad56   = $dados_grad56["faixaAzul"];
			$nomeGrad56        = $dados_grad56["graduacaoNome"];
			
		}
?>


<?php
    // Contador de alunos na faixa azul e laranja
   $count_grad = "SELECT count(a.graduacaoId) as faixaAzulELaranja, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 29 ";

	$total_countGrad57 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad57 ) {
			   die("Falha no banco");
        } else {
            $dados_grad57 = mysqli_fetch_assoc($total_countGrad57);
            $contador_Grad57   = $dados_grad57["faixaAzulELaranja"];
			$nomeGrad57        = $dados_grad57["graduacaoNome"];
			
		}
?>


<?php
    // Contador de alunos na faixa laranja
   $count_grad = "SELECT count(a.graduacaoId) as faixaLaranja, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 30 ";

	$total_countGrad58 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad58 ) {
			   die("Falha no banco");
        } else {
            $dados_grad58 = mysqli_fetch_assoc($total_countGrad58);
            $contador_Grad58   = $dados_grad58["faixaLaranja"];
			$nomeGrad58        = $dados_grad58["graduacaoNome"];
			
		}
?>


<?php
    // Contador de alunos na 6º kyu
   $count_grad = "SELECT count(a.graduacaoId) as 6kyu, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 31 ";

	$total_countGrad1 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad1 ) {
			   die("Falha no banco");
        } else {
            $dados_grad1 = mysqli_fetch_assoc($total_countGrad1);
            $contador_Grad1   = $dados_grad1["6kyu"];
			$nomeGrad1        = $dados_grad1["graduacaoNome"];
			
		}
?>

<?php
    // Contador de alunos na 5º kyu
   $count_grad = "SELECT count(a.graduacaoId) as 5kyu, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 32 ";

	$total_countGrad2 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad2 ) {
			   die("Falha no banco");
        } else {
            $dados_grad2 = mysqli_fetch_assoc($total_countGrad2);
            $contador_Grad2   = $dados_grad2["5kyu"];
			$nomeGrad2	      = $dados_grad2["graduacaoNome"];
			
		}
?>

<?php
    // Contador de alunos na 4º kyu
   $count_grad = "SELECT count(a.graduacaoId) as 4kyu, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 33 ";

	$total_countGrad3 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad3 ) {
			   die("Falha no banco");
        } else {
            $dados_grad3 = mysqli_fetch_assoc($total_countGrad3);
            $contador_Grad3   = $dados_grad3["4kyu"];
			$nomeGrad3        = $dados_grad3["graduacaoNome"];
			
		}
?>

<?php
    // Contador de alunos na 3º kyu
   $count_grad = "SELECT count(a.graduacaoId) as 3kyu, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 34 ";

	$total_countGrad4 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad4 ) {
			   die("Falha no banco");
        } else {
            $dados_grad4 = mysqli_fetch_assoc($total_countGrad4);
            $contador_Grad4   = $dados_grad4["3kyu"];
			$nomeGrad4        = $dados_grad4["graduacaoNome"];
			
		}
?>

<?php
    // Contador de alunos na 2º kyu
   $count_grad = "SELECT count(a.graduacaoId) as 2kyu, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 35 ";

	$total_countGrad5 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad5 ) {
			   die("Falha no banco");
        } else {
            $dados_grad5 = mysqli_fetch_assoc($total_countGrad5);
            $contador_Grad5   = $dados_grad5["2kyu"];
			$nomeGrad5        = $dados_grad5["graduacaoNome"];
			
		}
?>

<?php
    // Contador de alunos na 1º kyu
   $count_grad = "SELECT count(a.graduacaoId) as 1kyu, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 36 ";

	$total_countGrad6 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad6 ) {
			   die("Falha no banco");
        } else {
            $dados_grad6 = mysqli_fetch_assoc($total_countGrad6);
            $contador_Grad6   = $dados_grad6["1kyu"];
			$nomeGrad6        = $dados_grad6["graduacaoNome"];
			
		}
?>

<?php
    // Contador de alunos na shodan
   $count_grad = "SELECT count(a.graduacaoId) as shodan, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 37 ";

	$total_countGrad7 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad7 ) {
			   die("Falha no banco");
        } else {
            $dados_grad7 = mysqli_fetch_assoc($total_countGrad7);
            $contador_Grad7   = $dados_grad7["shodan"];
			$nomeGrad7        = $dados_grad7["graduacaoNome"];
			
		}
?>

<?php
    // Contador de alunos na nidan
   $count_grad = "SELECT count(a.graduacaoId) as nidan, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 38 ";

	$total_countGrad8 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad8 ) {
			   die("Falha no banco");
        } else {
            $dados_grad8 = mysqli_fetch_assoc($total_countGrad8);
            $contador_Grad8   = $dados_grad8["nidan"];
			$nomeGrad8        = $dados_grad8["graduacaoNome"];
			
		}
?>

<?php
    // Contador de alunos na sandan
   $count_grad = "SELECT count(a.graduacaoId) as sandan, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 39 ";

	$total_countGrad9 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad9 ) {
			   die("Falha no banco");
        } else {
            $dados_grad9 = mysqli_fetch_assoc($total_countGrad9);
            $contador_Grad9   = $dados_grad9["sandan"];
			$nomeGrad9        = $dados_grad9["graduacaoNome"];
			
		}
?>

<?php
    // Contador de alunos na yondan
   $count_grad = "SELECT count(a.graduacaoId) as yondan, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 40 ";

	$total_countGrad10 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad10 ) {
			   die("Falha no banco");
        } else {
            $dados_grad10 = mysqli_fetch_assoc($total_countGrad10);
            $contador_Grad10   = $dados_grad10["yondan"];
			$nomeGrad10        = $dados_grad10["graduacaoNome"];
			
		}
?>

<?php
    // Contador de alunos na godan
   $count_grad = "SELECT count(a.graduacaoId) as godan, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 41 ";

	$total_countGrad11 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad11 ) {
			   die("Falha no banco");
        } else {
            $dados_grad11 = mysqli_fetch_assoc($total_countGrad11);
            $contador_Grad11   = $dados_grad11["godan"];
			$nomeGrad11        = $dados_grad11["graduacaoNome"];
			
		}
?>

<?php
    // Contador de alunos na rokudan
   $count_grad = "SELECT count(a.graduacaoId) as rokudan, graduacaoNome from aluno a INNER JOIN graduacao g ON a.graduacaoId = g.graduacaoId WHERE a.graduacaoId = 42 ";

	$total_countGrad12 = mysqli_query($conecta, $count_grad);
	
		if ( !$total_countGrad12 ) {
			   die("Falha no banco");
        } else {
            $dados_grad12 = mysqli_fetch_assoc($total_countGrad12);
            $contador_Grad12   = $dados_grad12["rokudan"];
			$nomeGrad12        = $dados_grad12["graduacaoNome"];
			
		}
?>

<?php

 // Aniversariantes do Mês
   $aniversario = "SELECT nomeAluno, dataNascimento as diaAniversario, a.escolaId, nomeEscola, email FROM aluno a INNER JOIN escola e ON a.escolaId = e.escolaId WHERE MONTH(dataNascimento) = MOD(MONTH(CURDATE()), 13) ORDER by DAY(dataNascimento) ";

	$total_aniversario = mysqli_query($conecta, $aniversario);
	
		if ( !$total_aniversario ) {
			   die("Falha no banco");
        }




?>




<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Sistema - Brasil Aikido</title>
    </head>

   		 <body>
      		  <main>  
                  <div class="margem">
              		<h1> Relatório </h1><h4>Relatório de academias, usuários e alunos cadastrados</h4>
                
                
            
                <ul class="contagem">
                    <li><span class="numero"><?php echo $contador_alunos ?></span><br><span class="descricao">Alunos cadastrados</span></li>
                    <li><span class="numero"><?php echo $contador_unidade ?></span><br><span class="descricao">Unidades cadastradas</span></li>
                    <li><span class="numero"><?php echo $contador_usuario ?></span><br><span class="descricao">Usuários cadastrados</span></li>
                    <li><span class="numero"><?php echo $contador_Aniv ?></span><br><span class="descricao">Aniversáriantes no mês</span></li>
                </ul>
         
         <ul class="grad">  
         
        <div id="relatorio">
        
        <li><span class="numero"> <?php echo utf8_encode($contador_Grad50); ?> </span><br><span class="descricao"> alunos na faixa <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad50); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad51); ?> </span><br><span class="descricao"> alunos na faixa <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad51); ?></span> </span></li>
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad52); ?> </span><br><span class="descricao"> alunos na faixa <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad52); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad53); ?> </span><br><span class="descricao"> alunos na faixa <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad53); ?></span> </span></li>
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad54); ?> </span><br><span class="descricao"> alunos na faixa <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad54); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad55); ?> </span><br><span class="descricao"> alunos na faixa <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad55); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad56); ?> </span><br><span class="descricao"> alunos na faixa <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad56); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad57); ?> </span><br><span class="descricao"> alunos na faixa <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad57); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad58); ?> </span><br><span class="descricao"> alunos na faixa <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad58); ?></span> </span></li>
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad1); ?> </span><br><span class="descricao"> alunos no <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad1); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad2); ?> </span><br><span class="descricao"> alunos no <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad2); ?></span> </span></li>
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad3); ?> </span><br><span class="descricao"> alunos no <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad3); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad4); ?> </span><br><span class="descricao"> alunos no <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad4); ?></span> </span></li>
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad5); ?> </span><br><span class="descricao"> alunos no <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad5); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad6); ?> </span><br><span class="descricao"> alunos no <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad6); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad7); ?> </span><br><span class="descricao"> alunos no <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad7); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad8); ?> </span><br><span class="descricao"> alunos no <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad8); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad9); ?> </span><br><span class="descricao"> alunos no <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad9); ?></span> </span></li>
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad10); ?> </span><br><span class="descricao"> alunos no <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad10); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad11); ?> </span><br><span class="descricao"> alunos no <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad11); ?></span> </span></li> 
       <li><span class="numero"> <?php echo utf8_encode($contador_Grad12); ?> </span><br><span class="descricao"> alunos no <span style="font-weight:700;"><?php echo utf8_encode($nomeGrad12); ?></span> </span></li>
       
        </ul>    
        </div>
          
                  
<div id="aniv">                  
 <h3 style="font-weight:600;">Aniversariantes do mês</h3><br>
 
 <table> 
            <tr>
             <th> Data </th> 
             <th> Nome </th>
             <th> Unidade </th>	
             
            </tr>
           
            <?php
                while($linha = mysqli_fetch_assoc($total_aniversario)) 
                {
            ?>
              
            <tr> 
             <td> <?php echo date("d/m", strtotime ($linha["diaAniversario"])) ?> </td>
             <td> <?php echo utf8_encode($linha["nomeAluno"]) ?> </td>
             <td> <?php echo utf8_encode($linha["nomeEscola"]) ?> </td>
            </tr>
   
		<?php
            }
        ?>
      </table>       
 
 </div>
                  </div>   
                  
          <div class="adm">        
           <p style="margin-top: 5px; font-weight:600;"> Atualizações do sistema </p> <br> <br>
           
           <p style="text-align: left; margin-left: 5px;"> 29/10 - Implementado central de notificação de falhas no sistema. Se encontrar alguma erro no sistema nos relate agora mesmo pelo link no menu "Reportar". </p> <br>
                       
           <p style="text-align: left; margin-left: 5px;"> 28/10 - Adicionado graduações infantil (Faixas: branca, branca e cinza, cinza, verde, vermelha, bordô, azul, azul e laranja, laranja). Para regredir faixas de alunos já cadastrados, utilizar a área de Alteração "<i class="fa fa-pencil-square-o"></i>" de aluno. </p> <br>
           <p style="text-align: left; margin-left: 5px;"> 23/10 - Alterado formato do telefone/celular, impedindo a escrita de caracteres não numéricos e ajustando automaticamente a formatação.  </p> <br>
           
           <p style="text-align: left; margin-left: 5px;"> 21/10 - Implementado codificação que valida CPF com a receita federal. </p> <br>
           	
           <p style="text-align: left; margin-left: 5px;"> 15/10 - Implementado cadastro de responsável para menor de idade. </p>       
                  
                  
          </div>
          
          
                      
        	 </main>
            

        
    </body>
    
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>