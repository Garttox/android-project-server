<?php
// source: D:\stranky\www\android-project-server\app\presenters/templates/Api/exist.latte

use Latte\Runtime as LR;

class Templateef819ec5dc extends Latte\Runtime\Template
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
