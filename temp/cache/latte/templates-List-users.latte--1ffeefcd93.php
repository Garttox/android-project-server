<?php
// source: D:\www\android-project-server\app\presenters/templates/List/users.latte

use Latte\Runtime as LR;

class Template1ffeefcd93 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'_usersListContainer' => 'blockUsersListContainer',
	];

	public $blockTypes = [
		'content' => 'html',
		'_usersListContainer' => 'html',
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
		if (isset($this->params['id'])) trigger_error('Variable $id overwritten in foreach on line 12');
		if (isset($this->params['row'])) trigger_error('Variable $row overwritten in foreach on line 12');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">       
            <table class="table">
                <thead>
                    <th>Uživatelské jméno</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Akce</th>
                </thead>
                <tbody>
                    <div<?php echo ' id="' . htmlSpecialChars($this->global->snippetDriver->getHtmlId('usersListContainer')) . '"' ?>>
<?php $this->renderBlock('_usersListContainer', $this->params) ?>
                    </div>
                </tbody>
            </table>  
</div>
<?php
	}


	function blockUsersListContainer($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("usersListContainer", "static");
		?>                        <?php
		$iterations = 0;
		foreach ($data as $id => $row) {
?>

                            <div class="table"<?php echo ' id="' . htmlSpecialChars($this->global->snippetDriver->getHtmlId("row-$id")) . '"' ?>>
<?php
			$this->global->snippetDriver->enter("row-$id", "dynamic");
			?>                                <td><?php echo LR\Filters::escapeHtmlText($row['username']) /* line 14 */ ?></td>
                                <td><?php echo LR\Filters::escapeHtmlText($row['email']) /* line 15 */ ?></td>
                                <td><?php echo LR\Filters::escapeHtmlText($row['role']) /* line 16 */ ?></td>
                                <td>
                                    <a class="btn btn-primary ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("role!", [$id])) ?>">Change role</a>
                                </td>
<?php
			$this->global->snippetDriver->leave();
?>                            </div> 
<?php
			$iterations++;
		}
		$this->global->snippetDriver->leave();
		
	}

}
