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


$aniversario = "SELECT * FROM aluno " ;


$conectando = mysqli_query($conecta, $aniversario);
    if (!$conectando ) {
        die ("Erro na consulta");
    }

while ($linha = mysqli_fetch_assoc($conectando)) {


	$nome_aluno = $linha['nomeAluno'];
	$assunto = 'Mensagem de Aikido para ' . $nome_aluno  ;
	$assunto_codificado = sprintf('=?%s?%s?%s?=', 'UTF-8', 'B', base64_encode($assunto));
	
	$dataAtual = date("m");
	$msg = "";
		switch ($dataAtual) {
			case 01:
				$msg = "<img src='http://www.brasilaikido.com.br/restrito/mensagem/janeiro.png'>";
				break;
			case 02:
				$msg = "<img src='http://www.brasilaikido.com.br/restrito/mensagem/fevereiro.png'>";
				break;
			case 03:
				$msg = "<img src='http://www.brasilaikido.com.br/restrito/mensagem/marco.png'>";
				break;
			case 04:
				$msg = "<img src='http://www.brasilaikido.com.br/restrito/mensagem/abril.png'>";
				break;
			case 05:
				$msg = "<img src='http://www.brasilaikido.com.br/restrito/mensagem/maio.png'>";
				break;
			case 06:
				$msg = "<img src='http://www.brasilaikido.com.br/restrito/mensagem/junho.png'>";
				break;
			case 07:
				$msg = "<img src='http://www.brasilaikido.com.br/restrito/mensagem/julho.png'>";
				break;
			case 08:
				$msg = "<img src='http://www.brasilaikido.com.br/restrito/mensagem/agosto.png'>";
				break;
			case 09:
				$msg = "<img src='http://www.brasilaikido.com.br/restrito/mensagem/setembro.png'>";
				break;
			case 10:
				$msg = "<img src='http://www.brasilaikido.com.br/restrito/mensagem/outubro.png'>";
				break;
			case 11:
				$msg = "<img src='http://www.brasilaikido.com.br/restrito/mensagem/novembro.png'>";
				break;
			case 12:
				$msg = "<img src='http://www.brasilaikido.com.br/restrito/mensagem/dezembro.png'>";
				break;
				
		}
	
	$body = $msg;
mail ($linha['email'],$assunto_codificado,$body,$headers, "-f$email_remetente");

}



?>
