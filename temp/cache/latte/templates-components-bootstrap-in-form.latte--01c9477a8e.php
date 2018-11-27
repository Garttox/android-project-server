<?php
// source: E:\SchoolProject\android-project-server\app\presenters\templates\components\bootstrap-in-form.latte

use Latte\Runtime as LR;

class Template01c9477a8e extends Latte\Runtime\Template
{
	public $blocks = [
		'bootstrap-head' => 'blockBootstrap_head',
		'bootstrap-in-form' => 'blockBootstrap_in_form',
	];

	public $blockTypes = [
		'bootstrap-head' => 'html',
		'bootstrap-in-form' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockBootstrap_head($_args)
	{
?><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous"> 
<?php
	}


	function blockBootstrap_in_form($_args)
	{
		extract($this->params);
		list($form) = $_args + [NULL, ];
?>
<div class="container">
<?php
		$form = $_form = $this->global->formsStack[] = is_object($form) ? $form : $this->global->uiControl[$form];
		?>	<form class="form"<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), false) ?>>
		<div class="form-group row">
			<?php
		if ($_label = end($this->global->formsStack)["username"]->getLabel()) echo $_label->addAttributes(['class' => "col-md-2 offset-md-3 col-form-label"]);
		echo end($this->global->formsStack)["username"]->getControl()->addAttributes(['class' => "form-control col-md-4"]) /* line 9 */ ?>

		</div>
		<div class="form-group row">
			<?php
		if ($_label = end($this->global->formsStack)["password"]->getLabel()) echo $_label->addAttributes(['class' => "col-md-2 offset-md-3 col-form-label"]);
		echo end($this->global->formsStack)["password"]->getControl()->addAttributes(['class' => "form-control col-md-4"]) /* line 12 */ ?>

		</div>
		<div class="form-group row">
			<?php echo end($this->global->formsStack)["send"]->getControl()->addAttributes(['class' => "btn btn-primary offset-md-5"]) /* line 15 */ ?>

		</div>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false);
?>	</form>
</div>
<?php
	}

}
