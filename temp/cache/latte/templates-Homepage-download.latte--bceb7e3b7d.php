<?php
// source: D:\www\aa\app\presenters/templates/Homepage/download.latte

use Latte\Runtime as LR;

class Templatebceb7e3b7d extends Latte\Runtime\Template
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
        <h1><a href="https://www.netacad.com/courses/packet-tracer" target="_blank" class="btn btn-primary">DOWNLOAD</a></h1>
    </div>

<?php
	}

}
