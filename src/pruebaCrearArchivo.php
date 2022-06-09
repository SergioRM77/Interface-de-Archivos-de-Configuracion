<?php
$file = "archivo.ini";
$texto = "edad = 30";
$fp = fopen($file,"a");
fwrite($fp, PHP_EOL);
fwrite($fp, PHP_EOL);
fwrite($fp, PHP_EOL);
fwrite($fp, $texto);
fclose($fp);
file_get_contents();
file_put_contents();
?>