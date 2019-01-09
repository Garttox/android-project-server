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
?>Opava Tourist</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */ ?>/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link rel="icon" 
      type="image/png" 
      href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 18 */ ?>/images/logoMini.png">    
         <?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('head', get_defined_vars());
?>
</head>


<body>
    <div class="wrapper d-flex flex-column">
<?php
		$this->renderBlock('header', get_defined_vars());
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>        <div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 109 */ ?></div>
<?php
			$iterations++;
		}
?>
        <main class="flex-fill">
<?php
		$this->renderBlock('content', $this->params, 'html');
?>
        </main>
<?php $this->renderBlock('footer', get_defined_vars()) ?>         <?php
		$this->renderBlock('scripts', get_defined_vars());
?>
    </div>
</body>
<!-- 
yysssyyhdddhhhhhhhhdhyyyhhhhhyyyyyyyyyyyyyssyyyyssssssssssssssssssssssssssssssssssssssssssssssssyyyyyyyyyyyyyyssssssyyyssssssssyyssssoooooooo++oo+++++++++++++++++++++++++++++++++++++++++++++++++++++++
yysssyyhddddddhhhhhdhyyyhhhhhyyyyyyyyyyyyyyyyyyyyssssssssssssssssssssssssssssssssssssssssssssssyyyyyyyyyyyyyyyysssyyyyyyssyyssssyssssoooooooooooo+++++++++++++++++++++++++++++++++++++++++++++++++++++++
yysssyyhdddhdhhhhhhhhhyyhhhhhyyyyyyyyyyyyyyyyyyyysssssssssssssssssssssssssssssssssssssssssssssyyyyyyyyyyyyyyyyyyyssyyysssssyssssyssssoooooooooo++++++++++++++++++++++++++++++++++++++++++++++++++++++++/
yysssyyhdddhhhhhhhhhhhyyyhhhhyyyyyyyyyyyyyysyyyyyssssssssssssssssssssssssssssssssssssssssssssssssyyyyyyyyyyyyyyyyssyyyyysssyssssyssssooooooooo++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
yyysssyhdddhhhhhhhhhhhyyyhhhhyyyyyyyyyyyyssssssyssssssssssssssssssssssssssssssssssssssssssssssssyyyyyyyyyyyyyyyyyyyyyyyyssssyssyyssssoooooooo+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
yyssssyhdddhhhhhhhhhhhyyyhhhhyyyyyyyyyyyyyssyyyysyyyssyyyyyyyysssssssssssssssyyyssssssssssssssssyyyyyyyyyysssysssssyyyyyyyyyyyyyyyyssooooooo++++o++++++++++++++++++++++++++++++++++++++++++++++++++++++/
yysssssyddhhhhhhhhhhhhyyyhhhhyyyyyyyyyyyyyssyyyyyyyyyyyyyyyyyyyyyyyssssssssyyyyysssssssyyyyyyyyyssssooooooooooooooooosssyyyhhhhhhhhhyssooooo+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++/
yyysssyyddhhhhhhhhhhhhyyyhhhhyyyysyyyyyyyyssyyyyyyyyyyyyyyyyyyyyyyyyyyyyssyyyyyyyyyyyhhhhyysssoooooooo++++++++++++++++++++ossyyhhdddhhhhysooo+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
yyysssyydddhhhhhhhhhhhyyyhhhhyyyyyyysyyyyysyyyyyyyyyyyyyyyyyyyhhyyyyyyyyyyyyyyhhhhhhhyysssooooooo+o+++++++++++//++/++//////++++ossyhddddhhyssoo+++++++++++++++++++++++++++++++++++++++++++++++++++++++++
yyyssssyddhhhhhhhhhhhhyyyhhhhyyyyyyyyyyyyysyyyyhdhyyyhyyyyhhddmmmddhhyyyyyyhhhhhhhyysooooooo++++++++++++////////////////////////++++syyhdddhhyoo++++++++++++++++++++++++++++++++++++++++++++++++++++++++
yyyssssydddhhhhhhhhhdhyyyhhhhyyyyyyyyyyyyyyyyyhdmhhdddddddmmmmdmmmmdhyyhhhhhhhhysssoooooooo+++++++++++//////////////////////////////+++osyhddhyyoo++++++++++++++++++++++++++++++++++++++++++++++++++++++
yyysssyyhddhhhhhhhhhhhyyyhhhhyyyyyyyyyyyyyyyyyydmmmmmmmmmmmmmdddddmdhhhdddhhyyssssooooooo+++++++++++/+///////////////////////////////////+oshdhhhyoo++++++++++++++++++++++++++++++++++++++++++++++++++++
yyyssssyhddhhhhhhhhhhhyyyhhhhyyyyyyyyyyyyyyyyyyhdmmmmmmmmmmmdddmdddhhdddhhysssssssoooooo+++++++++++++++/////////////////:::::::::///////////+oyhhhyyso++++++++++++++++++++++++++++++++++++++++++++++++++
yyyssssyhddhhhhhhhhhhhyyyhhhhyyyyyyyyyyyyyyyyyhhdmmmmmmmmmNmhhddhhdddddhyysssssssoooooooo+++++++++++++////////////////::::::::---:::://///////+oshhhhyso++++++++++++++++++++++++++++++++++++++++++++++++
yyyssssyhdhhhhhhhhhhhhyyyhhhhyyyyyyyyyyyyyyyyyyhhmmmmmmdmmmmdddhhddddhyysysssssssoooooo++++++++++++++//////////////////::::::------:::://////////oshhhysoo++++++++++++++++++++++++++++++++++++++++++++++
yyyssssyhddhhhhhhhhhhhyyyyhhhyyyyyyyyyyyyyyyyyyhhdmmmmdddddmmmddddddhyyyysssssssooooooo+++++++++++++++/////////////////::::---......--::://///////+oyhhyyso+++++++++++++++++++++++++++++++++++++++++++++
yyyssssyhddhhhhhhhhhhhyyyyhhhyyyyyyyyyyyyyyyyyyyyhdmmdddhhhdddddddhyyyyyyssssssooooooo+++++++++++++++/////////////////:::::---..`....--:::////////+++syhyyys++++++++++++++++++++++++++++++++++++++++++++
yyyssssyhddhhhhhhhhhhhyyyyhhhhyyyyyyyyyyyyyyyyyyyhhddhhhhhhhhddddhyyyyyyssssssoooooo++++++++++++++++//////////////////::::::--.......-:::://///////+++oyyyyyso++++++++++++++++++++++++++++++++++++++++++
yyyssssyyddhhhhhhhhhhhhyyyyhhyyyysssyyyyyyyyyyyyyyhhhhddhhhhddddhyyyyyyssssssooooooo++++++++++++++////////////////////::::::--......--:::://////////++++syyysoo+++++++++++++++++++++++++++++++++++++++++
yyysssssyddhhhhhhhhhhhhyyyhhhhyyyysyyyyyyyyyyyyyyyyyyyhhhhhddddhyyyyyysssssoosooooo+++++++++++++///////////////////////:::::---...---::::://////////+++++ssyyso+++++++++++++++++++++++++++++++++++++++++
yyysssssyddhhhhhhhhhhhhyyyhhhhyyyyyyyyyyyyyyyyyyyyyyyyhhhhhdddhyyyyssssssssooooooooo+++++++++++/////////////////////////::::::-----::::////////+/+++++++++osyso+++++++++++++++++++++++++++++++++++++++++
yyyssssyyddhhhhhhhhhhhhyyyhhhhyyyysyyyyyyyyyyyyyyyyyyyyyyhdddhyyyssssssssssoooooooo++++++++++/++////////////////////////////::-----::://////+++++++++++++++syyso++++++++++++++++++++++++++++++++++++++++
yyysssssyddhhhhhhhhhhhhyyyhhhyyyyysyyyyyyyyyyyyyyyyyyyyyhdddhyyysssssssssooooooooo++++++++++++++///////////////////////////::::::::::///////++++++++++++/++osyyo++++++++++++++++++++++++++++++++++++++++
yyysssssyddhhhhhhhhhhhhyyyyhhhyyyyyyyyyyyyyyyyyyyyyyyyyyhddhyyssssssssoooooooooooo++++++++++////////////////////////////////:::::::///////+++/++++++++++++++oyhs++++++++++++++++++++++++++++++++++++++++
yyyyssssyhdhhhhhhhhhhhhyyyyhhhyyyysyyyyyyyyyyyyyyyyyyyyhdddhysssssssssoooooooooo+++++++++++///////////////////////////////////////////////++++++++++++++++++oyhyo+++++++++++++++++++++++++++++++++++++++
yyyyssssyhddhhhhhhhhhhhyyyhhhhyyyysyyyyyyyyyyyyyyyyyyyyhddhyyssssssssooooooo+++++++++++++++////////////////////////////////////////////+/+++++++++++++++++++oyhho+++++++++++++++++++++++++++++++++++++++
yyyyssssyhdhhhhhhhhhhhhyyyyhhhyyyysyyyyyyyyyyyyyyyyyyyyhddhyssssssssooooooo+++++++++++++++++///////////////////////////////////////////++++++++++++++++++++osyhho+++++++++++++++++++++++++++++++++++++++
yyyyssssyhddhhhhhhhhhhhyyyyhhhyyyyyyyyyyyyyyyyyyyyyyyyyhddhyssssssssoooooo+o+o+++oo++++++++++///////////////////////////////:::::::::///++++++++++++++++++oosyhho+++++++++++++++++++++++++++++++++++++++
yyyyssssyhddhhhhhhhhhdhyyyyhhhyyyysyyyyyyyysyysssssyysyhdhhysssssssoooooooooooooooo++++++++++////////////////////////////////:::::::://////++++++++++++++ooosyhhs+++++++++++++++++++++++++++++++++++++++
yyyyssssyhddhhhhhhhhhhhyyyyhhhyyyyyyyyyyyssssssssssssssyddhyssssssooooooooooooooo++++++++++/////////+////////////////////////:::::::////////+++++++++++oooosyhhhs+++++++++++++++++++++++++++++++++++++++
yyyyssssshddhhhhhhhhhhhyyyyhhhyyyysyyyyyyssssssssssssssyddhysssssooooooooooooooo++++++++++//////////+///////////////////////////////////////+++++++++++oooosyhhhs+++++++++++++++++++++++++++++++++++++++
yyyyssssyydddhhhhhhhhhhyyyyhhhyyyysyyyyyyysssssssssssssydhhyssssooooooooooooooo++++++++++++//////////////+++++////+/////////////////////////++++++++++++oooyyhhhs+++++++++++++++++++++++++++++++++++++++
yyyyssssyyddhhhhhhhhhhhyyyyhhhyyyysyysssyysssssssssssssshhhysssoooooooooooo+++++++++++++++++/////////////+++++///++++/////////////////////////+++++++++++ooshhhho+++++++++++++++++++++++++++++++++++++++
yyyyssssyydddhhhhhhhhhhyyyyhhhyyyyyyyyyyyyssssssssssssssyhhyssooooooooooooo++++++++++++++++++++//////////+++++/+//+/////////////////////////////+++++++++ooshhhho+++++++++++++++++++++++++++++++++++++++
yyyyssssyydddhhhhhhhhhhhyyyyhhhyyyysssyyysssssssssssssssyhhyssoooooooooooooooo+++++++++++++++++++++++////++++++++++++++++++++++++++//////////////+++++++++oshdhyo+++++++++++++++++++++++++++++++++++++++
yyyyssssyyhddhhhhhhhhhhhyyyhhhhyyyyyssyyyyssssssssssssssshdysooooooooooooooooooo++++++o++oooooo+++++++///++++///++++++++++++++++++++++++++++++++++++++++++oshddy++++++++++++++++++++++++++++++++++++++++
yyyyssssyydddhhhhhhhhhhhyyyyhhhyyyyyssyyyysssssssssssssssyhysooooooooooooosssooooooossssssssooooooo++++++++++///+++ooooooooooooooooooooooooo+++++++++++++++ohdhs++++++++++++++++++++++++++++++++++++++++
yyyyyssssydddhhhhhhhhhhhyyyyhhyyyyyyyssyyysssssssssssssssyhhssoooooooooosssssssssyyyyyyyyysssssooooo++++++oo+//+++ooossssyyyyyyyyyyyyssssssoooooooo+++++++oohdyo++++++++++++++++++++++++++++++++++++++++
yyyyyssssydddhhhhhhhhhhhyyyhhhyyyyyyyyyyyysssssssysssssssyhhsooooooooosssssssyyyyyyyyyyyyyyssssoooo++//+++oo+++++oosssyyyyyyyhhhhyyyyyyyyssssssssooooooooooohhso++++++++++++++++++++++++++++++++++++++++
yyyyysssyyhdddhhhhhhhhhhyyyyhhhyyyyyyyyyyyysssssssssssssssyhsoooooooosssssssssssssssssssssooooooo+++////+++o+++++osssyyyyyyyyyyyyyyyyyyyssssysssssoooooooooohhs+++++++++++++++++++++++++++++++++++++++++
yyyyyssssyhddhhhhhhhhhhhyyyyhhhyyyyssyyyyyysssssssssssssssyysoo+ooooosssooooo+++++ooooooooooo++++++//////+++++++osssyssssssyssssssoooooossssssssssssooooo++oyyo+++++++++++++++++++++++++++++++++++++++++
yyyyyssssyhddhhhhhhhhhhhyyyyhhhyyyyyyyyyyyyyssssssssssssssyyooo+++ooooooo++ooooosyyyyyyysssssooo++++////++++++oossyyyysyyyyssssyyhhhhyyssssssssssssssooo+++ooo++++++++++++++++++++++++++++++++++++++++++
yyyyyssssyhddhhhhhhhhhhhyyyyhhhyyyyyyyyyyyyyssssssssssssoossoo+++++o+oo++oosss++yhhhhdhhyooossoooooo++++++++++ossyhhyyyyyyssooyhhhddddhyyyyyysssssssssoo++++++++oo++++++++++++++++++++++++++++++++++++++
yyyyysssyyhdddhhhhhhhhhhyyyyhhhyyyyyyyyyyyyssssssssssssso+oooo++++++++++oossso+/syyyyhhhyoosssssooooo++++/////+osyhhyyyyyyysooyhhyddddhyyhhhhyyssyssssoo++++++osss++++++++++++++++++++++++++++++++++++++
yyyyyssssyhdddhhhhhhhhhhyyyyhhhyyyyyyyyyyyysssssyyyssssso+oooo+++++++++oooooooo++osyhhhysossssssoooooo+++///::/osyhhyyyyyyysssyhhhddhyysyyhhhhyyyyyssooo++++osyyso++++++++++++++++++++++++++++++++++++++
yyyyyssssyhddddhhhhhhhhhyyyyhhhyyyyyyyyyyyysssssyyyssssso+oooo++++++oooooooooo++++oooooooooosssooossoo+++///::/+oyhhhyyyyssssossssyysssssyyyyyyyyyssooooo+++oyyysoo++++++++++++++++++++++++++++++++++o++
yyyyyysssyhdddhhhhhhhhhhyyyyhhhyyyyyyyyyyyyyyssssssssssss+oooo++++oooooooooo++++++++++++ooooooooosssoo+++//:-::/+syhhyyyyysssoooosssssssssssssssooo++++++++oosyysooo+++++++++++++++++++++++++++++o++o+++
yyyyyysssyyddddhhhhhhhhhyyyyhhhyyyyyyyyyyyyyyyysssssssssso+oooo+++ooooooo+++++++++++++++oooooooosssoooo++//:--:/+osyhyyyyssssssoooossssssooo+++++++++++++ooooosssoo++oo+++oo+++++++++++++++++++ooo+ooo++
yyyyyysssyydddhhhhhhhhhhyyyyhhhhyyyyyyyyyyyyyyyyysssssssssoooooo++++oooo++++++++++++++++++++ooooooooooo++//:-://+++oyyyyyssssssssooooooo++++++///////++++oooooooooo+ooooo++++++++++++++++o++++ooo+++oooo
yyyyyysssyydddhhhhhhhhdhhyyyhhhyyyyyyyyyyyyyyyyyysysssssssoooooo+++++ooooooo++++++++++++++++ooooooooooo++//::://++++osyssssssssoooooooo++++////:://///+++oooooooooo+o+ooo+oo++++ooo++o+oooooooooo++++ooo
yyyyyysssyydddhhhhhhhhddhyyyhhhyyyyyyyyyyyyyyyyyyyssssssssssoooo+++++++oooooooo+++++++++++ooooooooooooo++//::://++++++ossssssssooooo++++///::::::////++++ooooooooooooooooooo+o++ooooooooooo+oooooooooooo
yyyyyysssyyddddhdhhhhhhdhyyhhhhhyyyyyyyyyyyyyyyyyysyssssssssoooo++++++++++ooooooo+++++++++o++++oooooooo++//::://///+++++o+++++++////////::::::://////++++oooo+++oooooooooooooooooooooooooooooooooooooooo
yyyyyysssyyhddddhhhhhhhdhyyyhhhhyyyyyyyyyyyyyyyyyyyyssssssssoooo+++++++/+++++++++++ooooo++++++++ooooooo++///:::////+++++++/////:::::////////////////+++++ooo++oooooooooooooooooooooooooooooooooooooooooo
yyyyyysssyyhdhhddhhhhhhdhyyyhhhhyyyyyyyyyyyyyyyyyyyyssssssssoooo+++++//+++++++++++oooo++++++++++ooooooo+++//::::///+++++++/////:::::::////////++++++++++oooo+++ooooooooooooooooooooooooooooooooooooooooo
yyyyyysssyyhddhhddhhhhhdhyyyhhhhyyyyyyyyyyyyyyyyyyyyysssssssoooo++++//+++++++++++++++++++++///+ooooooo++++///:::://++++ooo++/////::::::///////++++++++++ooooo+++oooooooooooooooooooooooooooooooooooooooo
yyyyyysssyyhddddddhhhhhdhhyyhhhhyyyyyyyyyyyyyyyyyyyyysssssssoooo++++++++++++++++++++++++/////+ooooooo++++/////:://////+oss+++/////////////////+++++++++oooooo++ooooooooooooooooooooooooooooooooooooooooo
yyyyyysssyyhddddddhhhhhdhyyyhhhhyyyyyyyyyyyyyyyyyyyyyyssssssoooo++++++++++++++++++++++///////+ooooo++++++////////+++++++oso++/////////////////+++++++++ooosoo++ooooooooooooooooooooooooooooooooooooooooo
yyyyyysssyyhdddddddhhdddhhyyhhhhhyyyyyyyyyyyyyyyyyyyyyysssssooooo++++++++++++++//////////////++++++++++///////+++++++ooooso++////////////////+++++++++oooosooooooooooooooooooooooooooooooooooooooooooooo
yyyyyysssyyhddddddhhhhddhhyyhhhhhyyyyyyyyyyyyyyyyyyyyyysssssooooo++++++++++//////////////////++++++++////////+++oooooooosoo+++////////////+++++++++++ooooooooooooooooooooooooooooooooooooooooooooooooooo
yyyyyyyssyyhddddddhhdhhdhhyhhhhhhyyyyyyyyyyyyyyyyyyyyyyyysyyssooo++++++++///////////////////++++++++++//////+++osssssssssooo+++///////+++++++++++++ooooooossoooooooooooooooooooooooooooooooooooooooooooo
yyyyyyyssyyhdddddddhhdddhhyyhhhhhyyyyyyyyyyyyyyyyyyyyyyyssyyysoooo++++++///////////////////++++ooooo++++/+++++oosyyyysooooooo+++////++++++++++++ooooooooosssoooooooooooooooooooooooooooooooooooooooooooo
yyyyyyyssyyhdddddddhhddddhyhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyssooo++++++///////////////++++++ooooooo+++++++++osssyyyysoooooooo+++///++++++++++ooooooooooosssoooooooooooooooooooooooooooooooooooooooooooo
yyyyyyyssyyhddddddhhhddddhyyhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyysooo++++++/////////////+++++++oooooooooooooo++oosyyyyyssssooossooo+++++++++++oooooooooooooossooooooooooooooooooooooooooooooooooooooooooooo
yyyyyyyssyyhdddddddddhdddhyhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyysooo++++++///////////+++++++ooooooooooooooooooosssyyssssssssssssssso++++++++ooooooooooooossssooooooooooooooooooooooooooooooooooooooooooooo
yyyyyyyssyyyddddddddhddddhyhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyysoo++++++//////////++++oooooooossosooooossssooossssssssssssssssssssoo++++++oooooooooooosssssooooooooooooooooooooooooooooooooooooooooooooo
yyyyyyysssyydddddddddddddhyyhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyysso++++/+/////////++ooooooooooossoooooosssssooooosssssssssossssssssso+++++++ooooooooooossssoooooooooooooooooooooooooooooooooooooooooooooo
yyyyyyysssyydddddddddhhddhyyhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyysoo++++++////////+oooooo++++++++oo++++osooooooooooooooooosssssoooooo+++++++ooooooooooossssoooooooooooooooooooooooooooooooooooooooooooooo
yyyyyyysssyydddddddddddddhhhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyso++++++////////++oooooooo++++++++++++++++++++ooooossssyyyyyssooooo+++++++oooooooooossssooooooooooooooooooooooooooooooooooooooooooooooo
yyyyyyyssyyydddddddddddddhyhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyys++++++/////////++ooooooooooooooooooooooooossssyyyyyyyyssssssooooo++++++ooooooooosssyysooooooooooooooooooooooooooooooooooooooooooooooo
yyyyyyyyssyydddddddddddddhyyhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyo+++++/////////+++ooo+++++++++ooooooooooossssooooooooooosssssooo+++++++ooooossssssyysoooooooooooooooooooooooooooooooooooooooooooooooo
yyyyyyyyssyydddddddddddddhyyhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyso++++/+////////+++o++++++++////+++++++++++++++++++++++ooooosooo++++++ooooossssssyysooooooooooooooooooooooooooooooooooooooooooooooooo
yyyyyyyyssyydddddddddddddhhhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyso+++++///////++++++++++////////+++oooooooo+ooooooo+++++ooosssoo++++ooooossssssyyysooooooooooooooooooooooooooooooooooooooooooooooooo
yyyyyyyyssyyhddddddddddddhhhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyysso++++/////++++ooo+++//////////+++ooooooooooooooooo+++oooossssoooooooosssssyyyyysoooooooooooooooooooooooooooooooooooooooooooooooooo
hyyyyyyyssyyhddddddddddddhhhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyysoo+++++++++++oooo++///////////++++ooooooooooooooooooooosssyyssooooossssssyyyyysooooooooooooooooooooooooooooooooooooooooooooooooooo
hyyyyyyyssyyhddddddddddddhhyhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyssooo+++++++++oooooo++++++++++++++++oooooooooooooooooosssyyyyyssssssssssyyyyyyyoooooooooooooooooooooooooooooooooooooooooooooooooooo
hyyyyyyyssyyhdddddddddddddhyhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyysoooo+++++++ossssssssoooo++++ooooooooooooooooooooosssssyyhhyyyssssssyyyyyyyyysoooooooooooooooooooooooooooooooooooooooooooooooooooo
hyyyyyyysssyhddddddddhdddhhyhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyysoooooooooooossssyyyysssssssooooooooo++ooooooosssssssyyyhhhhhhyyyyyyyyyyyyyyssoooooooooooooooooooooooooooooooooooooooooooosooooooo
hyyyyyyyssyyhdddddddddddddhhhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyysoooooooooosssyyyyyyyyyyssssooooooooooo++oooosssssyyyyyhhhhhhhhyyyyyyyyyyyyyysssoooooooooooooooooooooooooooooooooooooooooooooooooo
hyyyyyyysssyhdddddddddddddhhhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyysooo+ooooooossyyyyyyyyyysssssoooooooooo++ooosssssyyyyyhhhhhddhhyyyyyyyyyyyyyyhhyssoooooooooooooooooooooooooooooooooooooooooooooooo
dyyyyyyyssyyhdddddddddddddhhhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyhyo+ooooooooooooyyhyyyyyyssssssoooooooooooosssyyyyyyyyhhhddddhyyyyyyyyyyyyyssoshhysssoooooooooooooooooooooooooooooooooooooossooooos
dyyyyyyyssyyhdddddddddddddhhhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyhhhhhyo+++++ooooooooosyyyyyyyssssssssooooosssosssyyyyyyhhyhddddhyyyyyyyyysssyyssssooydhyssssssooooooooooooooooooooooooooooooooosssossos
dyyyyyyyyssyydddddddddddddhhhhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyhhhhhhhhys++++++++oooooooossyyyyyyyyyysyysyssysssyyyyyyyyhhhhddhhyyyyyyyyysssssyyssssooohmdsssyyyssssoooooooooooosooooosoooooooooossssssss
dyyyyyyyyssyydddddddddddddhyhhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyhhhhhhhhhhhhso+++++++++ooooooosssyyyyyhhyyyyyyyyyyyyyhhhhhhhhdddhhyyyyyyyyssssssssssssoooo+sdmyssyyyyyysssssssssoossoooooooosssoooooossssssss
dyyyyyyyysyyydddddddddddddhhyhhhhhhhyyyyyyyyyyyyyyyyyhhhhhhhhhhddhhhhhhsoo+++o++++++oooooosssssyyyyyyyyyyyyyyyyyhhhhhhhhhhyyyyyyyyssssssssssssssoooooooddyyysyyyyyyyyyyssssssssooosssoosssooosoossssssss
dyyyyyyyyyyyyhddddddddddddhhhhhhhhhhyyyyyyyyyyyyyhhhhhhhhhhhhhhdhhhhyhhsoo++++++++++ooooooooossssssysysssysssyyyyhhhhhyyyyyyyyyysssssssssssssssoooooooshhsyyysyysssyyyyyyyyysssssssssooossoosssssssssssy
myyyyyyyysyyydddddddddddddhhhhhhhhhhyyyyyyhhhhhhhhhhhhhhhhhhhhddhhhhyyhyooo+++++++++++ooooooooooooossssssssssyyyyyyyyssssssssssssssssssssssssoooooooo+shyyyyysyyssssyyysssyyssyyssssssssssssosssssssssyy
mhyyyyyyyyyyydddddddddddddhhhhhhhhhhhhhhhhhhhhhhhhhdddhhhhhhhdddhhhhyyhyooo+++++++++++ooooo++++++++ooooooooossssssssssssssssssssssssossssssssoooooooooyyyyyyssyysssssyhyssssssssssssssssssssssssssssyyyy
mhyyyyyyysyyyhddddddddddddhhhhhhhhhhhhhhhhhhhhhddhdddhhhhhhhhdddhhhhyyhhyo++++++++++++++++++++++++++++++++ooooooosssssssssssssssoosoooossssoooooooooosyyyyyysyysssssysydhyssyyyssssssssssssssssssssyyyyy
mhyyyyyyyyyyyhdddddddhhdhhhhhhhhhhhhhhhhhhhhhhddddddhhhhhhhhddddhhhhyyyhhyo+++++++++++++++++++++++++++++++++ooooossssssssssssosoooooooossoooooooooosssyyyyyyyyysssssysshdhyssyyyyyyssssssssssssssssyyyyy
mhyyyyyyyyyyyhddddhhhhhhhhhhhhhhhhhhhhhhhhhhddddddddhhhhhhhhddddhhhhyyyyyhysoo+++++++++++++++++++++++++++++oooossssssoooooooooooooooosooooooooooosssyyyhyyyyyyyssssyyyyshdhyssyyyyyyysssssssssssssssyyyy
mhhyyyyyyyyyhhhhhhddhhhdddhhhhddddddhhhhhhdddddddddhhhhhhhhdddddhhhhyyyyyyhhyyo++++++++++++++++++++++++++oooooooooooooooooooooooooooosoooooooooosssyyyyyyyyyyysssssyyyysyhdhyyssyyyyyyyyyyyyyyyyyyysssss
mhyyyyyyhhhhhhhhhhhhhhdddddhhhdddddddhhhhddddddddhhhhhhhhhdddhddhhhhyyyyyyyhhhhyo++++++++++++++++++++++++ooooooooooooooooooooooooooooooooooooosssyyyhhyyyyyyyyssssssyyyysyhdhhyssyyyyyyyyyysyyyyyyyyyyys
mhhhhhhhhhhhhhdddhhhhdddddhhhhddddddhhhhddddddddhhhhdhhhhhddhhhdhyhhhyyyyyyyyhhhhyso++++++++++++++++++++oooooooooooooo+++++++++oooooooooosssssyyyhhhhyyyyyyyyysssssyyyyyysyddhhyssyyyyyyyyyyyyyyyyyyyyyy
dhhhhhhhhhhhhdddhhhhddddddhhhhdddddhhhhhddddddddhhhhhhhhhhdhhhhddhyhhhhyyyyyyyyyhhhhyssooo++++++++++++++++oooooooooo+++++++++oooooosssssssyyyyyhhhhhyyyyyyyyyyyssssyyyyyyyyhdhhhyyssyyyyyyyyyyyysyyyyyyy
hhhhddhhhdhhhddhhhhdddddhhhhhdddddhhhhhddddddhhhhhhhhhhhhddhhyhddhhyhhhhyyyyyyyyyyhhhhhhyyssoo+++++++++++++ooooooooo++++++++ooosssssyyyyyyyyyhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyhddhhyyysyyyyyyyyyyyyyyyysys
hhhdddhhdhhhhddhhhdddddddhhhhdddhhhhhhddddddhhhhhhhhhhhhhhdhhyhdddhhyyhhhyyyyyyyyyyyyyhhhdhhhyyssooooooooooosooooooooooooooosssyyyyyyyyyyhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyhddhhyyyyyyyyyyyyyyyyyyyyys
hhdddhhhhhhdddhhhddddddddhhhhhdhhhhhhhddddhhhhhhhhhhhhhhhhhhhyyhddhhhyhhhhhhyyyyyyyyyyyyhhhhhdddhdhhhyyyyyyyyyyyyyyyssyyyyyyyyyyyyyyyyhhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyydddhhyyyyyyyyyyyyyyyyyyyyy
hddddhhhhhdddhhhhddddddddhhhhhhhhddhhhddddhhhhhhhhhhhhhhhhhhhyyhdddhhhhhhhhhhhyyyyyyyyyyyyyhhhhhhhhddddddddddddddhhhhyyyyyyyyyyyyhhhhhhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyydddhhyyysyyyyyyyyyyyyyyyy
ddddhhhhhhdddhhhhddddddddhhhhhhhdddhhdddddhhhhhhhhhhhhhhhhhhhhyhhdddhhhhhhhhhhhhhhyyyyyyyyyyyyyyhhhhhhhhhhhhhhhhhhhhyyyyyyyyhhhhhhhhhhhhhyhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyhdddhhyyyyyyyyyyyyyyyyyyy
ddddhdhhhdddhhhhhddddddddddhhhhddddhhdddddhhhhhhhhhhhhhhhhhhhhyhhdddddhhhhhddhhhhhhhyyyyyyyyyyyyyyyyyhhhhhhhhhhhhhhhhhyhhhhhhhhhhhhhhhhhyhhhhyyyyyyyyyyyyysyyyyyyyyyyyyyyyyyyyyhddddhyyyyyyyyyyyyyyyyyyy
dddddhhhddddhhhhdddddddhddhhhhhddddhhdddddhhhhhhhhhhhhhhhhhhhhyhhhddhhhhhyhhdddddhhhhhhhhhhhyyhyyyyyyyyyyyyyyyhyyyhyyhhhhhhhhhhhhhhhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyhdddhhyyyyyyyyyyyyyyyyyy
ddddhhhhddddhhhhddddddhhhhhhhhdddddhhdddddhhhhhhhhhhhhhhhhhhhhhhhhddhhhhhyyhhdddddhhhhhhhhhhhhhhhhhhyyyyyyyyyyhyyhhhhhhhhhhhhhyhhhhhhhyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyhddddhhyyyyyyyyyyyyyyyyy
-->

</html><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 109');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHead($_args)
	{
		
	}


	function blockHeader($_args)
	{
		extract($_args);
?>
        <header class="bg-danger text-center text-white">
            <!-- Desktop Navbar -->
            <nav class="navbar navbar-expand-sm bg-danger text-white d-none d-md-flex">
                <!-- Brand -->
                <a class="navbar-brand text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>"><img src="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 30 */ ?>/images/logoMini.png" class="brandLogo"></a>

                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>"><i class="fas fa-home"></i> Domů</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:howItWorks")) ?>"><i class="fas fa-book"></i> Jak to funguje?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:faq")) ?>"><i class="fas fa-question"></i> FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:download")) ?>"><i class="fas fa-download"></i> Ke Stažení</a>
                    </li>
                </ul>
                <!-- Dropdown -->
                <ul class="navbar-nav ml-auto">
<?php
		if ($user->isLoggedIn()) {
?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown"><i class="fas fa-user"></i> <?php
			echo LR\Filters::escapeHtmlText($user->getIdentity()->username) /* line 51 */ ?></a>
                        <div class="dropdown-menu dropdown-menu-right bg-danger text-center">
<?php
			if ($user->isAllowed('List', 'default')) {
				?>                            <a class="dropdown-item text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:default")) ?>"><i class="fas fa-list-ul"></i> Seznam Stezek</a>
                            <hr> 
<?php
			}
			if ($user->isAllowed('List', 'addTour')) {
				?>                            <a class="dropdown-item text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:addTour")) ?>"><i class="far fa-plus-square"></i> Přidat Stezku</a>
                            <hr> 
<?php
			}
			if ($user->isAllowed('List', 'users')) {
				?>                            <a class="dropdown-item text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("List:users")) ?>"><i class="fas fa-list-ul"></i> Seznam Editorů</a>
                            <hr> 
<?php
			}
			if ($user->isAllowed('Sign', 'up')) {
				?>                            <a class="dropdown-item text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:up")) ?>"><i class="far fa-plus-square"></i> Přidat Editora</a>
                            <hr> 
<?php
			}
			?>                            <a class="btn btn-danger login-button" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) ?>"><i class="fas fa-sign-in-alt"></i> Odhlásit se</a>
                        </div>
                    </li>
<?php
		}
?>
                </ul>
            </nav>
            <!-- End Desktop Navbar -->

            <!-- Mobile Navbar -->
            <nav class="navbar bg-danger text-center text-white d-md-none">
                <!-- Dropdown -->
                <a class="nav-link navbar-toggle text-white btn login-button" href="#" data-toggle="collapse" data-target="#myNavbar"><i class="fas fa-bars"></i></a>

                <div class="collapse navbar-collapse text-center" id="myNavbar">
                    <!-- Links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>"><i class="fas fa-home"></i> Domů</a>
                        </li>
                        <hr class="menuhr">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:howItWorks")) ?>"><i class="fas fa-book"></i> Jak to funguje?</a>
                        </li>
                        <hr class="menuhr">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:faq")) ?>"><i class="fas fa-question"></i> FAQ</a>
                        </li>
                        <hr class="menuhr">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="https://play.google.com/store" target="_blank"><i class="fas fa-download"></i> Stáhnout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Mobile Navbar -->
            <div class="bg-danger container-fluid">
                <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 105 */ ?>/images/logoRed.png" class="head-logo img-responsive">
            </div>
        </header>
<?php
	}


	function blockFooter($_args)
	{
?>        <footer class="footer bg-danger text-center text-white">
            <span><i class="fas fa-users"></i> <a href="https://github.com/Garttox" target="_blank" class="text-white">Michal Trlica</a> & <a href="https://github.com/Drag0n0idus" target="_blank" class="text-white">Richard Míček</a> &copy; 2018</span>
        </footer>
<?php
	}


	function blockScripts($_args)
	{
		extract($_args);
?>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://nette.github.io/resources/js/netteForms.min.js"></script>
        <!--<script src="<?php echo LR\Filters::escapeHtmlComment($basePath) /* line 120 */ ?>/js/main.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 125 */ ?>/js/nette.ajax.js"></script> 
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 126 */ ?>/js/main.js"></script>
        <script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var qr = button.data('whatever'); // Extract info from data-* attributes
  var name = button.data('name');
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-title').text(name);
  modal.find('.modal-body').html('<img src="' + qr + '">');
})
$('#exampleModal2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var text = button.data('whatever'); // Extract info from data-* attributes
  var name = button.data('name');
  var img = button.data('img');
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-title').text(name);
  modal.find('.text-body').text(text);
  modal.find('.image-body').html('<img src="' + img + '">');
})
</script>
<?php
	}

}
