﻿<?php

	$alfabeto  = "23456789ABCDEFGHIJKL";
	$tamanho   = 12;
	$letra 	   = "";
	$resultado = "";
	
	for ($i = 1; $i < $tamanho ; $i++) {
		$letra = substr ($alfabeto, rand(0,23), 1);
		$resultado .= $letra;
		
	}

	date_default_timezone_set('America/Sao_Paulo');
	$agora = getdate();
	
	$codigo_data  = $agora['year'] . "_" . $agora['yday'];
	$codigo_data .= $agora['hours'] . $agora['minutes'] . $agora['seconds'];
	
	echo "foto_" .$codigo_data . "_" . $resultado;

?>

