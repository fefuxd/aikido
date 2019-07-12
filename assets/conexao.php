<?php
        // Passo 1 - Abrir conexao
        $servidor = "179.188.16.33";
        $usuario = "soluticom2";
        $senha = "solu2015";
        $banco = "soluticom2";

        $conecta = mysqli_connect("$servidor","$usuario","$senha","$banco");
        
        // Passo 2 - Testar conexao
        if (mysqli_connect_errno() ) {
            die("conexao falhou: " . mysqli_connect_errno());
        }
?>
