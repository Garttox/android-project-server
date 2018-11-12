<?php
// source: D:\www\aa\app\presenters/templates/Homepage/faq.latte

use Latte\Runtime as LR;

class Template30c5a516c1 extends Latte\Runtime\Template
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
?>

<?php
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
?>    <div class="container text-center">
        <h1>Žádné otázky nejsou. Je to dokanalá aplikace. Bezchybná, funkční, neomylná.</h1>
    </div>

<?php
	}

}
