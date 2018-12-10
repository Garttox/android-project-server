<?php
// source: D:\www\android-project-server\app\presenters/templates/Homepage/howItWorks.latte

use Latte\Runtime as LR;

class Templatec71fd16502 extends Latte\Runtime\Template
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
?>    <div class="container text-center">
        <h1>Hele, jdi na <a href="https://github.com/petrgru" target="_blank">https://github.com/petrgru</a>, tam najdeš flask-skeleton-novy, a to je to samé. 
            A když nevíš, co s tím, jdi na <a href="https://blog.iservery.cz" target="_blank">https://blog.iservery.cz</a>, tam najdeš návody na všechno.</h1>
    </div>


<?php
	}

}
