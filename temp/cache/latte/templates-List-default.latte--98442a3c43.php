<?php
// source: D:\stranky\www\android-project-server\app\presenters/templates/List/default.latte

use Latte\Runtime as LR;

class Template98442a3c43 extends Latte\Runtime\Template
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
		if (isset($this->params['row'])) trigger_error('Variable $row overwritten in foreach on line 3');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
    <table class="table table-bordered">
<?php
		$iterations = 0;
		foreach ($data as $row) {
?>
            <tr>
                <td><?php echo LR\Filters::escapeHtmlText($row['title']) /* line 5 */ ?></td>
                <td><?php echo LR\Filters::escapeHtmlText($row['author']) /* line 6 */ ?></td>
            </tr>    
<?php
			$iterations++;
		}
?>
    </table>

    
<?php
	}

}
