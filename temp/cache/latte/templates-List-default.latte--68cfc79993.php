<?php
// source: E:\SchoolProject\android-project-server\app\presenters/templates/List/default.latte

use Latte\Runtime as LR;

class Template68cfc79993 extends Latte\Runtime\Template
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
		if (isset($this->params['row'])) trigger_error('Variable $row overwritten in foreach on line 30');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">
    <div class="card bg-dark text-white">
        <div class="card-header text-center" id="heading">
            <a class="btn btn-dark" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                LEGENDA
            </a>
        </div>
        <div id="collapse" class="collapse card-body" aria-labelledby="heading" data-parent="#accordion">
            <p>
                <strong class="leftText">Název</strong> <strong>|</strong> <em class="card-subtitle mb-2 text-muted">Autor</em>
            </p>
<?php
		if ($user->isInRole('admin')) {
?>
            <p>
                <strong>Zveřejnit</strong> <a class="btn btn-success right disabled" href="#"><i class="fas fa-check"></i></a>
            </p>
            <p>
                <strong>Stáhnout</strong> <a class="btn btn-danger right disabled" href="#"><i class="fas fa-times"></i></a>
            </p>
<?php
		}
?>
            <p>
                <strong>Upravit</strong> <a class="btn btn-warning right disabled" href="#"><i class="fas fa-pen"></i></a>
            </p>
            <p>
                <strong>Zobrazit Body na Stezce</strong> <a class="btn btn-primary right disabled" href="#"><i class="fas fa-chevron-down"></i></a>
            </p>
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
				?>        <div class="card-header bg-info" id="heading<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 33 */ ?>">
<?php
			}
			else {
				?>        <div class="card-header" id="heading<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 35 */ ?>">
<?php
			}
?>
            <p class="card-title text-left">
            <strong class="leftText"><?php echo LR\Filters::escapeHtmlText($row['title']) /* line 38 */ ?></strong> <strong>|</strong> <em class="card-subtitle mb-2 text-muted"><?php
			echo LR\Filters::escapeHtmlText($row['author']) /* line 38 */ ?></em>
                <a class="btn btn-primary right" data-toggle="collapse" data-target="#collapse<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 39 */ ?>" aria-expanded="true" aria-controls="collapse<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 39 */ ?>"><i class="fas fa-chevron-down"></i></a>
<?php
			if ($user->isInRole('admin') || ($user->isInRole('editor') && $row['author'] ==
			$user->getIdentity()->username)) {
?>
                    <a class="btn btn-warning right" href="#"><i class="fas fa-pen"></i></a>
<?php
			}
			if ($user->isInRole('admin')) {
				if ($row['published'] == 'no') {
?>
                    <a class="btn btn-success right" href="#"><i class="fas fa-check"></i></a>
<?php
				}
				elseif ($row['published'] == 'yes') {
?>
                    <a class="btn btn-danger right" href="#"><i class="fas fa-times"></i></a>
<?php
				}
			}
			elseif ($row['author'] != $user->getIdentity()->username) {
?>
                    <i class="rightText">Nejste autorem této stezky, nemůžete provádět úpravy.</i>
<?php
			}
?>
            </p> 
        </div>
        <div id="collapse<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 55 */ ?>" class="collapse card-body" aria-labelledby="heading<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 55 */ ?>" data-parent="#accordion">
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
