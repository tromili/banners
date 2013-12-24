<div class="banners form">
<?php echo $this->Form->create('Banner'); ?>
  <fieldset>
    <legend>
      <?php echo __('Admin Add Banner', array('type' => 'file')); ?>
    </legend>
  <?php
    echo $this->Form->input('name');
    echo $this->Form->input('description');
    echo $this->Form->input('measure');
    echo $this->Form->input('photo', array('type' => 'file'));
    echo $this->Form->input('photo_dir', array('type' => 'hidden'));
  ?>
  </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
  <h3><?php echo __('Actions'); ?></h3>
  <ul>

    <li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index')); ?></li>
  </ul>
</div>
