<?php
/* Smarty version 4.3.2, created on 2023-10-31 17:22:40
  from 'C:\xampp\htdocs\smarty_p_01\templates\upload.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6540b95035ef40_68428959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2717beab6eb42ae1849b5875632da89cdae36528' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smarty_p_01\\templates\\upload.tpl',
      1 => 1698740326,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6540b95035ef40_68428959 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
  <title>画像アップロード</title>
</head>
<body>
  <h1>画像をアップロード</h1>
  <form action="./upload.php" method="post" enctype="multipart/form-data">
    <label for="image">画像ファイルを選択:</label>
    <input type="file" name="image" id="image" accept="image/*">
    <br>
    <input type="submit" value="アップロード">
  </form>
</body>
</html>
<?php }
}
