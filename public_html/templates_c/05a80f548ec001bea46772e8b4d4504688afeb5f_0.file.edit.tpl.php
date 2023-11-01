<?php
/* Smarty version 4.3.2, created on 2023-08-23 17:13:28
  from '/home/xs810378/smarty_p_01/templates/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_64e5bfa8ae7001_28193393',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05a80f548ec001bea46772e8b4d4504688afeb5f' => 
    array (
      0 => '/home/xs810378/smarty_p_01/templates/edit.tpl',
      1 => 1692778407,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64e5bfa8ae7001_28193393 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <title>インサートページ</title>
</head>
<body>
    <h1>Smarty CURD APP アップデート</h1>

    <form action="./update.php" method="post">

        <label>名前:</label>
        <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['id_user']->value['name'];?>
" required>

        <lable>メール：</label>
        <input type="mail" name="email" value="<?php echo $_smarty_tpl->tpl_vars['id_user']->value['email'];?>
" required>

        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id_user']->value['id'];?>
">

        <input type="submit" value="データ"> 

    </form>

    <a href="./index.php">一覧画面へ</a>

</body>
</html><?php }
}
