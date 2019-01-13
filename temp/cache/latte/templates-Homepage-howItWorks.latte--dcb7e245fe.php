<?php
// source: D:\stranky\www\android-project-server\app\presenters/templates/Homepage/howItWorks.latte

use Latte\Runtime as LR;

class Templatedcb7e245fe extends Latte\Runtime\Template
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
        <h2>Jak to funguje?</h2>
        <hr>
    <div class="row">
        <p class="col-md-6 col-sm-12 text-justify">Princip fungování této aplikace je veskrze jednoduchý, koneckonců obsahuje pouze dvě tlačítka. Při stisknutí tlačítka <i>Jak to funguje?</i> budete přesměrováni na tuto stránku. Po stisku tlačítka <i>Start</i> už se ale dostaneme k hlavnímu bodu aplikace. Tlačítko <i>Start</i> spustí QR scanner, pomocí kterého sejmete QR kód při výběru stezky. <small><i>QR kódy naleznete na určeném místě, jež najdete <a href="<?php
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:faq")) ?>">zde</a>.</i></small></p>
        <p class="col-md-6 col-sm-12 text-center"><img class="screen" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 10 */ ?>/images/screen1.jpg"></p>
    </div>    
    <div class="row">
        <p class="col-md-6 col-sm-12 text-justify">Po uspěšném sejmutí QR kódu se zobrazí okno, jež se vás zeptá, zda chcete tuto stezku zobrazit. Pokud zvolíte možnost <i>Zrušit</i>, vrátíte se zpět ke QR scanneru, a můžete sejmout jiný QR kód. Zvolíte-li možnost <i>Ano</i>, spustí se již samotná mapa, na níž se zobrazí vámi vybraná stezka spolu s vaší lokací.</p>
        <p class="col-md-6 col-sm-12 text-center"><img class="screen" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 14 */ ?>/images/screen2.jpg"></p>
    </div>  
    <div class="row">
        <p class="col-md-6 col-sm-12 text-justify">Na mapě naleznete vyznačenou trasu stezky, dále jednotlivé body na stezce, a vaší lokaci. Teď už práce přechazí na Vás. Musíte se vydat po trase, jež vám je ukázána v aplikaci. Poté, co se budete nacházet v rozmezí 50m od dané památky/kavárny/sochy/atp. se spustí další dotazové okno.</p>
        <p class="col-md-6 col-sm-12 text-center"><img class="screen" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 18 */ ?>/images/screen3.jpg"></p>
    </div>  
    </div>


<?php
	}

}
