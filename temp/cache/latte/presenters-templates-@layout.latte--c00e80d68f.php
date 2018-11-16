<?php
// source: /home/ubuntu/workspace/android-project-server/app/presenters/templates/@layout.latte

use Latte\Runtime as LR;

class Templatec00e80d68f extends Latte\Runtime\Template
{
	public $blocks = [
		'head' => 'blockHead',
		'header' => 'blockHeader',
		'footer' => 'blockFooter',
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'head' => 'html',
		'header' => 'html',
		'footer' => 'html',
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title><?php
		if (isset($this->blockQueue["title"])) {
			$this->renderBlock('title', $this->params, function ($s, $type) {
				$_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($_fi, 'html', $this->filters->filterContent('striphtml', $_fi, $s));
			});
			?> | <?php
		}
?>Opava Tour</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 13 */ ?>/css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('head', get_defined_vars());
?>
</head>

<nav class="navbar navbar-expand-sm bg-primary text-white">
		<!-- Brand -->
		<a class="navbar-brand text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>"><i class="far fa-circle"></i></a>

		<!-- Links -->
		<ul class="navbar-nav">
    		<li class="nav-item">
    			<a class="nav-link text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>"><i class="fas fa-home"></i> Domů</a>
    		</li>
			<li class="nav-item">
    			<a class="nav-link text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:howItWorks")) ?>"><i class="fas fa-book"></i> Jak na to?</a>
    		</li>
    		<li class="nav-item">
    			<a class="nav-link text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:faq")) ?>"><i class="fas fa-question-circle"></i> FAQ</a>
    		</li>
    		<li class="nav-item">
    			<a class="nav-link text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:download")) ?>"><i class="fas fa-download"></i> Ke Stažení</a>
    		</li>	
                </ul>
                
                <!-- Dropdown -->
<?php
		if ($user->isLoggedIn()) {
?>
                    <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle bg-primary text-white" href="#" id="navbardrop" data-toggle="dropdown"><i class="fas fa-user"></i> <?php
			echo LR\Filters::escapeHtmlText($user->getIdentity()->username) /* line 43 */ ?></a>
                                    <div class="dropdown-menu dropdown-menu-right bg-primary text-center">
                                        <hr>
<?php
			if ($user->isAllowed('List', 'default')) {
				?>                                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:default")) ?>">Seznam Stezek</a>
                                        <hr>
<?php
			}
			if ($user->isAllowed('List', 'add')) {
				?>                                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:add")) ?>">Přidat Stezku</a>
                                        <hr>
<?php
			}
			?>        				<a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>">Smazat stezku</a>
                                        <hr>
                                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) ?>"><i class="fas fa-sign-out-alt"></i> Odhlásit</a>
                                        <hr>
                                    </div>
                            </li>
                    </ul>
<?php
		}
		else {
?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="btn btn-primary login-button" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>"><i class="fas fa-sign-in-alt"></i> Přihlásit se</a>
                        </li>
                    </ul>
<?php
		}
?>
                <!--
                <ul class="navbar-nav ml-auto">
<?php
		if ($user->isLoggedIn()) {
?>
                    <li class="nav-item">
                        <i class="fas fa-user"></i> <?php echo LR\Filters::escapeHtmlComment($user->getIdentity()->username) /* line 72 */ ?>

                    </li>
                    <li class="nav-item">
                        <a n:href="Sign:out" class="btn btn-primary login-button"><i class="fas fa-sign-out-alt"></i> Odhlásit</a>
                    </li>

<?php
		}
		else {
?>
                    <li class="nav-item text-right">
                        <a n:href="Sign:in" class="btn btn-primary login-button"><i class="fas fa-sign-in-alt"></i> Přihlásit se</a>
                    </li>
<?php
		}
?>
                </ul>-->
	</nav>

<body>
<?php
		$this->renderBlock('header', get_defined_vars());
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>	<div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 95 */ ?></div>
<?php
			$iterations++;
		}
		$this->renderBlock('content', $this->params, 'html');
		$this->renderBlock('footer', get_defined_vars());
		$this->renderBlock('scripts', get_defined_vars());
?>
</body>
</html>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 95');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHead($_args)
	{
		
	}


	function blockHeader($_args)
	{
?>            <div class="jumbotron jumbotron-fluid text-center bg-primary text-white">
                <div class="container-fluid">
                    <h1>OpavaTour&trade;</h1>
                    <p><i>Prohlídka Opavy, jednoduše</i></p>
                </div>
            </div>
<?php
	}


	function blockFooter($_args)
	{
?>            <div class="footer bg-primary">
                This footer will always be positioned at the bottom of the page, but <strong>not fixed</strong>.
            </div>
<?php
	}


	function blockScripts($_args)
	{
		extract($_args);
?>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://nette.github.io/resources/js/netteForms.min.js"></script>
	<!--<script src="<?php echo LR\Filters::escapeHtmlComment($basePath) /* line 105 */ ?>/js/main.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<?php
	}

}
