<?php
/* Smarty version 4.3.4, created on 2024-02-22 13:35:16
  from 'C:\xampp\htdocs\erdsoft\kezdtablazat\teszt\template\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d73f8465f2c2_48246353',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ab00e7f0505ea4782dc78037ee2c31edb93e5a3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\erdsoft\\kezdtablazat\\teszt\\template\\login.tpl',
      1 => 1708602029,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d73f8465f2c2_48246353 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Users Table</title>
        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <form action="index.php" method="post">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['username']))) {?> style="border-color: red"<?php }?> <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['username']))) {?> value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['username'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['password']))) {?> style="border-color: red"<?php }?>>

            <input type="submit" name ="submit" value="Login">
        </form>
        <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value))) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
$_smarty_tpl->tpl_vars['error']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->do_else = false;
?>
                <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'UTF-8');?>

            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>
    </body>
</html><?php }
}
