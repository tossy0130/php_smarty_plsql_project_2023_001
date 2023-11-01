<?php
/* Smarty version 4.3.2, created on 2023-10-31 17:25:54
  from 'C:\xampp\htdocs\smarty_p_01\templates\upload_ok.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6540ba127f2ad9_36993993',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3077482562b8b8f17e2cce117671a48492a44a7d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smarty_p_01\\templates\\upload_ok.tpl',
      1 => 1698740749,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6540ba127f2ad9_36993993 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
  <title>アップロード結果</title>
</head>
<body>
  <h1>画像アップロード結果</h1>
  <?php if ((isset($_smarty_tpl->tpl_vars['image_path']->value))) {?>
    <p>画像がアップロードされました。</p>
    <img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
" alt="Uploaded Image">
  <?php } else { ?>
    <p>アップロードに失敗しました。</p>
  <?php }?>
  <p><a href="./upload.php">別の画像をアップロード</a></p>
</body>
</html>
<?php }
}
