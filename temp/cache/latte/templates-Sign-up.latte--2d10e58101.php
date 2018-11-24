<?php
// source: /home/ubuntu/workspace/android-project-server/app/presenters/templates/Sign/up.latte

use Latte\Runtime as LR;

class Template2d10e58101 extends Latte\Runtime\Template
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
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container text-center">
<?php
		$this->renderBlock('title', get_defined_vars());
?>

<?php
		$this->renderBlock('bootstrap-up-form', ['signUpForm'] + $this->params, 'html');
?>

<p><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("in")) ?>">Already have an account? Log in.</a></p>
</div><?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?><h1>Sign Up</h1>
<?php
	}

}
