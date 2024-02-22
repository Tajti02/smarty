<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Belgrade');
require_once '../../dataBaseHandler.php';
require_once '../../dbConfig.php';
require_once '../../countryHandler.php';
$countryDb = new database\CountryHandler($dsn, PARAMS, $pdoOptions);
$pageNumber = $_POST['num'] ?? 1;
$end = $pageNumber * $userOnPage;
$start = $end - $userOnPage;
if ($start < 0) {
    $start = 0;
}
$order = $_POST['order'] ?? 'DESC';
$column = $_POST['columnName'] ?? 'id';
$countries = $countryDb->getCountriesForAdminTable($start, $userOnPage, $column, $order);
$output = '<table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAllTable" name="checkAllTable"
                        onclick="checkAll(this);"></th>
                        <th><a class="columnSort" id="name" data-order="' . $order . '" href="#">Name</a></th>
                    </tr>
                </thead>
                <tbody>';
foreach ($countries as $country) {
    $output .= '<tr>
                    <td><input type="checkbox" name="id[]" class="checkBox" value="' . $country['id'] . '"></td>
                    <td>' . $country['name'] . '</td>
                </tr>';
}
$output .= '</tbody>
        </table>';
echo $output;
