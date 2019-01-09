<?php
// source: D:\www\android-project-server\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template30dfcbf119 extends Latte\Runtime\Template
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
?>

<?php
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
        <hr>
        <h2>Vítejte na oficiálních stránkách OpavaTourist</h2>
        <hr>
        <p>Zde naleznete <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:howItWorks")) ?>">informace o aplikaci</a>, <a href="<?php
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:faq")) ?>">často kladené otázky</a> a také odkaz ke <a href="<?php
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:download")) ?>">stažení aplikace</a>.</p>
    </div>

<?php
	}

}
