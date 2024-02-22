<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Belgrade');
require 'vendor/autoload.php';
require_once 'dataBaseHandler.php';
require_once 'countryHandler.php';
require_once 'dbConfig.php';

$smarty = new Smarty();
$smarty->setTemplateDir('template/');
$smarty->setConfigDir('config/');
$smarty->setCompileDir('compile/');
$smarty->setCacheDir('cache/');
$smarty->setEscapeHtml(true);
$db = new database\CountryHandler($dsn, PARAMS, $pdoOptions);
if (basename($_SERVER['PHP_SELF']) == 'countries.php') {
    $smarty->display('template/navbar.tpl');
}
$page = $_GET['pageNum'] ?? null;
if ($page) {
    $smarty->assign('pageNumber', $page);
}
$numberOfUsers = $db->getNumberOfCountries();
$numberOfPages = ceil($numberOfUsers['COUNT(id)'] / $userOnPage);
$smarty->assign('numberOfPages', $numberOfPages);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['submit'] == 'New Country') {
        $smarty->assign('visibility', 'visible');
    }
    if ($_POST['submit'] == 'Add') {
        $name = $_POST['name'] ?? null;
        if (!$name) {
            $errors['name'] = 'Don\'t leave it empty!';
            $smarty->assign('errors', $errors);
            $smarty->assign('visibility', 'visible');
        } elseif ($db->isCountryExists($name)) {
            $errors['name'] = 'Country already in the database!';
            $smarty->assign('errors', $errors);
            $smarty->assign('visibility', 'visible');
        } else {
            if ($db->insertCountry($name)) {
                $smarty->assign('import', 'succesfully inserted!');
            } else {
                $smarty->assign('import', 'error!');
            }
        }
    }
    if ($_POST['submit'] == "Delete Selected") {
        $toDelete = $_POST['id'] ?? [];
        if ($db->deleteCountryFromDataBase($toDelete)) {
            $smarty->assign('delete', 'succes');
        } else {
            $smarty->assign('delete', 'fail');
        }
    }
}
$smarty->display('template/countries.tpl');
