<?php
// source: /home/michal/www/android-project-server/app/presenters/templates/List/detail.latte

use Latte\Runtime as LR;

class Template0cbd0481a2 extends Latte\Runtime\Template
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
		if (isset($this->params['point'])) trigger_error('Variable $point overwritten in foreach on line 6');
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
<?php
		$iterations = 0;
		foreach ($points as $point) {
?>
                <tr>
                    <th scope="col"><?php echo LR\Filters::escapeHtmlText($point->order) /* line 8 */ ?></th>
                    <th scope="col"><?php echo LR\Filters::escapeHtmlText($point->name) /* line 9 */ ?></th>
                    <th scope="col"><?php echo LR\Filters::escapeHtmlText($point->longitude) /* line 10 */ ?></th>
                    <th scope="col"><?php echo LR\Filters::escapeHtmlText($point->latitude) /* line 11 */ ?></th>
                </tr>
<?php
			$iterations++;
		}
?>
        </table>
    </div>
<?php
	}

}
