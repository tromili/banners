<?php
  $this->layout = 'none'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Grupo E&f</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="img/logo.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
      
    </style>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/s3Slider.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#slider1').s3Slider({
                timeOut: 4000 
            });
        });
    </script>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  </head>

  <body>

    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#main">Home</a></li>
          <li><a href="#">¿Quienes Somos?</a></li>
          <li><a href="#tablacontactanos">Contáctanos</a></li>
        </ul>
        <div class="logo"></div>
      </div>
      <div id="slider1">
            <ul id="slider1Content">
                <li class="slider1Image">
                    <a href=""><img src="img/banner_1.jpg" alt="banner" /></a>
                    <span class="bottom"><strong>Title text 1</strong><br />Content text...</span></li>
                <li class="slider1Image">
                    <a href=""><img src="img/banner_2.jpg" alt="banner" /></a>
                    <span class="bottom"><strong>Title text 2</strong><br />Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...Content text...</span></li>
                <li class="slider1Image">
                     <a href=""><img src="img/banner_3.jpg" alt="banner" /></a>
                    <span class="bottom"><strong>Title text 2</strong><br />Content text...</span></li>
                <li class="slider1Image">
                     <a href=""><img src="img/banner_4.jpg" alt="banner" /></a>
                    <span class="bottom"><strong>Title text 2</strong><br />Content text...</span></li>
                <div class="clear slider1Image"></div>
            </ul>
        </div>
      <hr>

      <div class="main">
        <h2>Bienvenidos</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et erat neque. Vivamus fringilla nec nisi eget dignissim. Phasellus vel eros ac urna tincidunt bibendum. Curabitur in nulla elit. Sed sollicitudin porttitor erat, et malesuada nunc. Nunc malesuada metus felis, id fringilla metus ullamcorper id. Sed pharetra quis dui ut consequat. Integer a dictum felis. Suspendisse viverra nisi nec posuere tincidunt. Quisque pharetra convallis viverra. Nulla commodo augue quis purus euismod, at fermentum ante ornare. Nam sed est non quam dapibus hendrerit. Donec id magna vitae tortor elementum vehicula sit amet non odio. Proin nulla dui, imperdiet at massa id, sollicitudin feugiat leo. Aliquam non metus euismod, venenatis ipsum quis, facilisis velit. </p>
      </div>
      <hr>
      <div class="search">
        <h2>Busqueda</h2>
      </div>
      <hr>
         <h2>Ultimas notiicas</h2>
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
      <hr>
      <table class="tablacontactanos">
        <tr>
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
                <form class="form-cont" onsubmit="return valida(this)">
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
    <script src="js/jquery.js"></script>
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
    <script src="js/valida.js"></script>

  </body>
</html>
