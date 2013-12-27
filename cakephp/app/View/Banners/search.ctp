<?php 
  $this->layout = 'autocomplete';
?>
<div class="search">
  <h2>Nuestros Banners</h2>
  <form id="SearchForm" method="post" action="/banners/cakephp/banners/search/">
    <div class="input-append span9">
      <input class="span8 ui-autocomplete-input" id="autoc" type="text" 
        value=<?php 
          if ($banner['q']) 
            echo "'".$banner['q']."'";
          else
            echo "'Todos'";
          ?> placeholder="¿Qué estas buscando?">
      <button class="btn btn-default" id="showall2" type="button">Buscar</button>
    </div>
    <div class="span9">
      <select name="options" id="searchOption" class="form-class input-lg">
        <option value="N">Nombre</option>
        <option value="M">Tamaño</option>
      </select>
      <b>|</b>
      <select name="order" id="order" class="form-class">
        <option value="A">Ascendente</option>
        <option value="D">Descendente</option>
      </select>
      <b>|</b>
      <select name="medida" id="measure" class="form-class">
        <option value="">Todas las medidas</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
      </select>
    </div>
  </form>
  <input type="hidden" name="show" value="1">
  <hr>
  <br>
  <div id="results"></div>
  <div id="showallbutton" style="display:none">
    <button type="button" id="showall" class="btn btn-large btn-block">Mostrar todos los resultados</button>
  </div>
  <br>
</div>
