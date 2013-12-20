<?php 
  $this->layout = 'autocomplete';
?>
<h1>AUTOCOMPLETE</h1>
<?php 
  echo $this->Form->create(null,array());
  echo $this->Form->input('name',
  	array('id' => 'autoc', 'value' => $product['q'])
  );
?>
<select name="options" id="searchOption">
  <option value="N">name</option>
  <option value="P">price</option>
</select>
<span>
  <input type="radio" name="order" id="OrderA" value="A" checked="" />
  <label for="OrderA">Asc</label>
  <input type="radio" name="order" id="OrderD" value="D" />
  <label for="OrderD">Desc</label>
</span>
<?php
  echo $this->Form->end('Search');
?>
<input type="hidden" name="show" value="1">
<br>
<div id="results"></div>
<div id="showallbutton" style="display:none">
  <button type="button" id="showall">Show all</button>
</div>
<br>