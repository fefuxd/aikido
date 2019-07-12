

    <!-- Chamada PHP Header -->
        <?php
            if ( isset($_SESSION["IDUSER"]) )  {
                $user = $_SESSION["IDUSER"];
    
                $saudacao = "SELECT usuarioNome, usuarioId, qtdAcesso, u.escolaId, nomeEscola ";
                $saudacao .= "FROM usuario u INNER JOIN escola e ON u.escolaId = e.escolaId ";
                $saudacao .= "WHERE usuarioId = {$user} ";

                $saudacao_login = mysqli_query($conecta, $saudacao);
                if( !$saudacao_login ) {
                    die ("Falha no banco");
                }
    
            $saudacao_login = mysqli_fetch_assoc($saudacao_login);
			$apelido = $saudacao_login["usuarioNome"];
			$usuarioId = $saudacao_login["usuarioId"];
			$qtd_ac = $saudacao_login["qtdAcesso"];
			$escolaId = $saudacao_login["escolaId"];
			$escolaProf  = $saudacao_login["nomeEscola"];
            }
        ?>
<head>
	<meta charset="UTF-8">
    <!-- Reset CSS -->
	<link rel="stylesheet" href="css/reset.css">
    
    <!-- CSS Geral -->
	<link rel="stylesheet" href="css/geral.css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/favicon.ico">
    
    <!-- Fonte do Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    
    <!-- Menu -->
	<link rel="stylesheet" href="css/menu.css">
    
    <!-- Formulário -->
	<link rel="stylesheet" href="css/form.css">
    
    <!-- Máscara do formulário -->
    <script>
        function formatar(mascara, documento){
            var i = documento.value.length;
            var saida = mascara.substring(0,1);
            var texto = mascara.substring(i)
  
        if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
        }
  
        }
    </script>
    <!-- FIM Máscara do formulário -->

    <!-- SCRIPT PARA IMPRESSAO PDF -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#relatorio").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Relatório</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
    <!-- FIM DO SCRIPT -->
    
    
</head>

<body>
    <header>
        <div id="bemvindo">Bem Vindo <i class="fa fa-user"></i> <b><?php echo utf8_encode($apelido) ?></b>, este é seu <b><?php echo $qtd_ac?>º</b> acesso ao sistema. Unidade: <?php echo utf8_encode($escolaProf) ?> </div>
        <div id="sair"><a href="sair.php">Sair <i class="fa fa-sign-out"></i></a></div>
        <div id="sair"><a href="alterarSenha.php">Alterar senha <i class="icon-lock"></i></a></div>
    </header>
    <nav>
        <div id="menu">
  		<ul onClick="" class="zetta-menu zm-effect-fade zm-full-width" style="height:100px;">
         		<img src="assets/imagens/logo.png" alt="logo" style="float: left;">
        <li style="height:100px;">
      		<a href="main.php" style="line-height:100px;">Home</a>
   		</li>
   		<li style="height:100px; ">
      		<a style="line-height:100px;">Cadastrar</a>
      			<ul class="w-200">
         			<li><a href="cadAluno.php">Aluno</a></li>
         			
      			</ul>
   		</li>
   		<li style="height:100px;">
            <a style="line-height:100px;">Pesquisar</a>
      			<ul class="w-200">
         			<li><a href="listaAluno.php">Aluno</a></li>
         			
      			</ul>
   		</li>
        <li style="height:100px;">
            <a style="line-height:100px;">Arquivo</a>
      			<ul class="w-200">
         			<li><a href="cadReuniao.php">Ata de reunião</a></li>
                    <li><a href="cadFluxo.php">Fluxo de caixa</a></li>         			
      			</ul>
   		</li>
        	<li style="height:100px;">
            <a style="line-height:100px;">Email</a>
      			<ul class="w-250">
         			<li><a href="envia.php">Enviar</a></li>
      			</ul>
   		</li>
        
        <li style="height:100px;">
            <a style="line-height:100px;">Reportar</a>
      			<ul class="w-250">
         			<li><a href="bugReport.php">Reportar falha</a></li>
      			</ul>
   		</li>
        
		    
		</ul>
        </div>
    </nav>
    <footer>
        <div id="direitos">© 2015 - União Brasileira de Aikido</div>
        <div id="soluticom"><a href="http://www.soluticom.com.br" target="_blank"><img src="assets/imagens/soluticom.png" alt="soluticom"></a></div>
    </footer>
</body>
