<?php
echo gmdate('Y-m-d H:i:s');
/*
$texto = '
{
    "secciones": {
        "errorDeSistema": "Error de sistema",
        "desencriptado": "Desencriptado",
        "hardware": "Hardware",
        "aceleradorDeValores": "Acelerador de valores",
        "procesadorDeEmociones": "Procesador de emociones",
        "software": "Software",
        "agregadorLinguistico": "Agregador lingüístico",
        "generadorLexico": "Generador léxico",
        "cortafuegosOrtografico": "Cortafuegos ortográfico",
        "revisorGramatical": "Revisor gramatical",
        "programadorSintactico": "Programador sintáctico",
        "reconfiguracion": "Reconfiguración",
        "volver": "Volver",
        "traduccion": "Traducción"
    },
    "desencriptado": {
        "encabezado": "Prepárate para descodificar la escena a partir de un análisis completo de esta. Empieza observándola y anota tus primeras impresiones en la plantilla <a href=\"./docs/Analisis_de_la_escena.docx\" target=\"_blank\" title=\"Análisis de la escena\" aria-label=\"Analisis de la escena. Formato Office Word (Nueva ventana)\">Análisis de la escena</a>. Luego, con tu equipo:",
        "lista": [
            "Ordena las ideas que surjan empleando la plantilla <a href=\"./docs/Telarana.pdf\" target=\"_blank\" title=\"La telaraña\" aria-label=\"La telaraña. Formato PDF (Nueva ventana)\">La telaraña</a>.",
            "Descarga el documento <a href=\"./docs/Analisis_linguistico-comunicativo.pdf\" target=\"_blank\" title=\"Análisis lingüístico y comunicativo\" aria-label=\"Análisis lingüístico y comunicativo. Formato PDF (Nueva ventana)\">Análisis lingüístico y comunicativo</a> y utiliza sus plantillas:"
        ],
        "sublista": [
            "<em>El acto comunicativo</em>, para señalar cuáles son los elementos que lo componen.",
            "<em>Las funciones del lenguaje</em> y <em>Las modalidades textuales</em>, para profundizar en el análisis ",
            "<em>Las propiedades del texto</em>, para valorar el grado de adecuación, coherencia y cohesión del mismo.",
            "<em>Las propiedades del texto</em>, para concluir el análisis de la imagen."
        ],
        "cierre": "Para acabar, pon el foco en el contexto y relaciona la escena con el mundo que te rodea."
    },
    "aceleradorDeValores": {
        "encabezado": "Para hacer que tu dispositivo funcione de manera mucho más rápida y eficiente, utiliza el acelerador de valores y aprende a observar el mundo desde una perspectiva diferente. Para ello:",
        "lista1": "Identifica los valores tratados empleando la <a href=\"./docs/Escala_valores.pdf\" target=\"_blank\" title=\"Escala de valores\" aria-label=\"Escala de valores. Formato PDF (Nueva ventana)\">Escala de valores</a>.",
        "lista2": "Considera tus ideas, creencias o, simplemente, tu propia experiencia, y responde:",
        "lista4": "Traslada lo que has aprendido fuera del aula."
    },
    "procesadorDeEmociones": {
        "encabezado": "Para funcionar correctamente, tu dispositivo necesita un buen procesador de emociones. Para manejarlo, completa estas actividades:",
        "lista1": "Identifica emociones con ayuda de la <a href=\"./docs/Rueda_emociones.pdf\" target=\"_blank\" title=\"Rueda de las emociones\" aria-label=\"Rueda de las emociones. Formato PDF (Nueva ventana)\">Rueda de las emociones</a>.",
        "lista2": "Ten en cuenta tu experiencia y forma de ser y responde:",
        "lista5": "Traslada lo que has aprendido fuera del aula."
    },
    "agregadorLinguistico": {
        "encabezado": " Para ello, consulta el <a href=\"{enlaceCuaderno}\" target=\"_blank\" title=\"Cuaderno de aprendizaje\" aria-label=\"Cuaderno de aprendizaje (Nueva ventana)\">Cuaderno de aprendizaje</a> y sus recursos:",
        "profundiza": "Profundiza",
        "practica": "Practica",
        "consolida": "Consolida",
        "cierre": "Recuerda utilizar lo que aprendas sobre {elementos} en la reconstrucción de la escena."
    },
    "generadorLexico": {
        "encabezado": " Para ello, consulta el <a href=\"{enlaceCuaderno}\" target=\"_blank\" title=\"Cuaderno de aprendizaje\" aria-label=\"Cuaderno de aprendizaje (Nueva ventana)\">Cuaderno de aprendizaje</a> y sus recursos:",
        "profundiza": "Profundiza",
        "practica": "Practica",
        "consolida": "Consolida",
        "cierre": "Recuerda utilizar lo que aprendas sobre {elementos} en la reconstrucción de la escena."
    },
    "cortafuegosOrtografico": {
        "encabezado": "El cortafuegos va a evitar interferencias sin dejar pasar ni un solo error ortográfico. Configúralo correctamente si no quieres jugártela {accion}. Para ello, consulta el <a href=\"{enlaceCuaderno}\" target=\"_blank\" title=\"Cuaderno de aprendizaje\" aria-label=\"Cuaderno de aprendizaje (Nueva ventana)\">Cuaderno de aprendizaje</a> y sus recursos:",
        "profundiza": "Profundiza",
        "practica": "Practica",
        "consolida": "Consolida",
        "cierre": "Recuerda utilizar lo que aprendas sobre {elementos} en la reconstrucción de la escena."
    },
    "revisorGramatical": {
        "encabezado": " consultando el <a href=\"{enlaceCuaderno}\" target=\"_blank\" title=\"Cuaderno de aprendizaje\" aria-label=\"Cuaderno de aprendizaje (Nueva ventana)\">Cuaderno de aprendizaje</a> y sus recursos:",
        "profundiza": "Profundiza",
        "practica": "Practica",
        "consolida": "Consolida",
        "cierre": "Recuerda utilizar lo que aprendas sobre {elementos} en la reconstrucción de la escena."
    },
    "programadorSintactico": {
        "encabezado": " Para ello, consulta el <a href=\"{enlaceCuaderno}\" target=\"_blank\" title=\"Cuaderno de aprendizaje\" aria-label=\"Cuaderno de aprendizaje (Nueva ventana)\">Cuaderno de aprendizaje</a> y sus recursos:",
        "profundiza": "Profundiza",
        "practica": "Practica",
        "consolida": "Consolida",
        "cierre": "Recuerda utilizar lo que aprendas sobre {elementos} en la reconstrucción de la escena."
    },
    "reconfiguracion": {
        "encabezado": "Reconfigura la escena para darle la réplica a partir de {elemento1} que, además de aplicar tu creatividad, incorpores lo que sabes sobre:",
        "lista1": "Los valores y las emociones tratados a partir de la escena.",
        "parrafo": "Puedes utilizar el documento <a href=\"./docs/Produccion_valoracion_{documento}.pdf\" target=\"_blank\" title=\"Producción y valoración de {elemento2}\" aria-label=\"Producción y valoración de {elemento2}. Formato PDF (Nueva ventana)\">Producción y valoración de {elemento2}</a> como guía.",
        "cierre": "Al acabar, reflexiona sobre tu aprendizaje con la diana <a href=\"./docs/Autoevaluacion.xls\" target=\"_blank\" title=\"Autoevaluación\" aria-label=\"Autoevaluación. Formato Office Excel (Nueva ventana)\">Autoevaluación</a>. Luego, completa esta <a href=\"./docs/Coevaluacion_trabajo_en_equipo.docx\" target=\"_blank\" title=\"Coevaluación del trabajo en equipo\" aria-label=\"Coevaluación del trabajo en equipo. Formato Office Word (Nueva ventana)\">Coevaluación del trabajo en equipo</a>."
    }
}';
$listaAjustesTexto = [
  ['/<a\s[^>]*href=\\\\\"\.\/docs\/[^>]*>([^<]+)<\/a>/m', "<em>$1</em>"],
  ['/diana\s<em>Autoevaluación<\/em>/m', "<em>Diana de aprendizaje</em>"],
  ['/(Coevaluación\sdel\strabajo\sen\s)equipo/m', "$1grupo"],
  ['/(Para\sello,\s)[^>]+>[^>]+>[^"]+/m', "$1puedes utilizar los recursos que te proponga tu profesor o profesora. "],
  ['/(jugártela\s{accion}\.).+(",)/m', "$1$2\n        \"consulta\": \"Para ello, puedes utilizar los recursos que te proponga tu profesor o profesora.\","],
  ['/("encabezado":\s")\sconsultando\sel\s<a[^,]+/m', "$1. Para ello, puedes utilizar los recursos que te proponga tu profesor o profesora.\""],
  ['/("encabezado":\s"\sPara ello,\s)[^,]+/m', "$1puedes utilizar los recursos que te proponga tu profesor o profesora.\""],
];
foreach ($listaAjustesTexto as $ajuste) {
  $regex = $ajuste[0];
  $reemp = $ajuste[1];
  $texto = preg_replace($regex, $reemp, $texto, -1, $count);
  print "Se realizaron $count reemplazos" . PHP_EOL;
}
print $texto;
*/