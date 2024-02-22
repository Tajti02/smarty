<?php
/* Smarty version 4.3.4, created on 2024-02-22 13:29:00
  from 'C:\xampp\htdocs\erdsoft\kezdtablazat\smarty\template\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d73e0c6e3b61_88444546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14d9f099b2a98ac57f8c466152f5e45b77e811d2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\erdsoft\\kezdtablazat\\smarty\\template\\user.tpl',
      1 => 1708602514,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d73e0c6e3b61_88444546 (Smarty_Internal_Template $_smarty_tpl) {
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
        <link rel="stylesheet" href="template/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>

        <form action="user.php" method="post" enctype="multipart/form-data">
            <div style="visibility:<?php if ((isset($_smarty_tpl->tpl_vars['visibility']->value))) {?> hidden <?php } else { ?> visible <?php }?>">
                <input type="submit" name ="submit" value="New User">
            </div>
            <div style="visibility:<?php if ((isset($_smarty_tpl->tpl_vars['visibility']->value))) {?> <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['visibility']->value, ENT_QUOTES, 'UTF-8');?>
 <?php } else { ?> hidden" <?php }?>>

                <div class="form-group col-md-4">
                    <label for="name">Name:</label>
                    <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['id']))) {?> <input type = "hidden" name = "id" value = "<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['id'], ENT_QUOTES, 'UTF-8');?>
"><?php }?>
                    <input type="text" id="name" name="name" <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['name']))) {?> style="border-color: red"<?php }
if ((isset($_smarty_tpl->tpl_vars['populate']->value['name']))) {?>value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['name'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email"<?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['email']))) {?> style="border-color: red"<?php }?> <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['email']))) {?> value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['email'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
                </div>
                <div class="form-group col-md-4">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['password']))) {?> style="border-color: red"<?php }?>>
                </div>
                <div class="form-group col-md-4">
                    <label for="vpass">Verify Password:</label>
                    <input type="password" id="vpass" name="vpass" <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['password']))) {?> style="border-color: red"<?php }?>>
                </div>
                <div class="form-group col-md-4">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" <?php if ((isset($_smarty_tpl->tpl_vars['errors']->value['username']))) {?> style="border-color: red"<?php }?> <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['username']))) {?> value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['username'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
                </div>
                <div class="form-group col-md-4">
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['phone']))) {?> value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['phone'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
                </div>

                <div class="form-group col-md-8">
                    <label for="country">Country:</label>
                    <select name="country" id="country">';
                        <option value="null"> Choose One </option>
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
                </div>
                <div class="form-group col-md-4">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['city']))) {?> value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['city'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
                </div>
                <div class="form-group col-md-4">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['address']))) {?> value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['address'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
                </div>
                <div class="form-group col-md-4">
                    <label for="zipcode">Zip Code:</label>
                    <input type="text" id="zipcode" name="zipcode" <?php if ((isset($_smarty_tpl->tpl_vars['populate']->value['zipcode']))) {?> value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['populate']->value['zipcode'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>>
                </div>
                <div class="form-group col-md-4">
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
                <div class="form-group col-md-4">
                    <label for="myFile">Add a profile picture</label><br>
                    <input type="file" id="myFile" name="filename" max-size="1000">
                </div>
                <?php if ((isset($_smarty_tpl->tpl_vars['editButton']->value))) {?>
                    <input type="submit" name="submit" value="Save">
                <?php } else { ?>
                    <input type="submit" name ="submit" value="Add">
                <?php }?>
            </div>


            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAllTable" name="checkAllTable" onclick="checkAll(this);"></th>
                        <th><a class="columnSort" id="u.name" data-order="desc" href="#">Name</a></th>
                        <th><a class="columnSort" id="u.email" data-order="desc" href="#">Email</a></th>
                        <th><a class="columnSort" id="u.username" data-order="desc" href="#">Username</a></th>
                        <th><a class="columnSort" id="u.phone" data-order="desc" href="#">Phone</a></th>
                        <th><a class="columnSort" id="c.countryName" data-order="desc" href="#">Country</a></th>
                        <th><a class="columnSort" id="u.city" data-order="desc" href="#">City</a></th>
                        <th><a class="columnSort" id="u.address" data-order="desc" href="#">Address</a></th>
                        <th><a class="columnSort" id="u.zipcode" data-order="desc" href="#">Zipcode</a></th>
                        <th><a class="columnSort" id="u.gender" data-order="desc" href="#">Gender</a></th>
                        <th><a class="columnSort" id="u.active" data-order="desc" href="#">Active</a></th>
                        <th><a class="columnSort" id="u.pfp" data-order="desc" href="#">Profile Picture</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> no users yet </td>
                    </tr>
                </tbody>

            <input type="submit" name ="submit" value="Delete Selected" onclick="confirmDelete();">
            </table>
        </form>
        <?php if ((isset($_smarty_tpl->tpl_vars['delete']->value))) {?>
            <?php echo '<script'; ?>
> alert("<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['delete']->value, ENT_QUOTES, 'UTF-8');?>
"); <?php echo '</script'; ?>
>
        <?php }?>
        <?php if ((isset($_smarty_tpl->tpl_vars['update']->value))) {?>
            <?php echo '<script'; ?>
> alert("<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['update']->value, ENT_QUOTES, 'UTF-8');?>
"); <?php echo '</script'; ?>
>
        <?php }?>

        <div class="pagination-container">
            <?php if ((isset($_smarty_tpl->tpl_vars['pageNumber']->value))) {?>
                <?php if ($_smarty_tpl->tpl_vars['pageNumber']->value != 1) {?>
                    <a href="user.php?pageNum=1"> First </a>
                <?php }?>
                <?php
$_smarty_tpl->tpl_vars['num'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int) ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['pageNumber']->value+2+1 - ($_smarty_tpl->tpl_vars['pageNumber']->value-2) : $_smarty_tpl->tpl_vars['pageNumber']->value-2-($_smarty_tpl->tpl_vars['pageNumber']->value+2)+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0) {
for ($_smarty_tpl->tpl_vars['num']->value = $_smarty_tpl->tpl_vars['pageNumber']->value-2, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++) {
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration === 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration === $_smarty_tpl->tpl_vars['num']->total;?>
                    <?php if ($_smarty_tpl->tpl_vars['num']->value > 0 && $_smarty_tpl->tpl_vars['num']->value <= $_smarty_tpl->tpl_vars['numberOfPages']->value) {?>
                    <a href="user.php?pageNum=<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['num']->value, ENT_QUOTES, 'UTF-8');?>
"> <?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['num']->value, ENT_QUOTES, 'UTF-8');?>
 </a>
                    <?php }?>
                <?php }
}
?>
                <?php if ($_smarty_tpl->tpl_vars['pageNumber']->value != $_smarty_tpl->tpl_vars['numberOfPages']->value) {?>
                    <a href="user.php?pageNum=<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['numberOfPages']->value, ENT_QUOTES, 'UTF-8');?>
" >Last</a>
                <?php }?>
                <input type="hidden" name='pageNumber' value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['pageNumber']->value, ENT_QUOTES, 'UTF-8');?>
">
            <?php } else { ?>
                <input type="hidden" name='pageNumber' value="1">
                <a href="user.php?pageNum=1">1</a>
                <a href="user.php?pageNum=2">2</a>
                <?php if ($_smarty_tpl->tpl_vars['numberOfPages']->value >= 3) {?>
                    <a href="user.php?pageNum=3">3</a>
                <?php }?>
                <a href="user.php?pageNum=<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['numberOfPages']->value, ENT_QUOTES, 'UTF-8');?>
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
 src="template/js/script.js"><?php echo '</script'; ?>
>
    </body>
</html><?php }
}
