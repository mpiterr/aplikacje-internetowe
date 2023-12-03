<?php
/* Smarty version 4.3.4, created on 2023-12-03 12:56:19
  from 'C:\xampp\htdocs\amelia\app\views\Kalkulator.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_656c6ce30bf342_91904454',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ae1c798c633591f3694016691a0f8d5cfe156d8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\amelia\\app\\views\\Kalkulator.tpl',
      1 => 1701604567,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656c6ce30bf342_91904454 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1786176727656c6ce30a8c42_74716481', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_1786176727656c6ce30a8c42_74716481 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1786176727656c6ce30a8c42_74716481',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calc" method="post">

			<label for="amount">Kwota kredytu: </label>
			<input id="amount" type="text" name="kwotakredytu" value="<?php echo $_smarty_tpl->tpl_vars['data']->value->kwotakredytu;?>
"><br /><br />
			<label for="duration">Lata: </label>
			<input id="duration" type="text" name="okreskredytu" value="<?php echo $_smarty_tpl->tpl_vars['data']->value->okreskredytu;?>
"><br /><br />
			<label for="interest">Oprocentowanie [%]: </label>
			<input id="interest" type="text" name="oprocentowanie" value="<?php echo $_smarty_tpl->tpl_vars['data']->value->oprocentowanie;?>
"><br /><br />
			<button type="submit">Wylicz</button>
	</form>

	<div class="messages">
		<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
			<h4>Wystąpiły błędy: </h4>
			<ol class="err">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
				<li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ol>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
			<h4>Informacje: </h4>
			<ol class="inf">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
				<li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ol>
		<?php }?>
		<?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
			<h4>Wynik</h4>
			<p class="res"><?php echo round($_smarty_tpl->tpl_vars['result']->value,2);?>
</p>
		<?php }?>
	</div>
<?php
}
}
/* {/block 'content'} */
}
