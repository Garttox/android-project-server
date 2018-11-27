<?php
// source: E:\SchoolProject\android-project-server\app\presenters/templates/Admin/default.latte

use Latte\Runtime as LR;

class Template8844ff138a extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
