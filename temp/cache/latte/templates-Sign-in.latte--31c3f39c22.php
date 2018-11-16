<?php
// source: /home/ubuntu/workspace/android-project-server/app/presenters/templates/Sign/in.latte

use Latte\Runtime as LR;

class Template31c3f39c22 extends Latte\Runtime\Template
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
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-2">
<?php
		$this->renderBlock('title', get_defined_vars());
?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-2">
<?php
		/* line 10 */ $_tmp = $this->global->uiControl->getComponent("signInForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
?>
        </div>
    </div>
</div>



<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>            <h1>Přihlásit se</h1>
<?php
	}

}
