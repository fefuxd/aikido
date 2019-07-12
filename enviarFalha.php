<?php require_once("conexao/conexao.php"); ?>


<?php

	$nome	  =   $_POST['nome']; //pega os dados que foi digitado no ID subject.
	$email 	  =   $_POST['email']; //pega os dados que foi digitado no ID subject.
    $subject  =   $_POST['subject']; //pega os dados que foi digitado no ID subject.
    $message  =   $_POST['message']; //pega os dados que foi digitado no ID message.
  
    $headers  = "From: ubaikido@gmail.com \r\n";
	$headers .= "Reply-To: ubaikido@gmail.com \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
	
	   $corpo  = "Formulario de bug enviado do sistema de Aikido  <br> ";
       $corpo .= "Nome: " . $nome . " <br>";
       $corpo .= "Email: " . $email . "<br>";
       $corpo .= "Comentarios: " . $message . " ";
 
/*abaixo será os dados que serão enviado para o email
cadastrado para receber o formulário.*/
 	   $email_remetente = "contato@soluticom.com.br";
      
  
       $email_to = "contato@soluticom.com.br"; //substitua este email pelo seu email do seu site.
 
    $status = mail($email_to, $subject, $corpo, $headers, "-f$email_remetente"); //enviando o email.
 
    if($status) {
        echo '
							<script type="text/JavaScript">
							alert("Problema reportado com sucesso!");
							location.href="main.php"
							</script>
							'; //verifica se foi enviado o email com sucesso.
    }
    else {
         echo '
							<script type="text/JavaScript">
							alert("Erro ao reportar. Entre em contato com o administrador.");
							location.href="main.php"
							</script>
							';
    }
  
 
?>

