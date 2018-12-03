<?php
// source: D:\www\a\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template20c29f7a8e extends Latte\Runtime\Template
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
?>

<?php
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
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h3>O čem je tato stránka?</h3>
                <hr>
                <p class="text-justify">Tato stránka funguje jako informační centrum pro uživatele aplikace 
                OpavaTour&trade;. Najdete zde vše, co potřebujete k používání aplikace.
                Nahoře najdete navigaci, kde najdete popsání aplikace, nejčastější dotazy
                a také odkaz ke stažení aplikace.</p>
                <p class="text-justify">Aplikace OpavaTour&trade; byla vytvořena dvěma studenty střední školy,
                kteří se zajímají o Opavu, její historii a památky. Byla vytvořena za 
                účelem zpříjemnění procházení Opavou, nechce-li se vám platit za průvodce
                či bloudit naslepo.</p>
            </div>
            <div class="col-md-6 col-sm-12">
                <h3>O tvůrcích</h3>
                <hr>
                <p><strong>Richard Míček - Hlavní vývojář aplikace, tvůrce projektu</strong><hr></p>
                <p class="text-justify">
                    <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 25 */ ?>/images/richard.webp" class="floated">
                    Student Informačních a komunikačních 
                    technologií na Střední Škole Průmyslové a Umělecké v Opavě.
                    O programování se zajímá od 8. třídy základní školy, kdy 
                    začal jeho zájem o jazyk Java. Tento jazyk nadále zůstává 
                    jeho oblíbeným, a i aplikace OpavaTour&trade; je napsána v Javě.</p>
                <hr>
                <p><strong>Michal Trlica - Hlavní vývojář webu, spolutvůrce projektu</strong><hr></p>
                <p class="text-justify">
                    <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 34 */ ?>/images/michal.webp" class="floated">
                    Student Informačních a komunikačních 
                    technologií na Střední Škole Průmyslové a Umělecké v Opavě.
                    O programování se zajímá od 8. třídy základní školy, kdy 
                    začal jeho zájem o jazyk Java. Tento jazyk nadále zůstává 
                    jeho oblíbeným, a i aplikace OpavaTour&trade; je napsána v Javě.</p>
            </div>
        </div>
        
        <!-- Nic už nepřidávát, mrdá to s footerem -->
        
    </div>

<?php
	}

}
