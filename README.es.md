Marbete-i18n
=============

Ejemplo de uso de [marbete](https://github.com/eamexicano/marbete) para visualizar etiquetas y contenido
corto en diferentes idiomas.   

El uso está destinado para sitios web cuyo contenido es breve, su tiempo de vida corto - promociones, lanzamientos -    
y / o que por cualquier razón no pueden utilizar herramientas más completas para administrar el contenido y / o las traducciones.

Algunas diferencias de uso entre marbete y marbete i18n.   

1. En este caso el nombre de los archivos con las traducciones va a tener el código del idioma - [iso639-1](http://www.loc.gov/standards/iso639-2/php/code_list.php) -  antes de la extensión php.
2. En el archivo index.php - donde se administra el contenido - es necesario incluir vínculos - hacia el mismo archivo - con los idiomas en los cuales están los documentos
   para que se pueda editar el contenido del archivo del idioma seleccionado.   
   El valor del atributo href es el parámetro locale con el código del idioma cuyo contenido se va a editar.   
&lt;a href="?locale=<u><em>##</em></u>"&gt;<u><em>Nombre</em></u>&lt;/a&gt;&lt;br&gt;   
<u><em>\#\#</em></u>: Código iso639-1   
<u><em>Nombre</em></u>: Nombre del idioma   
Ej.    
&lt;a href="?locale=es"&gt;Español&lt;/a&gt;   
&lt;a href="?locale=en"&gt;English&lt;/a&gt;   
3. En los archivos del contenido es necesario incluir la región donde se utiliza el idioma. 
   Esto lo declaras en un arreglo llamado 'doclanguage'. Este valor se va a utilizar como valor del atributo lang de la etiqueta html.   
   La región se puede buscar en [https://www.iso.org/obp/ui/#search](https://www.iso.org/obp/ui/#search).   
    "doclanguage" => array(   
      "name" => "es-MX"    
    ),   
   
Si quieres utilizarlo para un sitio web personal que utiliza otro lenguaje de programación del lado del servidor o no utilizas lenguaje de programación en el servidor puedes 
revisar [lepet.js](https://github.com/eamexicano/lepet.js).