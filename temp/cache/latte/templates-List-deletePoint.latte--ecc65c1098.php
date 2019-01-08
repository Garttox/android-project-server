<?php
// source: C:\xampp\htdocs\android-project-server\app\presenters/templates/List/deletePoint.latte

use Latte\Runtime as LR;

class Templateecc65c1098 extends Latte\Runtime\Template
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
