<div class="well">
	<h3><?=$disease['Disease']['disease'];?></h3>
	<br />
	<p class="alert alert-info"><?=$disease['Disease']['description'];?></p>
	<br />
	<ul class="nav nav-tabs" id="myTab">
		<?php foreach ($disease['KnowledgeBaseArticle'] as $index => $knowledgeBaseArticle): ?>
			<? $activeLinkClass=($index == 0) ? 'class="active"': '';?>
			<li <?=$activeLinkClass;?>>
				<a href="<?='#'.Sanitize::paranoid(strtolower($knowledgeBaseArticle['Modality']['modality']));?>" data-toggle="tab">
					<?=$knowledgeBaseArticle['Modality']['modality'];?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	
	<div id="myTabContent" class="tab-content">
		<?php foreach ($disease['KnowledgeBaseArticle'] as $index => $knowledgeBaseArticle): ?>
			<? $tabClass=($index == 0) ? 'active in': 'fade'; ?>
			<div class="tab-pane <?=$tabClass;?> bgrnd-white" id="<?=Sanitize::paranoid(strtolower($knowledgeBaseArticle['Modality']['modality']));?>">
				<p><?=$knowledgeBaseArticle['content'];?></p>
			</div>
		<? endforeach; ?>
	</div>
	<? /* foreach($disease['KnowledgeBaseArticle'] as ): ?>
	
	<? endforeach; */ ?>
</div>