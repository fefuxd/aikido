<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>


<head>
     <meta charset="UTF-8">
     <title>Envio de e-mail</title>
    
    
</head>

<body>
     <main>  
       		 <div class="centralizar">
             <div class="subtitulo"><h1>Enviar email</h1><h4>Mensagem para todos os alunos de todas unidades.</h4></div>
          
            <form method="POST" action="enviar_contato_todos.php" id="ContactForm">
            
                    	    
 		 	<fieldset class="grupo">
            <div class="campo">
            <label>Assunto:</label><input id="subject" type="text" name="subject" style="width: 868px" class="input" />
            </div>
            </fieldset>
            <fieldset class="grupo">
            <div class="campo">
            <label>Mensagem:</label><textarea id="message" style="width:868px; height: 200px; max-width:868px; max-height:200px"; resize: none; name="message"></textarea>
            </div>
            </fieldset>
            <div class="campo">
            <input type="submit" value="Enviar" name="submsg" class="botao"/>
            </div>
    		</form>
            
     </main>
</body>
</html>