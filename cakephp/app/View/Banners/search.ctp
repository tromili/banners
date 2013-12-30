<?php 
  $this->layout = 'autocomplete';
?>
<div class="search">
  <div class="row-fluid">
    <div class="span12">
    <h2>Nuestros Banners</h2>
    <form id="SearchForm" method="post" action="/banners/cakephp/banners/search/">
      <div class="input-append span12">
        <input class="span10 ui-autocomplete-input" id="autoc" type="text" 
          value=<?php 
            if ($banner['q']) 
              echo "'".$banner['q']."'";
            else
              echo "'Todos'";
            ?> placeholder="¿Qué estas buscando?">
        <button class="btn btn-default" id="showall2" type="button">Buscar</button>
      </div>
    </form>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="row-fluid">
        <div class="span4">
          <select name="options" id="searchOption" class="form-class">
            <option value="N">Nombre</option>
            <option value="M">Tamaño</option>
          </select>
        </div>
        <div class="span4">
          <select name="order" id="order" class="form-class">
            <option value="A">Orden: Ascendente</option>
            <option value="D">Orden: Descendente</option>
          </select>
        </div>
        <div class="span4">
          <select name="medida" id="measure" class="form-class">
            <option value="">Todos los tamaños</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="show" value="1">
  <hr>
  <br>
  <div id="results" class="row-fluid"></div>
  <div id="showallbutton" style="display:none">
    <button type="button" id="showall" class="btn btn-large btn-block">Mostrar todos los resultados</button>
  </div>
  <div class="pagination"></div>
</div>
