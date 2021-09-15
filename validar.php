<?php

function validaCPF($cpf) {
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

function validaRG($rg){
	    
			$rg = preg_replace('/[^0-9]/', '',$rg);
			
			$div=10;
            $mult=9;
            $cont=0;
            $rg_conta=$rg;
            $digito=(int)($rg_conta%$div);
  			$rg_diminui=(int)($rg_conta/$div);
  			$cont= $cont + $digito*100;
  			$rg_conta=$rg_diminui;

			if(strlen($rg)!=9){
				return false;
			}
			if(preg_match('/(\d)\1{10}/',$rg)){
				return false;
			}  

		for ($i = 1; $i <= 8; $i++) {  
  		$digito=(int)($rg_conta%$div);
  		$rg_diminui=(int)($rg_conta/$div);
  		$cont= $cont + $digito*$mult;
  		$rg_conta=$rg_diminui;
  		$mult=$mult-1;
			

			if ($cont % 11 != 0){
  				return false;
 			 }
		}
    			return true;    
      
}
       

$CPF = $_POST['cpf'];
$RG = $_POST['rg'];
$validarRG = validaRG($RG);
$validarCPF = validaCPF($CPF);
if ($validarCPF == 1  and  $validarRG == 0){
  $file= fopen("formulario_texto.txt","a");
  $line = sprintf(" RG : %s\n CPF : %s \n Escolaridade : %s \n",  $_POST['rg'], $_POST['cpf'], $_POST['esc']);
  fwrite($file,$line);
  fclose($file);
  echo "Cadastro Realizado!";
  echo '';
$file= fopen("voltar.html","r");  
while(!feof($file)){
  $line = fgets($file);
  echo $line;
}
fclose($file);
}

else{
  echo "CPF ou RG não é Válido!";
  echo '';
$file= fopen("voltar.html","r");
while(!feof($file)){
  $line = fgets($file);
  echo $line;
}
fclose($file);
}


?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

