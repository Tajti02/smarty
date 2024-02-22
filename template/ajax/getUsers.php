<?php
require_once '../../dataBaseHandler.php';
require_once '../../dbConfig.php';
require_once '../../userHandler.php';

$userDb = new database\UserHandler($dsn, PARAMS, $pdoOptions);
$pageNumber = $_POST['num'] ?? 1;
$order = $_POST['order'] ?? 'DESC';
$column = $_POST['columnName'] ?? 'u.id';
$end = $pageNumber * $userOnPage;
$start = $end - $userOnPage;
if ($start < 0) {
    $start = 0;
}
$users = $userDb->getDataForAdminTable($start, $userOnPage, $column, $order);
$genders = [
    0 => 'Unknown',
    1 => 'Male',
    2 => 'Female'
];
$isActive = [
    0 => 'No',
    1 => 'Yes'
];
if (!empty($users)) {
    foreach ($users as $user) {
        $data[] = [
            'name' => $user['name'],
            'email' => $user['email'],
            'username' => $user['username'],
            'phone' => $user['phone'],
            'countryName' => $user['countryName'],
            'city' => $user['city'],
            'address' => $user['address'],
            'zipcode' => $user['zipcode'],
            'gender' => $genders[$user['gender']],
            'active' => $isActive[$user['active']],
            'userid' => $user['userid'],
            'pfp' => $user['pfp']
        ];
    }
    $output = '<table class="table table-bordered" id="table">
    <thead>
        <tr>
            <th><input type="checkbox" id="checkAllTable" name="checkAllTable" onclick="checkAll(this);"></th>
            <th><a class="columnSort" id="name" data-order="' . $order . '" href="#">Name</a></th>
            <th><a class="columnSort" id="email" data-order="' . $order . '" href="#">Email</a></th>
            <th><a class="columnSort" id="username" data-order="' . $order . '" href="#">Username</a></th>
            <th><a class="columnSort" id="phone" data-order="' . $order . '" href="#">Phone</a></th>
            <th><a class="columnSort" id="country" data-order="' . $order . '" href="#">Country</a></th>
            <th><a class="columnSort" id="city" data-order="' . $order . '" href="#">City</a></th>
            <th><a class="columnSort" id="address" data-order="' . $order . '" href="#">Address</a></th>
            <th><a class="columnSort" id="zipcode" data-order="' . $order . '" href="#">Zipcode</a></th>
            <th><a class="columnSort" id="gender" data-order="' . $order . '" href="#">Gender</a></th>
            <th><a class="columnSort" id="active" data-order="' . $order . '" href="#">Active</a></th>
            <th><a class="columnSort" id="pfp" data-order="' . $order . '" href="#">Profile Picture</a></th>
        </tr>
    </thead>
    <tbody>';
    foreach ($data as $user) {
        $output .= '<tr>
                    <td><input type="checkbox" name="id[]" class="checkBox" value="' . $user['userid'] . '"></td>';

        foreach ($user as $key => $value) {
            if ($key != 'userid' && $key != 'password') {
                if ($key == 'pfp') {
                    $output .= '<td> <img src="' . $value . '" alt="Not uploaded"> <td>';
                } elseif ($value != null && $value != '') {
                    $output .= '<td>' . $value . '</td>';
                } else {
                    $output .= '<td> Unknown </td>';
                }
            }
        }
        $output .= '<td><a href="user.php?id=' . $user['userid'] . '"/>Edit</a></td> </tr>';
    }
    $output .= '</tbody>
            </table>';
    echo $output;
} else {
    echo json_encode(array("error" => "Failed to fetch users"));
}
