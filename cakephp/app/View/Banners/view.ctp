<div class="banners view">
<h2><?php echo __('Banner'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Measure'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['measure']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['photo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Photo Dir'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['photo_dir']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Banner'), array('action' => 'edit', $banner['Banner']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Banner'), array('action' => 'delete', $banner['Banner']['id']), null, __('Are you sure you want to delete # %s?', $banner['Banner']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner'), array('action' => 'add')); ?> </li>
	</ul>
</div>
