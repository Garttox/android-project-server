<?php
// source: H:\Michal\www\android-project-server\app\presenters/templates/Sign/pls.latte

use Latte\Runtime as LR;

class Templateec00d7e524 extends Latte\Runtime\Template
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
		$this->createTemplate('../components/bootstrap-in-form.latte', $this->params, "import")->render();
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">
<h1 class="text-center">Sign In</h1>
<hr>

<?php
		$this->renderBlock('bootstrap-in-form', ['signInForm'] + $this->params, 'html');
?>


<?php
		if ($user->isInRole('admin')) {
			?><p class="offset-md-5 sign"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("up")) ?>">Don't have an account? Sign up.</a></p>
<?php
		}
?>

<?php
		$this->createTemplate('../components/bootstrap-up-form.latte', $this->params, "import")->render();
?>
<h1 class="text-center">Sign Up</h1>
<hr>

<?php
		$this->renderBlock('bootstrap-up-form', ['signUpForm'] + $this->params, 'html');
?>

<p class="offset-md-5 sign"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("in")) ?>">Already have an account? Log in.</a></p>
</div>


<?php
	}

}
