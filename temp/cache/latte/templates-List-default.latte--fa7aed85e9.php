<?php
// source: /home/michal/www/android-project-server/app/presenters/templates/List/default.latte

use Latte\Runtime as LR;

class Templatefa7aed85e9 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'_toursListContainer' => 'blockToursListContainer',
	];

	public $blockTypes = [
		'content' => 'html',
		'_toursListContainer' => 'html',
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
        <div<?php echo ' id="' . htmlSpecialChars($this->global->snippetDriver->getHtmlId('toursListContainer')) . '"' ?>>
<?php $this->renderBlock('_toursListContainer', $this->params) ?>
        </div>
    </div>
</div>
<?php
	}


	function blockToursListContainer($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("toursListContainer", "static");
		?>            <?php
		$iterations = 0;
		foreach ($data as $id => $row) {
?>

            <div class="card"<?php echo ' id="' . htmlSpecialChars($this->global->snippetDriver->getHtmlId("row-$id")) . '"' ?>>
<?php
			$this->global->snippetDriver->enter("row-$id", "dynamic");
			?>                <?php
			if ($row['author'] == $user->getIdentity()->username) {
?>

                <div class="card-header bg-own" id="heading<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 13 */ ?>">
<?php
			}
			else {
				?>                <div class="card-header" id="heading<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 15 */ ?>">
<?php
			}
?>
                    <p class="card-title text-left">
                    <strong class="leftText"><?php echo LR\Filters::escapeHtmlText($row['title']) /* line 18 */ ?></strong> <strong>|</strong> <em class="card-subtitle mb-2 text-muted"><?php
			echo LR\Filters::escapeHtmlText($row['author']) /* line 18 */ ?></em> <strong>|</strong> 
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
				?>                                <a class="btn btn-dark" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($row['qr'])) /* line 31 */ ?>"><i class="fas fa-qrcode"></i> QR</a>
<?php
			}
			if ($user->isInRole('admin') || ($user->isInRole('editor') && $row['author'] == $user->getIdentity()->username)) {
?>
                                <a class="btn btn-warning" href="#"><i class="fas fa-pen"></i> Upravit</a>
<?php
			}
			?>                            <a class="btn btn-primary" data-toggle="collapse" data-target="#collapse<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 36 */ ?>" aria-expanded="true" aria-controls="collapse<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 36 */ ?>"><i class="fas fa-chevron-down"></i> Více</a>  
                        </span>    
<?php
			if (($row['published'] == 'no' && $user->isInRole('admin'))) {
				?>                            <a class="btn btn-success right ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("publish!", [$id])) ?>"><i class="fas fa-check"></i> Zveřejnit</a>
<?php
			}
			elseif (($row['published'] == 'yes' && $user->isInRole('admin'))) {
				?>                            <a class="btn btn-danger right ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("publish!", [$id])) ?>"><i class="fas fa-times"></i> Stáhnout</a>
<?php
			}
			elseif (($row['published'] == 'wip' && $row['author'] == $user->getIdentity()->username)) {
				?>                            <a class="btn btn-secondary right ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("publish!", [$id])) ?>"><i class="fas fa-flag-checkered"></i> Dokončit</a> 
<?php
			}
			if ($row['author'] != $user->getIdentity()->username && !$user->isInRole('admin')) {
?>
                            <i class="rightText">Nejste autorem této stezky, nemůžete provádět úpravy.</i>
<?php
			}
?>
                    </p> 
<?php
			if ($row['author'] == $user->getIdentity()->username) {
?>
                </div>
<?php
			}
			else {
?>
                </div>
<?php
			}
			?>                 <div id="collapse<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 54 */ ?>" class="collapse card-body" aria-labelledby="heading<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 54 */ ?>" data-parent="#accordion">
                    <p>Duis duis duis tempor et elit eiusmod irure do eu minim sint. Id aliqua nostrud et eu excepteur ad dolore commodo incididunt aliqua commodo id non. Exercitation voluptate laborum elit commodo mollit pariatur. Ad aliquip excepteur voluptate laboris excepteur. Aliquip in mollit ipsum excepteur. Qui ad ad veniam mollit consequat incididunt non id laborum fugiat consectetur officia proident.</p>
                </div> 
                
<?php
			$this->global->snippetDriver->leave();
?>            </div> 
<?php
			$iterations++;
		}
		$this->global->snippetDriver->leave();
		
	}

}
