<?php
// source: D:\www\aa\app\presenters/templates/List/default.latte

use Latte\Runtime as LR;

class Templatecade594323 extends Latte\Runtime\Template
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
		if (isset($this->params['row'])) trigger_error('Variable $row overwritten in foreach on line 11');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
    <div class="container">
        <table class="table table-hover text-center">
            <thead class="thead-dark">
                <th>ID</th>
                <th>Název</th>
                <th>Autor</th>
                <th>Možnosti</th>
            </thead>
            <tbody>
<?php
		$iterations = 0;
		foreach ($data as $row) {
			if ($row['author'] == $user->getIdentity()->username) {
?>
                    <tr class="table-info">
<?php
			}
			else {
?>
                    <tr>
<?php
			}
			?>                        <td class="align-middle"><?php echo LR\Filters::escapeHtmlText($row['id']) /* line 17 */ ?></td>
                        <td class="align-middle"><?php echo LR\Filters::escapeHtmlText($row['title']) /* line 18 */ ?></td>
                        <td class="align-middle"><?php echo LR\Filters::escapeHtmlText($row['author']) /* line 19 */ ?></td>
                        <td class="align-middle">
<?php
			if ($user->isInRole('admin')) {
				if ($row['published'] == 'yes') {
?>
                                <a class="btn btn-success" href="#"><i class="fas fa-check"></i> Zveřejnit</a>
                            
<?php
				}
				elseif ($row['published'] == 'no') {
?>
                                <a class="btn btn-danger" href="#"><i class="fas fa-times"></i> Stáhnout</a>
<?php
				}
			}
			elseif ($row['author'] != $user->getIdentity()->username) {
?>
                            <i>Nejste autorem této stezky, nemůžete provádět úpravy.</i>
<?php
			}
			if ($user->isInRole('admin') || ($user->isInRole('editor') && $row['author'] == $user->getIdentity()->username)) {
?>
                            <a class="btn btn-warning" href="#"><i class="fas fa-edit"></i> Upravit</a>
<?php
			}
?>
                        
                            <a class="navbar-toggler btn btn-primary" data-toggle="collapse" data-target="#navbar<?php
			echo LR\Filters::escapeHtmlAttr($row['id']) /* line 35 */ ?>">
                                Více
                            </a>
                        </td>
                    </tr>
                    <tr class="collapse navbar-collapse" id="navbar<?php echo LR\Filters::escapeHtmlAttr($row['id']) /* line 40 */ ?>">
                            <th colspan="2">HAHA</th>
                            <td colspan="2">HAHA</td>
                    </tr>
<?php
			$iterations++;
		}
?>
            </tbody>
        </table>
    </div>   
<?php
	}

}
