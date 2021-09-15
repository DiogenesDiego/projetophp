<?php 

$file=fopen("formulario_texto.txt","a");
$line = sprintf(" Nome : %s\n Endereço : %s\n Telefone : %s\n", $_POST['nome'], $_POST['ende'], $_POST['tel']);
fwrite($file,$line);
fclose($file);
?>

<?php
echo '';
$file= fopen("formulario2.html","r");
while(!feof($file)){
  $line = fgets($file);
  echo $line;
}
fclose($file);

?>