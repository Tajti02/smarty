<?php
session_start();
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

$isLoggedIn = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['submit'] == 'Login') {
        $userName = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        $requiredFields = [
            'username' => 'Username',
            'password' => 'Password'
        ];
        $formVars = array_filter($_POST);
        $missingThings = array_diff_key($requiredFields, $formVars);

        foreach ($missingThings as $key => $value) {
            $errors[$key] = $value . ' cannot be empty! ';
        }

        if (empty($errors)) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $db = new database\UserHandler($dsn, PARAMS, $pdoOptions);
            if ($db->isValidUser($username, $password)) {
                $_SESSION['username'] = $username;
            }
        }
    }
}

if (isset($_SESSION['username'])) {
    $smarty->display('template/navbar.tpl');
    $site = $_GET['submit'] ?? null;
    if ($site == 'Users') {
        require_once 'user.php';
    }
    if ($site == 'Countries') {
        require_once 'countries.php';
    }
} else {
    if (!empty($errors)) {
        $smarty->assign('errors', $errors);
    }
    $smarty->display('template/login.tpl');
}
