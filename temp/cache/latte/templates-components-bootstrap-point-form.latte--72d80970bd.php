<?php
// source: D:\www\android-project-server\app\presenters\templates\components\bootstrap-point-form.latte

use Latte\Runtime as LR;

class Template72d80970bd extends Latte\Runtime\Template
{
	public $blocks = [
		'bootstrap-head' => 'blockBootstrap_head',
		'bootstrap-point-form' => 'blockBootstrap_point_form',
	];

	public $blockTypes = [
		'bootstrap-head' => 'html',
		'bootstrap-point-form' => 'html',
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
		if (isset($this->params['error'])) trigger_error('Variable $error overwritten in foreach on line 9');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockBootstrap_head($_args)
	{
?><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous"> 
<?php
	}


	function blockBootstrap_point_form($_args)
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
<?php
		if ($form->hasErrors()) {
?>		<div class="errors text-center bg-warning col-md-4 offset-md-4">
<?php
			$iterations = 0;
			foreach ($form->errors as $error) {
?>			<div>
				<?php echo LR\Filters::escapeHtmlText($error) /* line 10 */ ?>

			</div>
<?php
				$iterations++;
			}
?>
		</div>
<?php
		}
?>
		<div class="form-group row">
			<?php
		if ($_label = end($this->global->formsStack)["name"]->getLabel()) echo $_label->addAttributes(['class' => "col-md-2 offset-md-5 col-form-label"]);
		echo end($this->global->formsStack)["name"]->getControl()->addAttributes(['class' => "form-control offset-md-1 col-md-10"]) /* line 14 */ ?>

		</div>

		<div class="form-group row">
			<?php
		if ($_label = end($this->global->formsStack)["longitude"]->getLabel()) echo $_label->addAttributes(['class' => "col-md-2 offset-md-3 col-form-label"]);
		if ($_label = end($this->global->formsStack)["latitude"]->getLabel()) echo $_label->addAttributes(['class' => "col-md-2 offset-md-2 col-form-label"]) ?>

			<?php
		echo end($this->global->formsStack)["longitude"]->getControl()->addAttributes(['class' => "form-control col-md-5 offset-md-1"]) /* line 19 */;
		echo end($this->global->formsStack)["latitude"]->getControl()->addAttributes(['class' => "form-control col-md-5"]) /* line 19 */ ?>

			<div class="offset-md-1 col-md-10">
			In excepteur cupidatat occaecat aliquip est enim fugiat consequat Lorem eiusmod commodo consequat est. Quis voluptate irure pariatur Lorem et officia. Minim nostrud cupidatat dolor sunt minim dolore aliqua enim exercitation ipsum. Nisi mollit officia officia enim magna labore aute minim mollit deserunt. Cillum laborum proident reprehenderit incididunt fugiat anim veniam est laboris qui pariatur esse eiusmod. Qui exercitation in magna excepteur sunt Lorem culpa occaecat laborum labore minim cupidatat pariatur ex. Sit non minim exercitation pariatur et nulla commodo deserunt ut eu.
			</div>
			

		</div>

		<div class="form-group row">
			<?php
		if ($_label = end($this->global->formsStack)["text"]->getLabel()) echo $_label->addAttributes(['class' => "col-md-2 offset-md-5 col-form-label"]);
		echo end($this->global->formsStack)["text"]->getControl()->addAttributes(['class' => "form-control offset-md-1 col-md-10"]) /* line 28 */ ?>

		</div>
		<div class="form-group row">
			<?php echo end($this->global->formsStack)["submit"]->getControl()->addAttributes(['class' => "btn btn-primary offset-md-5 col-md-2"]) /* line 31 */ ?>

		</div>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false);
?>	</form>
</div>
<?php
	}

}
