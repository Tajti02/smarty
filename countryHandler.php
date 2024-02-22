<?php
namespace database;
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Belgrade');
require_once 'dataBaseHandler.php';

class CountryHandler extends DataBaseHandler
{
    public function isCountryExists($name)
    {
        $id = $this->columns(['id'])
            ->from('country')
            ->where('name = :name', [':name' => $name])
            ->select();
        if (empty($id)) {
            return false;
        } else {
            return true;
        }
    }
    public function insertCountry($name)
    {
        $names[":name"] = $name;
        $isInserted = $this->columns(['name'])
            ->from('country')
            ->insertParams($names)
            ->insert();
        return $isInserted;
    }

    public function getCountriesForAdminTable($start, $end, $column, $order)
    {
        $countries = $this->columns(['id', 'name'])
            ->from(' country')
            ->order($column, $order)
            ->limit($start, $end)
            ->select();
        return $countries;
    }
    public function getNumberOfCountries()
    {
        $sql = "SELECT COUNT(id) from country";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $countryNum = $stmt->fetch();
        return $countryNum;
    }
    public function deleteCountryFromDataBase($ids)
    {
        if (empty($ids)) {
            return false;
        } else {
            var_dump($ids);
            $placeholders = rtrim(str_repeat('?, ', count($ids)), ', ');
            $isDeleted = $this->from('country')
                ->where('id in (' . $placeholders . ')', $ids)
                ->delete();
            if ($isDeleted) {
                return true;
            } else {
                return false;
            }
        }
    }
}
