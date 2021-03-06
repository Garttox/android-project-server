<?php
// source: D:\stranky\www\android-project-server\app\presenters/templates/List/addPoint.latte

use Latte\Runtime as LR;

class Template6b9b2d775f extends Latte\Runtime\Template
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
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container text-center">
    <h1><hr>Přidat Bod<hr></h1>
<?php
		$this->createTemplate('../components/bootstrap-point-form.latte', $this->params, "import")->render();
		$this->renderBlock('bootstrap-point-form', ['pointForm'] + $this->params, 'html');
?>
</div>

<?php
	}

}
