<?php
/* Smarty version 4.3.2, created on 2023-08-23 16:25:45
  from '/home/xs810378/smarty_p_01/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_64e5b479d36e37_11198034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42be16149a2f59d4d9574210d3b400ee44cb7833' => 
    array (
      0 => '/home/xs810378/smarty_p_01/templates/index.tpl',
      1 => 1692775540,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64e5b479d36e37_11198034 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <title>Main index</title>



</head>
<body>
    <h1>Smarty CURD APP</h1>
	
    <table>
     <tr>
     <th>ID</th>
     <th>名前</th>
     <th>メール</th>
     </tr>

     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['get_user']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?> 
	<tr>
	   <td><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>

       <span class="i_btn"><a href="delete.php?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">削除</a></span>
       <span class="i_btn"><a href="edit.php?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">変更</a></span>
       </td>
	   <td><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</td>
	   <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
	</tr>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </table>	
	
      <span class="i_btn"><a href="./create.php">データ挿入</a></span>
      
</body>
</html>

<?php }
}
