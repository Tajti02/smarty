<?php
/* Smarty version 4.3.4, created on 2024-02-19 13:01:55
  from 'C:\xampp\htdocs\erdsoft\teszt\template\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d34333bec234_14028722',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31960b22541708462a8b0edce584e115d8d143ff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\erdsoft\\teszt\\template\\index.tpl',
      1 => 1708344111,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d34333bec234_14028722 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
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
<input type="submit" name ="submit" value="Show Form">
<div style="visibility:<?php if ((isset($_smarty_tpl->tpl_vars['visibility']->value))) {?> <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['visibility']->value, ENT_QUOTES, 'UTF-8');?>
 <?php } else { ?> hidden" <?php }?>>
    <div class="form-row">
    <div class="form-group col-md-12">
    <label for="name">Name:</label>
    <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['id']))) {?> <input type = "hidden" name = "id" value = "<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['id'], ENT_QUOTES, 'UTF-8');?>
"><?php }?>
<input type="text" id="name" name="name" <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['name']))) {?> style="border-color: red"<?php }
if ((isset($_smarty_tpl->tpl_vars['populate']->value['name']))) {?>value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['name'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
    <label for="email">Email:</label>
    <input type="text" id="email" name="email"<?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['email']))) {?> style="border-color: red"<?php }?> <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['email']))) {?> value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['email'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
    <label for="password">Password:</label> 
    <input type="password" id="password" name="password" <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['password']))) {?> style="border-color: red"<?php }?>>
    <label for="vpass">Verify Password:</label> 
    <input type="password" id="vpass" name="vpass" <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['password']))) {?> style="border-color: red"<?php }?>>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['username']))) {?> style="border-color: red"<?php }?> <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['username']))) {?> value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['username'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
    <label for="phone">Phone:</label>
   <input type="text" id="phone" name="phone" <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['phone']))) {?> value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['phone'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
        </div>
        <div class="form-group col-md-8">
    <label for="country">Country:</label>
    <select name="country" id="country">';
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?>
        <tr>

            <option value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['country']->value['id'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['country']->value['name'], ENT_QUOTES, 'UTF-8');?>
</option>

        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
    <label for="city">City:</label>
    <input type="text" id="city" name="city" <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['city']))) {?> value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['city'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['address']))) {?> value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['address'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
    <label for="zipcode">Zip Code:</label>
    <input type="text" id="zipcode" name="zipcode" <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['zipcode']))) {?> value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['zipcode'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
    <label for="gender">Select your Gender</label><br>
    <input type="radio" id="male" name="gender" value="1">
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="2">
    <label for="female">Female</label><br>
    <label for="active"> Active </label>
    <input type="checkbox" id="active" name="active" value="1">
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
    <br>
    <?php if ((isset($_smarty_tpl->tpl_vars['editButton']->value))) {?>
        <input type="submit" name="submit" value="Save">
    <?php } else { ?>
        <input type="submit" name ="submit" value="Add New">
    <?php }?>
    </div>
</div>


    <table class="table table-bordered" id="table">
    <thead>
        <tr>
            <th><input type="checkbox" id="checkAllTable" name="checkAllTable" onclick="checkAll(this);"></th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Phone</th>
            <th>Country</th>
            <th>City</th>
            <th>Address</th>
            <th>ZIPCODE</th>
            <th>Gender</th>
            <th>Active</th>
        </tr>
    </thead>
<tbody>
<tr><td> no users yet </td></tr>
</tbody>

<input type="submit" name ="submit" value="Delete Selected" onclick="confirmDelete();">
    </table>
</form>
<?php if ((isset($_smarty_tpl->tpl_vars['delete']->value))) {?>
    <?php echo '<script'; ?>
> alert("<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['delete']->value, ENT_QUOTES, 'UTF-8');?>
"); <?php echo '</script'; ?>
>
<?php }
if ((isset($_smarty_tpl->tpl_vars['update']->value))) {?>
    <?php echo '<script'; ?>
> alert("<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['update']->value, ENT_QUOTES, 'UTF-8');?>
"); <?php echo '</script'; ?>
>
<?php }
echo '<script'; ?>
 src="template/js/script.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
