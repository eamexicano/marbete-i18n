<?php  
  if (isset($_GET['locale'])) {    
    if (file_exists('lib/tags.' . $_GET['locale'] . '.php')) {
      require_once 'lib/tags.' . $_GET['locale'] . '.php';
    } else {
      require_once 'lib/tags.es.php';      
    }    
  } else {
    require_once 'lib/tags.es.php';
  }  
?>
<html lang="<?php echo $tag['doclanguage']['name']; ?>">
  <head>
    <meta charset='utf-8'>
    <title><?php echo $tag['document']['title']; ?></title>
  </head>
  <body>
    
    <header>
      <?php echo $tag['document']['header']; ?>      
    </header>
    
    <main>       
      <b><?php echo $tag['document']['choose']; ?></b>: <a href='?locale=es'>Español</a> <a href='?locale=en'>English</a><br>               
      <div class='container'>            
        <?php echo $tag['page']['copy']; ?>
        <hr>
        <p>
          <b><?php echo $tag['document']['go_to']; ?></b>: <a href='index.php?locale=es'>index.php en Español</a> <a href='index.php?locale=en'>index.php in English</a><br>        
        </p>
        
      </div>
    </main>
    
    <footer>
      <?php echo $tag['document']['footer']; ?>
    </footer>
  </body>
</html>
