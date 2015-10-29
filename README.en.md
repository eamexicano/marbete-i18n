Marbete-i18n
=============

Example of [marbete](https://github.com/eamexicano/marbete)'s use  to visualize tags and small content in different languages.

It is intended for small websites whose content is short, its life span is short - promotions, launches - and / or that for any other reason cannot use more complete tools to manage the content and / or translations.   

Some differences between the usage of marbete and marbete-i18n.

1. In this case the name of the translation files will have the code of the language - [iso639-1](http://www.loc.gov/standards/iso639-2/php/code_list.php) - before the file extension php.
2. In the file index.php - where the content is managed - you need to include links - to the same file - with the languages you want to use in your translations,  
   so the content can be edited in the intended language.    
   The value of the href attribute is locale parameter with the language code whose content will be edited.   
&lt;a href="?locale=<u><em>##</em></u>"&gt;<u><em>Name</em></u>&lt;/a&gt;&lt;br&gt;   
<u><em>\#\#</em></u>: iso639-1 code   
<u><em>Name</em></u>: Language Name
Ej.    
&lt;a href="?locale=es"&gt;Español&lt;/a&gt;   
&lt;a href="?locale=en"&gt;English&lt;/a&gt;   
3. In the content files, it is necessary to include the region where the language is used.   
   You declare this in an array named "doclanguage". This value will be used in the lang atribute of the HTML tag.   
   You can search the region in [https://www.iso.org/obp/ui/#search](https://www.iso.org/obp/ui/#search)   
    "doclanguage" => array(   
      "name" => "en-US"    
    ),   
   
If you want to use it for a website that uses another server side programming language or you don't use a server side programming language you can try [lepet.js](https://github.com/eamexicano/lepet.js).