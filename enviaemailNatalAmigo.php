<?php
        // Passo 1 - Abrir conexao
 		 $servidor = "localhost";
        $usuario = "brasi549_sis";
        $senha = "1dDWbi3nP";
        $banco = "brasi549_sistemaaikido";

        $conecta = mysqli_connect("$servidor","$usuario","$senha","$banco");
        
        // Passo 2 - Testar conexao
        if (mysqli_connect_error() ) {
            die("conexao falhou: " );
        }


$headers  = "From: ubaikido@gmail.com \r\n";
$headers .= "Reply-To: ubaikido@gmail.com \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
 
 

$email_remetente = "ubaikido@gmail.com";


list($anoatual, $mesatual, $diaatual) = explode("-", $date);

$aniversario = "SELECT * FROM amigo " ;




$conectando = mysqli_query($conecta, $aniversario);
    if (!$conectando ) {
        die ("Erro na consulta");
    }

while ($linha = mysqli_fetch_assoc($conectando)) {


	$nome_aluno = $linha['nomeAmigo'];
	$assunto = 'Feliz Natal ' . $nome_aluno  ;
	$assunto_codificado = sprintf('=?%s?%s?%s?=', 'UTF-8', 'B', base64_encode($assunto));
	$body =  "<img src='http://www.brasilaikido.com.br/restrito/mensagem-natal-roney.png'>";
mail ($linha['emailAmigo'],$assunto_codificado,$body,$headers, "-f$email_remetente");

}



?>
