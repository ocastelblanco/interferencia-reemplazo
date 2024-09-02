<?php
$num = 0;
$origen = __DIR__ . DIRECTORY_SEPARATOR . "backup" . DIRECTORY_SEPARATOR;
$destino = "Z:" . DIRECTORY_SEPARATOR . "CPCAN" . DIRECTORY_SEPARATOR . "global_assets" . DIRECTORY_SEPARATOR . "resource" . DIRECTORY_SEPARATOR;
//$destino = __DIR__ . DIRECTORY_SEPARATOR . "salida" . DIRECTORY_SEPARATOR;
$nombre_zip = "_resource_content.zip";
$modelo = __DIR__ . DIRECTORY_SEPARATOR . "modelo";
$gestor = fopen("lista_interferencias.csv", "r");
$zip = new ZipArchive;
$listaBorrar = [
  ["docs/", true],
  ["js", false],
  ["html", false],
  ["css", false],
  ["ico", false],
];
$listaAjustesTexto = [
  ['/<a\s[^>]*href=\\\\\"\.\/docs\/[^>]*>([^<]+)<\/a>/m', "<em>$1</em>"],
  ['/diana\s<em>Autoevaluación<\/em>/m', "<em>Diana de aprendizaje</em>"],
  ['/(Coevaluación\sdel\strabajo\sen\s)equipo/m', "$1grupo"],
  ['/(Para\sello,\s)[^>]+>[^>]+>[^"]+/m', "$1puedes utilizar los recursos que te proponga tu profesor o profesora. "],
  ['/(jugártela\s{accion}\.).+(",)/m', "$1$2\n        \"consulta\": \"Para ello, puedes utilizar los recursos que te proponga tu profesor o profesora.\","],
  ['/("encabezado":\s")\sconsultando\sel\s<a[^,]+/m', "$1. Para ello, puedes utilizar los recursos que te proponga tu profesor o profesora.\""],
  ['/("encabezado":\s"\sPara ello,\s)[^,]+/m', "$1puedes utilizar los recursos que te proponga tu profesor o profesora.\""],
];
while (($fila = fgetcsv($gestor)) !== false) {
  if ($num > 0) {
    $id = $fila[0];
    $carpetas = str_split(str_pad($id, 9, "0", STR_PAD_LEFT), 3);
    $ruta = implode(DIRECTORY_SEPARATOR, $carpetas);
    $rutaCompleta = $destino . $ruta . DIRECTORY_SEPARATOR . $nombre_zip;
    //if ($carpetas[1] == "053" && $carpetas[2] == "872") { // Solo para pruebas ------------------
    print str_pad("", 100, "*") . PHP_EOL;
    pl("Se inicia el ajuste del recurso " . $fila[2] . " en la ruta $ruta");
    pl();
    if ($res = $zip->open($rutaCompleta) === true) {
      pl("Se abre el ZIP correctamente.");
      pl("El ZIP tiene " . $zip->numFiles . " archivos.");
      pl();
      $numAjuste = 1;
      foreach ($listaBorrar as $tipo) {
        pl("Ajuste $numAjuste: eliminar " . ($tipo[1] ? "carpeta " . $tipo[0] : "archivos " . strtoupper($tipo[0]) . "."));
        $borraDocs = delFile($tipo[0], $zip, $tipo[1]);
        if ($borraDocs) pl("- Se eliminaron correctamente $borraDocs archivos.");
        else pl("- Error al eliminar " . ($tipo[1] ? "la carpeta." : "los archivos."));
        pl();
        $numAjuste++;
      }
      $aMeter = getArchivosIntro($modelo);
      if (count($aMeter)) {
        pl("Ajuste $numAjuste: incluir archivos actualizados.");
        foreach ($aMeter as $archivo) introArchivos($archivo, $zip);
        $numAjuste++;
      }
      pl("Ajuste $numAjuste: corregir interfaz.json.");
      $interfaz = $zip->getFromName("data/interfaz.json");
      $nuevaInterfaz = reemplazaTextos($interfaz, $listaAjustesTexto);
      if ($zip->addFromString("data/interfaz.json", $nuevaInterfaz)) {
        pl("- Archivo ajustado correctamente");
      } else {
        pl("- Errores al ajustar el archivo");
      }
      pl();
      pl("Todos los ajustes han sido realizados al recurso.");
      pl();
    } else {
      pl("Error al abrir el ZIP");
    }
    print str_pad("", 100, "*") . PHP_EOL;
    //} // ----------------------------------------------------------------------------------------
  }
  $num++;
}
$zip->close();
fclose($gestor);
/*     */
function pl($texto = " ")
{
  print "** " . str_pad($texto, 94) . " **" . PHP_EOL;
  if (strlen($texto) > 2) file_put_contents("log_interferencia.txt", gmdate('Y-m-d H:i:s') . " :: $texto\n", FILE_APPEND);
}
function delFile($ruta, $zip, $isDir)
{
  $numBorrados = 0;
  $aBorrar = array();
  for ($i = 0; $i < $zip->numFiles; $i++) {
    $stat = $zip->statIndex($i);
    if ($stat === false) continue;
    $nombre = $stat['name'];
    $cond = $isDir ? (strpos($nombre, $ruta) === 0) : strtolower(substr($nombre, strlen($nombre) - strlen($ruta))) == strtolower($ruta);
    if ($cond) array_push($aBorrar, $nombre);
  }
  foreach ($aBorrar as $nombre) {
    pl(" -- Eliminando $nombre");
    $zip->deleteName($nombre);
    $numBorrados++;
  }
  return $numBorrados;
}
function introArchivos($ruta, $zip)
{
  $nombre = basename($ruta);
  if ($zip->addFile($ruta, $nombre)) {
    pl(" -- Incluyendo $nombre correctamente.");
    return true;
  } else {
    pl(" -- Error incluyendo $nombre.");
    return false;
  }
}
function getArchivosIntro($carpeta, $extensiones = ['js', 'html', 'css', 'ico'])
{
  $archivos = array();
  if (!is_dir($carpeta)) return $archivos;
  $iterador = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($carpeta));
  foreach ($iterador as $archivo) {
    if ($archivo->isFile()) {
      $extension = strtolower($archivo->getExtension());
      if (in_array($extension, $extensiones)) array_push($archivos, $archivo->getPathname());
    }
  }
  return $archivos;
}
function reemplazaTextos($texto, $lista)
{
  foreach ($lista as $ajuste) {
    $patron = $ajuste[0];
    $reemplazo = $ajuste[1];
    $texto = preg_replace($patron, $reemplazo, $texto, -1, $count);
    pl(" -- Se hicieron $count reemplazos de cadena en el texto, " . (strlen($texto) > 10 ? "sin" : "con") . " errores.");
  }
  return $texto;
}
