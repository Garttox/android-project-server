<?php
// source: D:\www\android-project-server\app\presenters/templates/List/default.latte

use Latte\Runtime as LR;

class Template294b7fd712 extends Latte\Runtime\Template
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
		if (isset($this->params['point'])) trigger_error('Variable $point overwritten in foreach on line 62');
		if (isset($this->params['id'])) trigger_error('Variable $id overwritten in foreach on line 6');
		if (isset($this->params['row'])) trigger_error('Variable $row overwritten in foreach on line 6');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container text-center">
    <h1><hr>Seznam Stezek<hr></h1>
    <div class="accordion" id="accordion">
        <div<?php echo ' id="' . htmlSpecialChars($this->global->snippetDriver->getHtmlId('toursListContainer')) . '"' ?>>
<?php $this->renderBlock('_toursListContainer', $this->params) ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">QR</h5>
        <a class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal">Zavřít</a>
        <a class="btn btn-primary text-white">Vytisknout</a>
      </div>
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

                <div class="card-header bg-own" id="heading<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 9 */ ?>">
<?php
			}
			else {
				?>                <div class="card-header" id="heading<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 11 */ ?>">
<?php
			}
?>
                    <p class="card-title text-left">
                    <strong class="leftText"><?php echo LR\Filters::escapeHtmlText($row['title']) /* line 14 */ ?></strong> <strong>|</strong> <em class="card-subtitle mb-2 text-muted"><?php
			echo LR\Filters::escapeHtmlText($row['author']) /* line 14 */ ?></em> <strong>|</strong> 
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
				?>                                <a class="btn btn-dark list-button text-white" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php
				echo LR\Filters::escapeHtmlAttr($row['qr']) /* line 27 */ ?>" data-name="<?php echo LR\Filters::escapeHtmlAttr($row['title']) /* line 27 */ ?>"><i class="fas fa-qrcode"></i> QR</a>
<?php
			}
			if ($user->isInRole('admin') || ($user->isInRole('editor') && $row['author'] == $user->getIdentity()->username)) {
				?>                                <a class="btn btn-warning list-button" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:detail", [$row['id']])) ?>"><i class="fas fa-search"></i> Podrobnosti</a>
<?php
			}
			?>                            <a class="btn btn-primary list-button" data-toggle="collapse" data-target="#collapse<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 32 */ ?>" aria-expanded="true" aria-controls="collapse<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 32 */ ?>"><i class="fas fa-thumbtack"></i> Body cesty</a>  
                        </span>    
<?php
			if (($row['published'] == 'no' && $user->isInRole('admin'))) {
				?>                            <a class="btn btn-success right ajax list-button" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("publish!", [$id])) ?>"><i class="fas fa-check"></i> Zveřejnit</a>
<?php
			}
			elseif (($row['published'] == 'yes' && $user->isInRole('admin'))) {
				?>                            <a class="btn btn-danger right ajax list-button" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("publish!", [$id])) ?>"><i class="fas fa-times"></i> Stáhnout</a>
<?php
			}
			elseif (($row['published'] == 'wip' && $row['author'] == $user->getIdentity()->username)) {
				?>                            <a class="btn btn-secondary right ajax list-button" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("publish!", [$id])) ?>"><i class="fas fa-flag-checkered"></i> Dokončit</a> 
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
			?>                 <div id="collapse<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 50 */ ?>" class="collapse card-body" aria-labelledby="heading<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 50 */ ?>" data-parent="#accordion">
<?php
			if (empty($points[$row['id']]['points'])) {
?>
                        <p>Tato stezka nemá přiřazeny žádné body.</p>
<?php
			}
			else {
?>
                    <table class="table">
                        <tr>
                            <th scope="col">Pořadí</th>
                            <th scope="col">Název</th>
                            <th scope="col">Zeměpisná délka</th>
                            <th scope="col">Zeměpisná šířka</th>
                            <th scope="col">Popis</th>
                        </tr>
<?php
				$iterations = 0;
				foreach ($points[$row['id']]['points'] as $point) {
?>
                        <tr>
                            <td scope="col"><?php echo LR\Filters::escapeHtmlText($point['order']) /* line 64 */ ?> </td>
                            <td scope="col"><?php echo LR\Filters::escapeHtmlText($point['name']) /* line 65 */ ?></td>
                            <td scope="col"><?php echo LR\Filters::escapeHtmlText($point['longitude']) /* line 66 */ ?></td>
                            <td scope="col"><?php echo LR\Filters::escapeHtmlText($point['latitude']) /* line 67 */ ?></td>
                            <td scope="col"><?php echo LR\Filters::escapeHtmlText($point['text']) /* line 68 */ ?></td>
                        </tr>
<?php
					$iterations++;
				}
?>
                    </table>
<?php
			}
?>
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
