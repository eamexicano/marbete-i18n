  <?php
  
      /*
        Si se quiere trabajar con caracteres Unicode
      */
        mb_internal_encoding('UTF-8');
        mb_http_output('UTF-8');
        mb_http_input('UTF-8');
        mb_language('uni');
        mb_regex_encoding('UTF-8');
        ob_start('mb_output_handler');
        /*
          Si se quiere trabajar con caracteres Unicode
        */
          
    if (isset($_POST['actualizar'])) {
      
        if (isset($_POST['locale'])) {
          $locale = $_POST['locale'];
        } else {
          $locale = 'es';
        }
      
        unset($_POST['actualizar']);

        $data = $_POST;
      
        $content = "<?php\n\n";
        $content .= "\$tag = array(\n\n";

        foreach ($data as $key => $value) {
          $content .= "\t\"$key\" => array(\n";
          foreach ($value as $k => $v) {        
            $content .=  "\t\t\"$k\" => \"$v\",\n";
          }
          $fix = rtrim($content, ",\n");
          $content = $fix . "\n";
          $content .= "\t),\n\n";
        }

        $fix = rtrim($content, ",\n\n");
        $content = $fix . "\n\n";
        $content .= ")";
        $content .= "\n?>";
      
        $filename = "lib/tags." . $locale . ".php";
        $archivo = fopen($filename, 'w') or die('No se pudo crear el archivo lib/tags.php');
        fwrite($archivo, $content);
        fclose($archivo);
        
    } 

    if (isset($_GET['locale']) || isset($locale)) {          
      if (file_exists('lib/tags.' . $_GET['locale'] . '.php')) {
        require_once 'lib/tags.' . $_GET['locale'] . '.php';
        $locale = $_GET['locale'];
      } else if (file_exists('lib/tags.' . $locale . '.php')) {
        require_once 'lib/tags.' . $locale . '.php';
      } else {
        require_once 'lib/tags.es.php';      
        $locale = "es";
      }    
    } else {
      require_once 'lib/tags.es.php';
        $locale = "es";      
    }

?>
<!DOCTYPE html>
<html lang="<?php echo $tag['doclanguage']['name']; ?>">
	<head>
    <meta charset='utf-8'>
    <meta name=viewport content="width=device-width, initial-scale=1">    
    <title><?php echo $tag['document']['title']; ?></title>
    <style>
        html {
          width: 100%;
          height: 100%;
          background: white;
          font-family: 'Helvetica Neue', 'Helvetica', sans-serif;
          line-height: 1.44;
          color: #151515;
        }
    
        body {
          margin: 0 auto;
          width: 640px;        
          padding: 16px;
        }
    
        label {
          display: block;
          margin: 8px 0;
          font-weight: bold;
        }
    
        textarea {
          display: block;
          width: 100%;
          border-radius: 2px;
          border: 1px solid #c0c0c0;
          font-size: 16px;
          padding: 8px 0;
        }
    
        .existente {
          display: block;
          margin: 8px 0;
          color: #454545;      
        }
    
        footer {
          text-align: right;
        }
    
        input[type='submit'] {
          display: block;
          margin: 32px auto;
          padding: 8px 16px;
          font-size: 16px;
          border-radius: 2px;
          background: #f2f2f2;
          border: 1px solid #c0c0c0;
        }
    </style>
	</head>
	<body>
		<header class='header'>      
      <?php echo $tag['document']['header']; ?>
		</header>

		<main class='content'>
      
      <b><?php echo $tag['document']['choose']; ?></b>: <a href='?locale=es'>Español</a> <a href='?locale=en'>English</a><br>        
      
      <div class='container'>            
        <?php echo $tag['page']['copy']; ?>
        <hr>
      <form action='index.php' method='post' onsubmit='return validar();' >
        <input type='hidden' name='locale' value="<?php echo $locale; ?>">
        <?php    
        foreach ($tag as $key => $value) {
          echo "<h2>" . $key . "</h2>";
          foreach ($value as $k => $v) {
            echo "<label>" . $k . "</label>" ;
            echo "<div class='existente'>" . htmlentities(stripslashes($v)) . "</div>";
            echo "<textarea name='" . $key . "[" . $k . "]'>" . htmlentities(stripslashes($v)) . "</textarea>";
          }
        }    
        ?>
      	<input type='submit' value='<?php echo $tag["page"]["actualizar_etiqueta"]; ?>' name='actualizar' />
      </form>
      <p>
        <b><?php echo $tag['document']['go_to']; ?></b>: <a href='app.php?locale=es'>app.php en Español</a> <a href='app.php?locale=en'>app.php in English</a><br>        
      </p>
      <script>
      function validar() {
        return confirm("<?php echo $tag['javascript']['confirm']; ?>");
      }    
      </script>
      </div>
      </main>

			<footer class='footer'>
				<p>
          <br>
          <?php echo $tag['document']['footer']; ?>
          <br>
				</p>
			</footer>
	</body>
</html>