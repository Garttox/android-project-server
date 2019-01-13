<?php
// source: D:\stranky\www\android-project-server\app\presenters/templates/List/detail.latte

use Latte\Runtime as LR;

class Template3e3d80d3e9 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'_pointsListContainer' => 'blockPointsListContainer',
	];

	public $blockTypes = [
		'content' => 'html',
		'_pointsListContainer' => 'html',
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
		if (isset($this->params['id'])) trigger_error('Variable $id overwritten in foreach on line 7');
		if (isset($this->params['point'])) trigger_error('Variable $point overwritten in foreach on line 7');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
    <div class="container">
        <h1 class=" text-center"><hr><?php echo LR\Filters::escapeHtmlText($tour['title']) /* line 3 */ ?><hr></h1>
        <a class="btn btn-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:editTour", [$tour['id']])) ?>"><i class="fas fa-file-signature"></i> Přejmenovat stezku</a> <a class="btn btn-danger" href="<?php
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:deleteTour", [$tour['id']])) ?>"><i class="fas fa-trash-alt"></i> Smazat stezku</a>
        <table class="table top">
            <div<?php echo ' id="' . htmlSpecialChars($this->global->snippetDriver->getHtmlId('pointsListContainer')) . '"' ?>>
<?php $this->renderBlock('_pointsListContainer', $this->params) ?>
            </div>
        </table>
        <a class="btn btn-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:")) ?>"><i class="fas fa-arrow-left"></i> Zpět</a>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">QR</h5>
        <a class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <div class="text-body">
        
        </div>
        <div class="image-body">
        
        </div>
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


	function blockPointsListContainer($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("pointsListContainer", "static");
		?>                <?php
		$iterations = 0;
		foreach ($points as $id => $point) {
?>

                    <tr<?php echo ' id="' . htmlSpecialChars($this->global->snippetDriver->getHtmlId("point-$id")) . '"' ?>>
<?php
			$this->global->snippetDriver->enter("point-$id", "dynamic");
?>                        <th scope="col">
<?php
			if ($id != $last) {
				?>                                <a class="btn btn-secondary right ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("swap!", [$id, $id+1])) ?>">↓</a>
<?php
			}
			if ($id != 1) {
				?>                                <a class="btn btn-secondary right ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("swap!", [$id, $id-1])) ?>">↑</a>
<?php
			}
?>
                        </th>
                        <th scope="col"><?php echo LR\Filters::escapeHtmlText($point['order']) /* line 17 */ ?> </th>
                        <th scope="col"><?php echo LR\Filters::escapeHtmlText($point['name']) /* line 18 */ ?></th>
                        <th scope="col"><?php echo LR\Filters::escapeHtmlText($point['longitude']) /* line 19 */ ?></th>
                        <th scope="col"><?php echo LR\Filters::escapeHtmlText($point['latitude']) /* line 20 */ ?></th>
                        <th scope="col"><a class="btn btn-dark list-button text-white" data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php
			echo LR\Filters::escapeHtmlAttr($point['text']) /* line 21 */ ?>" data-img="<?php echo LR\Filters::escapeHtmlAttr($basePath) /* line 21 */ ?>/<?php
			echo LR\Filters::escapeHtmlAttr($point['fotoURL']) /* line 21 */ ?>" data-name="<?php echo LR\Filters::escapeHtmlAttr($point['name']) /* line 21 */ ?>"><i class="fas fa-qrcode"></i> QR</a> <a class="btn btn-warning" href="<?php
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:editPoint", [$point['id']])) ?>"><i class="fas fa-edit"></i> Upravit bod</a> <a class="btn btn-danger" href="<?php
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:deletePoint", [$tour['id'], $point['id'], $point['order']])) ?>"><i class="fas fa-eraser"></i> Odstranit bod</a></th>
<?php
			$this->global->snippetDriver->leave();
?>                    </tr>
<?php
			$iterations++;
		}
?>
                <tr>
                    <td class="text-center" colspan="6"><a class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:addPoint", [$tour['id']])) ?>"><i class="far fa-plus-square"></i> Přidat bod</a></td>
                </tr>
<?php
		$this->global->snippetDriver->leave();
		
	}

}
