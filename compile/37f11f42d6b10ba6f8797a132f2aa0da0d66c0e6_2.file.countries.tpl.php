<?php
/* Smarty version 4.3.4, created on 2024-02-22 13:36:12
  from 'C:\xampp\htdocs\erdsoft\kezdtablazat\teszt\template\countries.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d73fbcbd1683_22856756',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37f11f42d6b10ba6f8797a132f2aa0da0d66c0e6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\erdsoft\\kezdtablazat\\teszt\\template\\countries.tpl',
      1 => 1708602649,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d73fbcbd1683_22856756 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Users Table</title>
        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="template/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <form action="countries.php" method="post">
            <div style="visibility:<?php if ((isset($_smarty_tpl->tpl_vars['visibility']->value))) {?> hidden <?php } else { ?> visible <?php }?>">
                <input type="submit" name ="submit" value="New Country">
            </div>
            <div style="visibility:<?php if ((isset($_smarty_tpl->tpl_vars['visibility']->value))) {?> <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['visibility']->value, ENT_QUOTES, 'UTF-8');?>
 <?php } else { ?> hidden" <?php }?>>

                 <div class="form-group col-md-4">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['name']))) {?> style="border-color: red"<?php }?>>
                </div>
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
                <br><input type="submit" name ="submit" value="Add">

            </div>
            <?php if ((isset($_smarty_tpl->tpl_vars['import']->value))) {?>
                <?php echo '<script'; ?>
> alert("<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['import']->value, ENT_QUOTES, 'UTF-8');?>
"); <?php echo '</script'; ?>
>
            <?php }?>
            <?php if ((isset($_smarty_tpl->tpl_vars['delete']->value))) {?>
                <?php echo '<script'; ?>
> alert("<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['delete']->value, ENT_QUOTES, 'UTF-8');?>
"); <?php echo '</script'; ?>
>
            <?php }?>
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAllTable" name="checkAllTable" onclick="checkAll(this);"></th>
                        <th><a class="columnSort" id="u.name" data-order="desc" href="#">Name</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td> no countries yet </td></tr>
                </tbody>
                <input type="submit" name ="submit" value="Delete Selected" onclick="confirmDelete();">
            </table>
        </form>
        <div class="pagination-container">
            <?php if ((isset($_smarty_tpl->tpl_vars['pageNumber']->value))) {?>
                <?php if ($_smarty_tpl->tpl_vars['pageNumber']->value != 1) {?>
                    <a href="countries.php?pageNum=1"> First </a>
                <?php }?>
                <?php
$_smarty_tpl->tpl_vars['num'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int) ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['pageNumber']->value+2+1 - ($_smarty_tpl->tpl_vars['pageNumber']->value-2) : $_smarty_tpl->tpl_vars['pageNumber']->value-2-($_smarty_tpl->tpl_vars['pageNumber']->value+2)+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0) {
for ($_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars['pageNumber']->value-2, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++) {
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration === 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration === $_smarty_tpl->tpl_vars['num']->total;?>
                    <?php if ($_smarty_tpl->tpl_vars['num']->value > 0 && $_smarty_tpl->tpl_vars['num']->value <= $_smarty_tpl->tpl_vars['numberOfPages']->value) {?>
                        <a href="countries.php?pageNum=<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['num']->value, ENT_QUOTES, 'UTF-8');?>
"> <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['num']->value, ENT_QUOTES, 'UTF-8');?>
 </a>
                    <?php }?>
                <?php }
}
?>
                <?php if ($_smarty_tpl->tpl_vars['pageNumber']->value != $_smarty_tpl->tpl_vars['numberOfPages']->value) {?>
                    <a href="countries.php?pageNum=<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['numberOfPages']->value, ENT_QUOTES, 'UTF-8');?>
" >Last</a>
                <?php }?>
                <input type="hidden" name='pageNumber' value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['pageNumber']->value, ENT_QUOTES, 'UTF-8');?>
">
            <?php } else { ?>
                <input type="hidden" name='pageNumber' value="1">
                <a href="countries.php?pageNum=2">1</a>
                <a href="countries.php?pageNum=2">2</a>
                <?php if ($_smarty_tpl->tpl_vars['numberOfPages']->value >= 3) {?>
                    <a href="user.php?pageNum=3">3</a>
                <?php }?>
                <a href="countries.php?pageNum=<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['numberOfPages']->value, ENT_QUOTES, 'UTF-8');?>
" >Last</a>
            <?php }?>
        </div>
        <?php echo '<script'; ?>
>
            var pageNumber = <?php echo '<?php'; ?>
 echo $_GET['pageNum'] ?? 1; <?php echo '?>'; ?>
;
        <?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="template/js/scriptCountry.js"><?php echo '</script'; ?>
>
    </body>
</html><?php }
}
