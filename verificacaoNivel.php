<?php
     
      
    $nivel_necessario = 2;
      
    // Verifica se não há a variável da sessão que identifica o usuário
    if (!isset($_SESSION['IDUSER']) OR ($_SESSION['NIVELUSER'] < $nivel_necessario)) {
     
        // Redireciona o visitante para a pagina comum
        header("location:main.php");
	}
    ?>






