<?php
// source: D:\stranky\www\android-project-server\app\presenters/templates/Homepage/download.latte

use Latte\Runtime as LR;

class Templateb8014aee73 extends Latte\Runtime\Template
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
		extract($_args);
?>

    <div class="container text-center">
    <hr>
    <h2>Ke Stažení</h2>
    <hr>

    <p><strong>Stažení aplikačního balíčku</strong></p>
    <p><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */ ?>/res/Opava_Tourist.apk" class="btn btn-success"><i class="fas fa-download"></i> Stáhnout</a></p>
    <hr>
    <p><strong>Zdrojový kód</strong></p>
    <p><a href="https://github.com/garttox" target="_blank" class="btn btn-dark"><i class="fas fa-directions"></i> M. Trlica</a> <a href="https://github.com/drag0n0idus" target="_blank" class="btn btn-dark"><i class="fas fa-directions"></i> R. Míček</a></p>
    <hr>
    <p><strong>Stažení dokumentací k aplikaci</strong></p>
    <p><a href="#" class="btn btn-info"><i class="fas fa-download"></i> M. Trlica</a> <a href="#" class="btn btn-info"><i class="fas fa-download"></i> R. Míček</a></p>
    </div>

<?php
	}

}
