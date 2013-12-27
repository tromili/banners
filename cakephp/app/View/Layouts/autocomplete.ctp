<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Grupo E&f</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="img/logo.jpg" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
        echo $this->Html->css(array(
'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css',
'bootstrap.min',
'style')
                   );
        echo $this->Html->script(array(
'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',
'jquery-ui-1.10.3.custom.min',
'bootstrap.min',
'autocomplete.js')
                    );
    echo $this->fetch('script');
    echo $this->fetch('css');
    echo $this->fetch('js');
  ?>
  <style type="text/css">
    body {
      padding-top: 20px;
      padding-bottom: 40px;
      color: #fff;
    }

    /* Custom container */
    .container-narrow {
      margin: 0 auto;
      max-width: 700px;
    }
    .container-narrow > hr {
      margin: 30px 0;
    }
    #results {
      min-height: 350px;
    }
  </style>
</head>
<body>
  <div class="container-narrow">
    <div class="masthead">
      <ul class="nav nav-pills pull-right">
        <li class="active"><a href="#main">Home</a></li>
        <li><a href="/banners/cakephp/#inicio">¿Quienes Somos?</a></li>
        <li><a href="/banners/cakephp/#contact">Contáctanos</a></li>
      </ul>
      <div class="logo"></div>
    </div> 
    <?php echo $this->fetch('content'); ?>
    <hr>
    <div class="footer">
      <p>&copy; 2013 Grupo E&F.</p>
    </div> 
  </div>
</body>
</html>
