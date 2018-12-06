<?php
// source: /home/michal/www/android-project-server/app/presenters/templates/Api/points.latte

use Latte\Runtime as LR;

class Template39258b9c90 extends Latte\Runtime\Template
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
