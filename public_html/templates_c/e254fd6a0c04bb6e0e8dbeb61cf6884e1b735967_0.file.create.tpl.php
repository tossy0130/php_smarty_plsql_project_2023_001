<?php
/* Smarty version 4.3.2, created on 2023-10-31 17:07:15
  from 'C:\xampp\htdocs\smarty_p_01\templates\create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6540b5b32910b7_41157395',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e254fd6a0c04bb6e0e8dbeb61cf6884e1b735967' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smarty_p_01\\templates\\create.tpl',
      1 => 1698736897,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6540b5b32910b7_41157395 (Smarty_Internal_Template $_smarty_tpl) {
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
