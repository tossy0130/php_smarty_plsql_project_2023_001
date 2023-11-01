<?php
/* Smarty version 4.3.2, created on 2023-11-01 16:25:06
  from 'C:\xampp\htdocs\smarty_p_01\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6541fd5244f266_59196959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9628549d44ece2187cd4992bdbea9d83231f74d5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smarty_p_01\\templates\\index.tpl',
      1 => 1698823500,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6541fd5244f266_59196959 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <title>Main index</title>


       <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            background-color: #0074c2;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0074c2;
            color: #fff;
        }

        .i_btn {
            margin: 0 5px;
        }

        a {
            text-decoration: none;
            color: #0074c2;
        }

        a:hover {
            text-decoration: underline;
        }

        p.i_btn a {
            background-color: #0074c2;
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
        }

        p.i_btn a:hover {
            background-color: #0056a0;
        }

        a.i_btn {
            display: inline-block;
            padding: 5px 10px;
            background-color: #0074c2;
            color: #fff;
            text-decoration: none;
        }

        a.i_btn:hover {
            background-color: #0056a0;
        }
    </style>

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
       <td><a href="generate_pdf.php?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">PDF プレビュー</a></td>
       <td><a href="upload_pdf.php?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">PDF アップロード</a></td>
	</tr>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </table>	
	
      <p class="i_btn"><a href="./create.php">データ挿入</a></p>
     
      
</body>
</html>

<?php }
}
