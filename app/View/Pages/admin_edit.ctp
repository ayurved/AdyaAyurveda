<h2>
	<?=$title_for_layout;?>
	<div class="btn-group pull-right">
		<?=$this->Html->link(__('Back'), array('action' => 'index'), array('class' => 'btn btn-danger btn-sm'));?>
	</div>
</h2>
<div class="well">
	<?=$this->Form->create('Page');?>
		<?
			if (!empty($parentPageId)) {
				echo $this->Form->hidden('parent_page_id', array('value' => $parentPageId));
			}
		?>
		<?=$this->Form->hidden('id');?>
		<?=$this->Form->input('label');?>
		<?=$this->Form->input('title');?>
		<?
			$url = 'http://www.adya-ayurveda.com';
			echo $this->Form->input('url', array('required' => 'required', 'between' => '<div class="controls"><div class="input-prepend"><span class="add-on">'.$url.'</span>', 'after' => '</div></div>', 'div' => array('class' => 'control-group'), 'class' => 'span4', 'label' => array('class' => 'control-label', 'text' => __('URL'))));
		?>
		<?=$this->Form->input('content');?>
		<?=$this->Form->input('position');?>
		<?=$this->Form->input('seo_priority', array('selected' => $page['Page']['seo_priority'], 'options' => array('0.80' => 'High', '0.64' => 'Medium', '0.51' => 'Low')));?>
		<?=$this->Form->input('meta_keywords');?>
		<?=$this->Form->input('meta_description');?>
		<?/* =$this->Form->input('url'); */?>
		<?=$this->Form->button(__('Save'), array('type' => 'submit', 'class' => 'btn btn-success'));?>
	<?=$this->Form->end();?>
</div>