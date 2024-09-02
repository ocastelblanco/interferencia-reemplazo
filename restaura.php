<?php
const ORIGEN = __DIR__ . DIRECTORY_SEPARATOR . "backup" . DIRECTORY_SEPARATOR;
const DESTINO = "Z:" . DIRECTORY_SEPARATOR . "CPCAN" . DIRECTORY_SEPARATOR . "global_assets" . DIRECTORY_SEPARATOR . "resource" . DIRECTORY_SEPARATOR;
//const DESTINO = __DIR__ . DIRECTORY_SEPARATOR . "salida" . DIRECTORY_SEPARATOR;
const NOMBRE_ZIP = "_resource_content.zip";

$dry = in_array("--dry", $argv);
$gestor = fopen("lista_interferencias.csv", "r");

debug("Este script restaurará todos los recursos Interferencia de unidades LM, únicamente.", -1);

$listaRecursos = [];
while (($fila = fgetcsv($gestor)) !== false) {
  $patronLM = '/\w{2}_.{2}_\d{2}_LM/s';
  if (preg_match($patronLM, $fila[3])) {
    $recurso = implode(" | ", $fila);
    $ruta = implode(DIRECTORY_SEPARATOR, str_split(str_pad($fila[0], 9, "0", STR_PAD_LEFT), 3));
    $from = ORIGEN . $ruta . DIRECTORY_SEPARATOR . NOMBRE_ZIP;
    $to = DESTINO . $ruta . DIRECTORY_SEPARATOR . NOMBRE_ZIP;
    $listaRecursos[] = [
      "from" => $from,
      "to" => $to,
      "recurso" => $recurso
    ];
  }
}
fclose($gestor);

debug("Se restaurarán " . count($listaRecursos) . " recursos.", -1);

$num = 0;

foreach ($listaRecursos as $recurso) {
  $num += restaura($recurso["from"], $recurso["to"], $recurso["recurso"]);
}

debug("Se restauraron $num recursos en total.", -1);

// Funciones
function restaura($from, $to, $recurso)
{
  global $dry;
  if (file_exists($from) && file_exists($to)) {
    debug("Se restaurá el recurso $recurso", 0);
    debug("De la ruta $from a la ruta $to", 1);
    if (!$dry) copy($from, $to);
    return 1;
  } else {
    debug("ERROR: No se pudo restaurar el recurso $recurso", 0);
    if (!file_exists($from)) debug("La ruta origen $from no existe en el sistema de archivos.", 1);
    if (!file_exists($to)) debug("La ruta destino $to no existe en el sistema de archivos.", 1);
    debug("Se continúa con el siguiente recurso.", 1);
    return 0;
  }
}
function debug($texto, $nivel)
{
  $fechaHora = new DateTime();
  $timestampISO = $fechaHora->format(DateTime::ATOM);
  $salida = $timestampISO . (($nivel < 0) ? " " : str_repeat(" ", $nivel) . " └─ ") . $texto . PHP_EOL;
  file_put_contents("debug_restauracion.txt", $salida, FILE_APPEND);
  if ($nivel < 4) print $salida;
}
