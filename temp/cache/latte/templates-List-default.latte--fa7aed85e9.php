<?php
// source: /home/michal/www/android-project-server/app/presenters/templates/List/default.latte

use Latte\Runtime as LR;

class Templatefa7aed85e9 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'_listContainer' => 'blockListContainer',
	];

	public $blockTypes = [
		'content' => 'html',
		'_listContainer' => 'html',
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
		if (isset($this->params['id'])) trigger_error('Variable $id overwritten in foreach on line 10');
		if (isset($this->params['row'])) trigger_error('Variable $row overwritten in foreach on line 10');
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
    <div<?php echo ' id="' . htmlSpecialChars($this->global->snippetDriver->getHtmlId('listContainer')) . '"' ?>>
<?php $this->renderBlock('_listContainer', $this->params) ?>
    </div>
</div>
</div>
<?php
	}


	function blockListContainer($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("listContainer", "static");
		?>    <?php
		$iterations = 0;
		foreach ($data as $id => $row) {
?>

    <div class="card"<?php echo ' id="' . htmlSpecialChars($this->global->snippetDriver->getHtmlId("row-$id")) . '"' ?>>
<?php
			$this->global->snippetDriver->enter("row-$id", "dynamic");
			?>        <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("update!", [$row['id']])) ?>">aa</a>
<?php
			if ($row['author'] == $user->getIdentity()->username) {
				?>        <div class="card-header bg-own" id="heading<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 14 */ ?>">
<?php
			}
			else {
				?>        <div class="card-header" id="heading<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 16 */ ?>">
<?php
			}
?>
            <p class="card-title text-left">
            <strong class="leftText"><?php echo LR\Filters::escapeHtmlText($row['title']) /* line 19 */ ?></strong> <strong>|</strong> <em class="card-subtitle mb-2 text-muted"><?php
			echo LR\Filters::escapeHtmlText($row['author']) /* line 19 */ ?></em> <strong>|</strong> 
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
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 37 */ ?>" aria-expanded="true" aria-controls="collapse<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 37 */ ?>"><i class="fas fa-chevron-down"></i> Více</button>  
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
        <div id="collapse<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 51 */ ?>" class="collapse card-body" aria-labelledby="heading<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 51 */ ?>" data-parent="#accordion">
            <p>Duis duis duis tempor et elit eiusmod irure do eu minim sint. Id aliqua nostrud et eu excepteur ad dolore commodo incididunt aliqua commodo id non. Exercitation voluptate laborum elit commodo mollit pariatur. Ad aliquip excepteur voluptate laboris excepteur. Aliquip in mollit ipsum excepteur. Qui ad ad veniam mollit consequat incididunt non id laborum fugiat consectetur officia proident.</p>
        </div>
    </div>
<?php
			$this->global->snippetDriver->leave();
?>    </div>
<?php
			$iterations++;
		}
		$this->global->snippetDriver->leave();
		
	}

}
