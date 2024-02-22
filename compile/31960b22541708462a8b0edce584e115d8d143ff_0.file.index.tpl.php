<?php
/* Smarty version 4.3.4, created on 2024-02-13 11:18:38
  from 'C:\xampp\htdocs\erdsoft\teszt\template\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65cb41fe0b8e03_87963621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31960b22541708462a8b0edce584e115d8d143ff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\erdsoft\\teszt\\template\\index.tpl',
      1 => 1707819516,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65cb41fe0b8e03_87963621 (Smarty_Internal_Template $_smarty_tpl) {
?>'<form action = "formHandler" method = "post">

                <label for = "name">Name:</label><br>
                    <input type = "text" id = "name" name = "name"><br>
                <label for = "email">Email:</label><br>
                    <input type = "text" id = "email" name = "email"><br>
                <label for = "password">Password:</label> <br>
                    <input type = "password" id = "password" name = "password"><br>
                <label for = "vpass">Verify Password:</label> <br>
                    <input type = "password" id = "vpass" name = "vpass"><br>
                <label for = "uname">Username:</label><br>
                    <input type = "text" id = "uname" name = "uname"><br>
                <label for = "phone">Phone:</label><br>
                    <input type = "text" id = "phone" name = "phone"><br>
                <label for = "country">Country:</label><br>
                <select name = "country" id = "country">';
                <option value="volvo">Volvo</option>
                <option value="volvo2">Volvo2</option>
                <option value="volvo2">Volvo2</option>
                </select><br>
                <label for = "city">City:</label><br>
                    <input type = "text" id = "city" name = "city"><br>
                <label for = "address">Address:</label><br>
                    <input type = "text" id = "address" name = "address"><br>
                <label for = "zipcode">Zip Code:</label><br>
                    <input type = "text" id = "zipcode" name = "zipcode"><br>
                <label for = "gender">Select your Gender</label><br>
                    <input type = "radio" id="male" name = "gender"  value = "1">
                <label for = "male">Male</label><br>
                    <input type = "radio" id = "female" name = "gender"  value = "2">
                <label for = "female">Female</label><br>
                <label for = "active"> Active </label>
                    <input type = "checkbox" id = "active" name = "active" value = "1">
                <br>
                <input type = "submit" value = "Submit" >
            </form>';

<?php }
}
