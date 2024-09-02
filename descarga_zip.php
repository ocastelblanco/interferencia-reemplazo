<?php
$gestor = fopen("lista_interferencias.csv", "r");
$num = 0;
$origen = "Z:" . DIRECTORY_SEPARATOR . "CPCAN" . DIRECTORY_SEPARATOR . "global_assets" . DIRECTORY_SEPARATOR . "resource";
$destino = __DIR__ . DIRECTORY_SEPARATOR . "backup";
$nombre_zip = "_resource_content.zip";
if (!file_exists($destino)) mkdir($destino);
while (($fila = fgetcsv($gestor)) !== false) {
  if ($num > 0) {
    $id = $fila[0];
    $carpetas = str_split(str_pad($id, 9, "0", STR_PAD_LEFT), 3);
    $ruta = "";
    foreach ($carpetas as $carpeta) {
      $ruta .= DIRECTORY_SEPARATOR . $carpeta;
      if (!file_exists("$destino$ruta")) mkdir("$destino$ruta");
    }
    print "Copiando ZIP $num de 141\r";
    copy("$origen" . DIRECTORY_SEPARATOR . "$ruta" . DIRECTORY_SEPARATOR . "$nombre_zip", "$destino$ruta" . DIRECTORY_SEPARATOR . "$nombre_zip");
  }
  $num++;
}
fclose($gestor);
