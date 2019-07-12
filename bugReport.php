<?php require_once("conexao/conexao.php"); ?>
<?php require_once("validacao.php"); ?>



<head>
     <meta charset="UTF-8">
     <title>Envio de falhas</title>
    
    
</head>

<body>
     <main>  
       		 <div class="centralizar">
             <div class="subtitulo"><h1>Encontrou falha?</h1><h4>Mande-nos um alerta agora mesmo que solucionaremos o mais rápido possivel!</h4></div><br>
          
            <form method="POST" action="enviarFalha.php" id="ContactForm">
            
            <fieldset class="grupo">
            <div class="campo">
            <label>Nome:</label><input id="nome" type="text" name="nome" style="width: 868px" class="input" required />
            </div>
            </fieldset>
            <fieldset class="grupo">
            <div class="campo">
            <label>E-mail</label><input id="email" type="text" name="email" style="width: 868px" class="input" required />
            </div>
            </fieldset>
 		 	<fieldset class="grupo">
            <div class="campo">
            <label>Assunto:</label><input id="subject" type="text" name="subject" style="width: 868px" class="input" required />
            </div>
            </fieldset>
            <fieldset class="grupo">
            <div class="campo">
            <label>Problema:</label><textarea required id="message" style="width:868px; height: 200px; max-width:868px; max-height:200px"; resize: none; name="message"></textarea>
            </div>
            </fieldset>
            <div class="campo">
            <input type="submit" value="Enviar" name="submsg" class="botao"/>
            </div>
    		</form>
            
     </main>
</body>
</html>