<?php
// source: C:\xampp\htdocs\android-project-server\app\presenters/templates/List/default.latte

use Latte\Runtime as LR;

class Template20c1e2bc48 extends Latte\Runtime\Template
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
		if (isset($this->params['row'])) trigger_error('Variable $row overwritten in foreach on line 22');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
    <div class="container">
        <h1>
            <ul>
                <li>
                    Zelí
                </li>
                <li>
                    Brambory
                </li>
                <li>
                    Mléko
                </li>
                <li>
                    Chleba
                </li>
            </ul>
        </h1>
    </div>

    <table class="table table-bordered">
<?php
		$iterations = 0;
		foreach ($data as $row) {
			if ($row['published'] == "yes") {
?>
                <tr>
                    <td><?php echo LR\Filters::escapeHtmlText($row['title']) /* line 25 */ ?></td>
                    <td><?php echo LR\Filters::escapeHtmlText($row['author']) /* line 26 */ ?></td>
                </tr>
<?php
			}
			elseif ($row['published'] == 'no' && $user->isInRole('admin')) {
?>
                <tr>
                    <td><?php echo LR\Filters::escapeHtmlText($row['title']) /* line 30 */ ?></td>
                    <td><?php echo LR\Filters::escapeHtmlText($row['author']) /* line 31 */ ?></td>
                    <td><?php echo LR\Filters::escapeHtmlText($row['published']) /* line 32 */ ?></td>
                </tr>
<?php
			}
			$iterations++;
		}
?>
    </table>
    {}

    
<?php
	}

}
