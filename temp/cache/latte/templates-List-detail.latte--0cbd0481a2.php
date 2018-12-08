<?php
// source: /home/michal/www/android-project-server/app/presenters/templates/List/detail.latte

use Latte\Runtime as LR;

class Template0cbd0481a2 extends Latte\Runtime\Template
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
        <h1><?php echo LR\Filters::escapeHtmlText($tour['title']) /* line 3 */ ?></h1>
        <a class="btn btn-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:editTour", [$tour['id']])) ?>">Přejmenovat</a>
        <table class="table">
            <div<?php echo ' id="' . htmlSpecialChars($this->global->snippetDriver->getHtmlId('pointsListContainer')) . '"' ?>>
<?php $this->renderBlock('_pointsListContainer', $this->params) ?>
            </div>
        </table>
        <a class="btn btn-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:")) ?>">Zpět</a>
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
<?php
			$this->global->snippetDriver->leave();
?>                    </tr>
<?php
			$iterations++;
		}
		$this->global->snippetDriver->leave();
		
	}

}
