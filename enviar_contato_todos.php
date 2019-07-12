<?php require_once("conexao/conexao.php"); ?>


<?php

    $subject  =   $_POST['subject']; //pega os dados que foi digitado no ID subject.
    $message  =   $_POST['message']; //pega os dados que foi digitado no ID message.
  
    $headers  = "From: ubaikido@gmail.com\r\n";
    $headers .= "Reply-To: ubaikido@gmail.com\r\n";
 
/*abaixo será os dados que serão enviado para o email
cadastrado para receber o formulário.*/
 	   $email_remetente = "ubaikido@gmail.com";
      

$msg = "SELECT email FROM aluno WHERE email is not null " ;




$conectando = mysqli_query($conecta, $msg);
    if (!$conectando ) {
        die ("Erro na consulta");
    }	
	
	
	while ($linha = mysqli_fetch_assoc($conectando)) {


$status = mail ($linha['email'],$subject, $message,$headers, "-f$email_remetente");
}



    if($status) {
        echo '
							<script type="text/JavaScript">
							alert("E-mail enviado com sucesso!");
							location.href="main.php"
							</script>
							'; //verifica se foi enviado o email com sucesso.
    }
    else {
         echo '
							<script type="text/JavaScript">
							alert("Erro!");
							location.href="main.php"
							</script>
							';
    }
	
	
?>

