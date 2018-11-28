<?php
// source: D:\www\aaa\app\presenters/templates/List/default.latte

use Latte\Runtime as LR;

class Templateb76af6044d extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['row'])) trigger_error('Variable $row overwritten in foreach on line 9');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">
    <div class="card bg-dark text-white">
        <div class="card-header card-header-title text-center align-middle" id="heading">
            <p>Seznam Stezek</p>
        </div>
    </div>
<div class="accordion" id="accordion">
<?php
		$iterations = 0;
		foreach ($data as $row) {
?>
    <div class="card">
<?php
			if ($row['author'] == $user->getIdentity()->username) {
				?>        <div class="card-header bg-own" id="heading<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 12 */ ?>">
<?php
			}
			else {
				?>        <div class="card-header" id="heading<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 14 */ ?>">
<?php
			}
?>
            <p class="card-title text-left">
            <strong class="leftText"><?php echo LR\Filters::escapeHtmlText($row['title']) /* line 17 */ ?></strong> <strong>|</strong> <em class="card-subtitle mb-2 text-muted"><?php
			echo LR\Filters::escapeHtmlText($row['author']) /* line 17 */ ?></em> <strong>|</strong> 
            <small class="text-muted">
<?php
			$this->global->switch[] = ($row['published']);
			if (FALSE) {
			}
			elseif (end($this->global->switch) === ('yes')) {
?>
                        Zveřejněno
<?php
			}
			elseif (end($this->global->switch) === ('no')) {
?>
                        Nezveřejněno
<?php
			}
			elseif (end($this->global->switch) === ('wip')) {
?>
                        Rozpracované
<?php
			}
			array_pop($this->global->switch) ?>
            </small>  
                <span class="btn-group right" role="group" aria-label="Basic example">
<?php
			if ($user->isInRole('admin')) {
?>
                        <button class="btn btn-dark" href="#"><i class="fas fa-qrcode"></i> QR</button>
<?php
			}
			if ($user->isInRole('admin') || ($user->isInRole('editor') && $row['author'] == $user->getIdentity()->username)) {
?>
                        <button class="btn btn-warning" href="#"><i class="fas fa-pen"></i> Upravit</button>
<?php
			}
			?>                    <button class="btn btn-primary" data-toggle="collapse" data-target="#collapse<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 35 */ ?>" aria-expanded="true" aria-controls="collapse<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 35 */ ?>"><i class="fas fa-chevron-down"></i> Více</button>  
                </span>    
<?php
			if (($row['published'] == 'no' && $user->isInRole('admin'))) {
?>
                    <button class="btn btn-success right" href="#"><i class="fas fa-check"></i> Zveřejnit</button>
<?php
			}
			elseif (($row['published'] == 'yes' && $user->isInRole('admin'))) {
?>
                    <button class="btn btn-danger right" href="#"><i class="fas fa-times"></i> Stáhnout</button>
<?php
			}
			elseif (($row['published'] == 'wip' && $row['author'] == $user->getIdentity()->username)) {
?>
                    <button class="btn btn-secondary right"><i class="fas fa-flag-checkered"></i> Dokončit</button> 
<?php
			}
			if ($row['author'] != $user->getIdentity()->username && !$user->isInRole('admin')) {
?>
                    <i class="rightText">Nejste autorem této stezky, nemůžete provádět úpravy.</i>
<?php
			}
?>
            </p> 
        </div>
        <div id="collapse<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 49 */ ?>" class="collapse card-body" aria-labelledby="heading<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 49 */ ?>" data-parent="#accordion">
            <p>Duis duis duis tempor et elit eiusmod irure do eu minim sint. Id aliqua nostrud et eu excepteur ad dolore commodo incididunt aliqua commodo id non. Exercitation voluptate laborum elit commodo mollit pariatur. Ad aliquip excepteur voluptate laboris excepteur. Aliquip in mollit ipsum excepteur. Qui ad ad veniam mollit consequat incididunt non id laborum fugiat consectetur officia proident.</p>
        </div>
    </div>
<?php
			$iterations++;
		}
?>
</div>
</div>
<?php
	}

}
