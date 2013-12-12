<h2>
	<?=$title_for_layout;?>
	<div class="btn-group pull-right">
		<?=$this->Html->link(__('Back'), array('action' => 'index'), array('class' => 'btn btn-danger btn-sm'));?>
	</div>
</h2>
<div class="well">
	<?=$this->Form->create('Product');?>
		<?=$this->Form->input('name');?>
		<?=$this->Form->input('description');?>
		<?=$this->Form->input('code');?>
		<?=$this->Form->input('barcode');?>
		<?=$this->Form->input('quantity');?>
		<?=$this->Form->input('measurement', array('empty' => __('Please select an option:')));?>
		<?=$this->Form->input('price');?>
		<?=$this->Form->button(__('Save'), array('type' => 'submit', 'class' => 'btn btn-success'));?>
	<?=$this->Form->end();?>
</div>