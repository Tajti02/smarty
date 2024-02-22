<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Belgrade');
require 'vendor/autoload.php';
require_once 'dataBaseHandler.php';
require_once 'userHandler.php';
require_once 'dbConfig.php';

$smarty = new Smarty();
$smarty->setTemplateDir('template/');
$smarty->setConfigDir('config/');
$smarty->setCompileDir('compile/');
$smarty->setCacheDir('cache/');
$smarty->setEscapeHtml(true);
if (basename($_SERVER['PHP_SELF']) == 'user.php') {
    $smarty->display('template/navbar.tpl');
}
$db = new database\UserHandler($dsn, PARAMS, $pdoOptions);
$countries = $db->columns([''])
    ->from('country')
    ->select();
$smarty->assign('countries', $countries);

$page = $_GET['pageNum'] ?? null;
if ($page) {
    $smarty->assign('pageNumber', $page);
}
$numberOfUsers = $db->getNumberOfUsers();
$numberOfPages = ceil($numberOfUsers['COUNT(id)'] / $userOnPage);
$smarty->assign('numberOfPages', $numberOfPages);
$id = $_GET['id'] ?? null;
$id = intval($id);
if ($id) {
    $userDataRows = $db->columns([
        'id',
        'name',
        'email',
        'username',
        'password',
        'phone',
        'city',
        'address',
        'zipcode'
    ])
        ->from('users')
        ->where('id = :id', [':id' => $id])
        ->select();
    $userData = $userDataRows[0];
    $smarty->assign('populate', $userData);
    $smarty->assign('editButton', 'show');
    $smarty->assign('visibility', 'visible');
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['submit'] == 'Add') {
        $errors = $db->formValidation($_POST);

        if (!empty($errors)) {
            $smarty->assign('populate', $_POST);
            $smarty->assign('errors', $errors);
            $smarty->assign('visibility', 'visible');
        } else {
            $pfp = $db->savePfp($_FILES['filename'], 'pictures/');
            if ($db->insertUser($_POST, $pfp)) {
                $smarty->assign('import', 'succes');
            } else {
                $smarty->assign('import', 'failure');
            }
        }
    }
    if ($_POST['submit'] == "Delete Selected") {
        $toDelete = $_POST['id'] ?? [];
        if ($db->deleteUserFromDataBase($toDelete)) {
            $smarty->assign('delete', 'succes');
        } else {
            $smarty->assign('delete', 'fail');
        }
    }

    if ($_POST['submit'] == 'Save') {
        $errors = $db->formValidation($_POST);
        if (!empty($errors)) {
            $smarty->assign('populate', $_POST);
            $smarty->assign('errors', $errors);
            $smarty->assign('visibility', 'visible');
        } else {
            $pfp = $db->savePfp($_FILES['filename'], 'pictures/');
            if ($db->updateUser($_POST, $pfp)) {
                $smarty->assign('import', 'succes');
            } else {
                $smarty->assign('import', 'fail');
            }
        }
    }
    if ($_POST['submit'] == 'New User') {
        $smarty->assign('visibility', 'visible');
    }
}
$smarty->display('template/user.tpl');
