<?php
        // Passo 1 - Abrir conexao
        $servidor = "localhost";
        $usuario = "root";
        $senha = "lovefear";
        $banco = "aikido";

        $conecta = mysqli_connect("$servidor","$usuario","$senha","$banco");
        
        // Passo 2 - Testar conexao
        if (mysqli_connect_errno() ) {
            die("conexao falhou: " . mysqli_connect_errno());
        }
?>
