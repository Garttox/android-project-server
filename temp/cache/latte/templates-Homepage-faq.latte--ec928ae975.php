<?php
// source: D:\www\a\app\presenters/templates/Homepage/faq.latte

use Latte\Runtime as LR;

class Templateec928ae975 extends Latte\Runtime\Template
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
        <h2>FAQ</h2>
        <hr>

        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                        <p class="left">O čem je tato stránka?</p>
                        <button class="btn btn-link right" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fas fa-plus"></i>
                        </button>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <p class="text-justify">Tato stránka funguje jako informační centrum pro uživatele aplikace 
                        OpavaTourist&trade;. Najdete zde vše, co potřebujete k používání aplikace.
                        Nahoře najdete navigaci, kde najdete popsání aplikace, nejčastější dotazy
                        a také odkaz ke stažení aplikace.</p>
                        <p class="text-justify">Aplikace OpavaTourist&trade; byla vytvořena dvěma studenty střední školy,
                        kteří se zajímají o Opavu, její historii a památky. Byla vytvořena za 
                        účelem zpříjemnění procházení Opavou, nechce-li se vám platit za průvodce
                        či bloudit naslepo.</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingTwo">
                        <p class="left">Kdo vytvořil tuto aplikaci?</p>
                        <button class="btn btn-link right" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fas fa-plus"></i>
                        </button>
                </div>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body row">
                        <div class="col-md-6">
                            <p><hr><strong>Richard Míček - Hlavní vývojář aplikace, tvůrce projektu</strong><hr></p>
                            <p class="text-justify">
                                <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 46 */ ?>/images/richard.webp" class="floated" align="left">
                                Student Informačních a komunikačních 
                                technologií na Střední Škole Průmyslové a Umělecké v Opavě.
                                O programování se zajímá od 8. třídy základní školy, kdy 
                                začal jeho zájem o jazyk Java. Tento jazyk nadále zůstává 
                                jeho oblíbeným, a i aplikace OpavaTourist&trade; je napsána v Javě.</p>
                        </div>
                        <div class="col-md-6">
                            <p><hr><strong>Michal Trlica - Hlavní vývojář webu, spolutvůrce projektu</strong><hr></p>
                            <p class="text-justify">
                                <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 56 */ ?>/images/michal.webp" class="floated" align="left">
                                Student Informačních a komunikačních 
                                technologií na Střední Škole Průmyslové a Umělecké v Opavě.
                                O programování se zajímá od 8. třídy základní školy, kdy 
                                začal jeho zájem o jazyk Java. Tento jazyk nadále zůstává 
                                jeho oblíbeným, a i aplikace OpavaTourist&trade; je napsána v Javě.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingThree">
                        <p class="left">Jak a kde vznikl nápad na tuto aplikaci?</p>
                        <button class="btn btn-link right" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fas fa-plus"></i>
                        </button>
                </div>

                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <p class="text-justify">Vlastně náhodou. Jakožto studenty střední školy je čekala maturita, jejíž součástí byl maturitní projekt. A začalo uvažování</p>
                        <p class="text-justify">Budou dělat web? Nebo hru? Aplikaci? Možností bylo hodně. Nápad následně vznikl v mysli Richarda, který chtěl udělat aplikaci, jež by zjednodušila objevování Opavy. Ale věděl, že tento úkol pro něj bude moc těžký, než aby na něm dělal sám. Proto si do týmu přizval Michala.</p>
                        <p class="text-justify">Následoval měsíc nápadů, úprav a nakonec finální myšlenky. Potřebovali jsme jak aplikaci, tak rozhraní na internetu. Tudíž se rozdělila práce, Michal začal práci na webu a Richard na aplikaci samotné. Během vývoje se mnohokrát střídali, a tudíž můžeme skutečně říci, že tato aplikace i web je práce dvou.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
	}

}
