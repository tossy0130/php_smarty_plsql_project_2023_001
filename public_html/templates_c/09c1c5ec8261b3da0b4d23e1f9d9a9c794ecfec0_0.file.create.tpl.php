<?php
/* Smarty version 4.3.2, created on 2023-08-23 16:32:37
  from '/home/xs810378/smarty_p_01/templates/create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_64e5b615e1c4d4_45295082',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09c1c5ec8261b3da0b4d23e1f9d9a9c794ecfec0' => 
    array (
      0 => '/home/xs810378/smarty_p_01/templates/create.tpl',
      1 => 1692775077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64e5b615e1c4d4_45295082 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <title>インサートページ</title>
</head>
<body>
    <h1>Smarty CURD APP インサート</h1>

    <form action="./create.php" method="post">

        <label>名前:</label>
        <input type="text" name="name" required>

        <lable>メール：</label>
        <input type="mail" name="email" required>

        <input type="submit" value="データ挿入"> 

    </form>

    <a href="./index.php">一覧画面へ</a>

</body>
</html><?php }
}
