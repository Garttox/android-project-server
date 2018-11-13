<?php
// source: C:\xampp\htdocs\android-project-server\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Templated887a39859 extends Latte\Runtime\Template
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
?>

<!-- Student Informačních a komunikačních 
                    technologií na Střední Škole Průmyslové a Umělecké v Opavě.
                    O programování se zajímá od 8. třídy základní školy, kdy 
                    začal jeho zájem o jazyk Java. Tento jazyk nadále zůstává 
                    jeho oblíbeným, a i aplikace OpavaTour&trade; je napsána v Javě. -->
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
?>    <div class="container text-center">
        <h2>Vítejte na stránkách OpavaTour&trade;</h2>
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
                <hr>
                <h3>Recenze</h3>
                <hr>
                <p>"Ne." - <i>Radovan Kavka</i></p>
                <hr>
                <p>"No, je docela pěkná." - <i>Viktor Rucký</i></p>
                <hr>
                <p>"Mám lepší xd." - <i>František Lukeš</i></p>
                <hr>
                <h3>Recenze</h3>
                <hr>
                <p>"Ne." - <i>Radovan Kavka</i></p>
                <hr>
                <p>"No, je docela pěkná." - <i>Viktor Rucký</i></p>
                <hr>
                <p>"Mám lepší xd." - <i>František Lukeš</i></p>
                <hr>
                <h3>Recenze</h3>
                <hr>
                <p>"Ne." - <i>Radovan Kavka</i></p>
                <hr>
                <p>"No, je docela pěkná." - <i>Viktor Rucký</i></p>
                <hr>
                <p>"Mám lepší xd." - <i>František Lukeš</i></p>
            </div>
            <div class="col-md-6 col-sm-12">
                <h3>O tvůrcích</h3>
                <hr>
                <p class="text-justify"><strong>Richard Míček - Hlavní vývojář aplikace, tvůrce projektu</strong><hr></p>
                <h3 class="text-justify"><strong><i><u>I'm the fastest man alive.</u></i></strong></h3>
                <hr>
                <p class="text-justify"><strong>Michal Trlica - Hlavní vývojář webu, spolutvůrce projektu</strong><hr></p>
                <h3 class="text-justify"><strong><i><u>I'm Batman.</u></i></strong></h3>
            </div>
        </div>
    </div>

<?php
	}

}
