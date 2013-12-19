<?php 
  $this->layout = 'autocomplete';
?>
<h1>AUTOCOMPLETE</h1>
<?php 
  echo $this->Form->create(null,array('id'=>'ProductSearchForm'));
  echo $this->Form->input('name',array('id'=>'autoc'));
  echo $this->Form->end('Search');
?>
<input type="hidden" name="show" value="0">