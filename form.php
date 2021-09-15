<?php 

$file=fopen("formulario_texto.txt","a");
$line=sprintf(" Email : %s \n Nickname : %s \r\n",
$_POST['email'],$_POST['nickname']);
fwrite($file,$line);
fclose($file);
?>

<?php
echo '';
$file= fopen("formulario.html","r");
while(!feof($file)){
  $line = fgets($file);
  echo $line;
}
fclose($file);

?>

