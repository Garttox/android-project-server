<?php
// source: D:\stranky\www\android-project-server\app\presenters/templates/Api/tour.latte

use Latte\Runtime as LR;

class Template5b02e6d97e extends Latte\Runtime\Template
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
