<?php 
  $this->layout = 'autocomplete';
?>
<h1>AUTOCOMPLETE</h1>
<?php 
  echo $this->Form->create(null,array());
  echo $this->Form->input('name',
  	array('id' => 'autoc', 'value' => $product['q'])
  );
  echo $this->Form->end('Search');
?>
<input type="hidden" name="show" value="1">
<br>
<div id="results"></div>
<div id="showallbutton" style="display:none">
  <button type="button" id="showall">Show all</button>
</div>
<br>