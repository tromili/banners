<?php 
  $this->layout = 'autocomplete';
?>
<div class="search">
  <h2>Nuestros Banners</h2>
  <div class="input-append span9">
      <input class="span8" id="autoc" type="text" 
        value=<?php echo "'".$banner['q']."'";?> placeholder="¿Qué estas buscando?">
      <button class="btn btn-default" type="button">Buscar</button>
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
    <select name="medida" id="order" class="form-class">
      <option value="">Todas las medidas</option>
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
      <option value="D">D</option>
      <option value="E">E</option>
    </select>
  </div>
  <input type="hidden" name="show" value="1">
  <hr>
  <br>
  <div id="results"></div>
  <div id="showallbutton" style="display:none">
    <button type="button" id="showall">Show all</button>
  </div>
  <br>
</div>
