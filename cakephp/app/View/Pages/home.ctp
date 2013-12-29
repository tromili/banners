<?php
  $this->layout = 'none'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Grupo E&f</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="img/logo.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/s3Slider.js"></script>
    <script type="text/javascript" src="js/scroll.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#slider1').s3Slider({
            timeOut: 4000 
        });
      });
    </script>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" rel="stylesheet">


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  </head>

  <body>

    <div id="home" class="container-narrow">

      <div class="masthead">
        <div id="menu-contenedor">
          <ul id="menu" class="nav nav-pills pull-right">
            <li><a href="#home">Home</a></li>
            <li><a href="#inicio">Conócenos</a></li>
            <li><a href="#contact">Contáctanos</a></li>
          </ul>
        </div>
        <div class="logo"></div>
      </div>
      <div id="slider1">
            <ul id="slider1Content">
                <li class="slider1Image">
                    <img src="img/banner_1.jpg" alt="banner" />
                    <span class="bottom"><strong>Title text 1</strong><br />Content text...</span></li>
                <li class="slider1Image">
                    <img src="img/banner_2.jpg" alt="banner" />
                    <span class="bottom"><strong>Title text 2</strong><br />Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...</span></li>
                <li class="slider1Image">
                     <img src="img/banner_3.jpg" alt="banner" />
                    <span class="bottom"><strong>Title text 2</strong><br />Content text...</span></li>
                <li class="slider1Image">
                     <img src="img/banner_4.jpg" alt="banner" />
                    <span class="bottom"><strong>Title text 2</strong><br />Content text...</span></li>
                <div class="clear slider1Image"></div>
            </ul>
        </div>
      <hr>
      <div id="inicio"></div>
      <div class="main" >
        <h2>Bienvenidos</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et erat neque. Vivamus fringilla nec nisi eget dignissim. Phasellus vel eros ac urna tincidunt bibendum. Curabitur in nulla elit. Sed sollicitudin porttitor erat, et malesuada nunc. Nunc malesuada metus felis, id fringilla metus ullamcorper id. Sed pharetra quis dui ut consequat. Integer a dictum felis. Suspendisse viverra nisi nec posuere tincidunt. Quisque pharetra convallis viverra. Nulla commodo augue quis purus euismod, at fermentum ante ornare. Nam sed est non quam dapibus hendrerit. Donec id magna vitae tortor elementum vehicula sit amet non odio. Proin nulla dui, imperdiet at massa id, sollicitudin feugiat leo. Aliquam non metus euismod, venenatis ipsum quis, facilisis velit. </p>
      </div>
      <div class="search">
        <h2>Nuestros Banners</h2>
        <form id="SearchForm" method="post" action="/banners/cakephp/banners/search/">
        <div class="input-append">
          <input class="span6 ui-autocomplete-input" id="autoc" 
            type="text" placeholder="¿Qué estas buscando?">
          <button class="btn btn-default" id="showall" type="button">Buscar</button>
        </div>
        <input type="hidden" name="show" value="0"> 
        </form>
        <div class="row-fluid marketing">
          <div class="span6">
            <h4>Banner Destacado 1</h4>
            <img src="http://premium.wpmudev.org/blog/wp-content/uploads/2012/09/wordpress-banner-billboard-big.jpg"
              class="img-rounded">
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </div>
          <div class="span6">
            <h4>Banner Destacado 2</h4>
            <img src="http://premium.wpmudev.org/blog/wp-content/uploads/2012/09/wordpress-banner-billboard-big.jpg"
              class="img-rounded">
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          </div>
        </div>
        <a href="banners/search/Todos">
          <button type="button" class="btn btn-default btn-lg btn-block">Vea Todos Nuestros Banners</button>
        </a>
        <br>
      </div>
      <br>
      <hr>
      <div class="noticias">
        <h2>Ultimas noticias</h2>
        <div class="row-fluid marketing">

          <div class="span6">
            <h4>Subheading</h4>
            <h5>12/03/13</h5>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

            <h4>Subheading</h4>
            <h5>12/03/14</h5>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

            <h4>Subheading</h4>
            <h5>12/03/15</h5>
            <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
          </div>

          <div class="span6">
            <h4>Subheading</h4>
            <h5>12/03/13</h5>
            <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

            <h4>Subheading</h4>
            <h5>12/03/13</h5>
            <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

            <h4>Subheading</h4>
            <h5>12/03/13</h5>
            <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
          </div>
        </div>
      </div>
      <hr>
      <table  class="tablacontactanos">
        <tr id="contact">
          <td>
            <h2>Contáctanos</h2>
          </td>
          <td>
            <h2>Escríbenos</h2>
          </td> 
        </tr>
        <tr>
          <td>
            
            <table >
              <tr>
                <td><span class="direccion">
                  Av. Quiñones 122 <br>Alto Selva Algue
                </span></td> 
              </tr>
              <tr>
                <td><span class="telefono">
                  (054) 200000  (511)991566865<br> (054) 12323
                </span></td> 
              </tr>
              <tr>
                <td><span class="email">
                  grupoef@gmail.com
                </span></td> 
              </tr>
              <tr>
                <td><span class="atencion">
                  Lunes a Sábado <br> 9:00am. a 8:30pm.
                </span></td> 
              </tr>
            </table>
          </td>
          <td>
                <form class="form-cont" onsubmit="return valida(this)" action="enviar.php" method="POST">
                  <fieldset>
                  
                  <input id="nombre" name="nombre" type="text" placeholder="Nombre...">
        
                  <input id="correo" name="correo" type="text" placeholder="Correo electrónico...">
                  
                  <input id="fono" name="fono" type="text" placeholder="Teléfono...">
                  
                  <textarea id="asunto" name="asunto" rows="3" placeholder="Asunto"></textarea>
                  <label class="checkbox">
                  </label>
                  <button id="enviar" name="enviar" type="submit" class="send">Enviar</button>
                  </fieldset>
                </form>
          </td>
        </tr>
      </table>
      <hr>

      <div class="footer">
        <p>&copy; 2013 Grupo E&F.</p>
      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- NO LOS ESTA CARGANDO
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    -->
    <script src="js/valida.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="js/autocomplete.js"></script>


  </body>
</html>
