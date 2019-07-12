﻿<?php
  function gerarCodigoUnico() {
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
	
	return "ata_" .$codigo_data . "_" . $resultado;
	
  }


  function getExtensao($nome) {
	 return strrchr($nome,".");
	 
  }
  
  function publicarImagem($imagem){
	 $arquivo_temporario = $imagem['tmp_name'];
	 $nome_original		 = $imagem['name'];
	 $nome_novo			 = gerarCodigoUnico() . getExtensao($nome_original);
	 $nome_completo		 = "uploads/reuniao/" . $nome_novo; 
  
  
  if(move_uploaded_file($arquivo_temporario, $nome_completo)){
	return array("Arquivo publicado com sucesso", $nome_completo);
  
  } else {
	return array(retornarErro($imagem['error']),"");
  }

}

function retornarErro($numero_erro) {
 $array_erro = array(
        UPLOAD_ERR_OK => "Sem erro.",
        UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
        UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
        UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
        UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
        UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
        UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
        UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
    ); 

	return $array_erro[$numero_erro];
}

?>