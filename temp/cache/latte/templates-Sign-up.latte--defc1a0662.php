<?php
// source: D:\www\a\app\presenters/templates/Sign/up.latte

use Latte\Runtime as LR;

class Templatedefc1a0662 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'title' => 'blockTitle',
	];

	public $blockTypes = [
		'content' => 'html',
		'title' => 'html',
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
		$this->createTemplate('../components/bootstrap-up-form.latte', $this->params, "import")->render();
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">
<hr>
<?php
		$this->renderBlock('title', get_defined_vars());
?>
<hr>

<?php
		$this->renderBlock('bootstrap-up-form', ['signUpForm'] + $this->params, 'html');
?>

</div><?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?><h1 class="text-center">Přidání Editorského Přístupu</h1>
<?php
	}

}
