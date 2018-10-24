<?php
// source: D:\www\android-project-server\app\presenters/templates/@layout.latte

use Latte\Runtime as LR;

class Template061c431321 extends Latte\Runtime\Template
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
	<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('head', get_defined_vars());
?>
</head>

<body>
<?php
		$this->renderBlock('header', get_defined_vars());
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>	<div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 26 */ ?></div>
<?php
			$iterations++;
		}
?>
        
<?php
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
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 26');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHead($_args)
	{
		
	}


	function blockHeader($_args)
	{
?>            <div class="jumbotron text-center bg-primary text-white">
                <h1>Opava Tour</h1>
                <br>
                <p>by Michal Trlica & Richard Míček</p>
            </div>
<?php
	}


	function blockFooter($_args)
	{
		extract($_args);
?>
            <div class="container-fluid bg-primary text-white footer">
                <div class="row">
                    <div class="col-md-3">
<?php
		if ($user->loggedIn) {
			?>                            <p><a class="btn btn-light disabled" tabindex="-1" role="button" aria-disabled="true" href="<?php
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>">Přihlásit se</a>
                            <a class="btn btn-light" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) ?>">Odhlásit</a></p>

<?php
		}
		else {
			?>                            <p><a class="btn btn-light" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>">Přihlásit se</a></p>
<?php
		}
?>
                    </div>
                    <div class="col-md-3 offset-md-2">
                        <p>Michal Trlica & Richard Míček &copy 2018</p>
                    </div>
                </div>
            </div>
<?php
	}


	function blockScripts($_args)
	{
		extract($_args);
?>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://nette.github.io/resources/js/netteForms.min.js"></script>
	<!--<script src="<?php echo LR\Filters::escapeHtmlComment($basePath) /* line 50 */ ?>/js/main.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<?php
	}

}
