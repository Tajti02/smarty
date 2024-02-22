<?php
namespace database;
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Belgrade');
require_once 'dataBaseHandler.php';
class UserHandler extends DataBaseHandler
{
    protected $salt = 'oahoahoasldkLLLowi';
    protected $keys = [
        'name' => '',
        'email' => '',
        'username' => '',
        'password' => '',
        'phone' => '',
        'country' => '',
        'city' => '',
        'address' => '',
        'zipcode' => '',
        'gender' => '',
        'active' => ''
    ];
    public function deleteUserFromDataBase($ids)
    {
        if (empty($ids)) {
            return false;
        } else {
            $placeholders = rtrim(str_repeat('?, ', count($ids)), ', ');
            $isDeleted = $this->from('users')
                ->where('ID in (' . $placeholders . ')', $ids)
                ->delete();
            if ($isDeleted) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function insertUser($formVars, $picFullPath = '')
    {
        $values = $this->keys;
        foreach ($values as $key => $value) {
            $values[$key] = $formVars[$key] ?? '';
        }
        $values['pfp'] = $picFullPath;
        $values['password'] = sha1($this->salt . $values['password']);
        $isInserted = $this->columns(array_keys($values))
            ->from('users')
            ->insertParams($values)
            ->insert();
        if ($isInserted) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUser($formVars, $picFullPath = '')
    {
        $values = $this->keys;
        foreach ($values as $key => $value) {
            $values[$key] = $formVars[$key] ?? '';
        }
        $values['pfp'] = $picFullPath;
        $values['password'] = sha1($this->salt . $values['password']);
        $isUpdated = $this->columns(array_keys($values))
            ->from('users')
            ->insertParams($values)
            ->where('id = :id', [':id' => $formVars['id']])
            ->update();
        if ($isUpdated) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataForAdminTable($start, $end, $column, $order)
    {
        $users = $this->columns([
            'u.id AS userid',
            'u.name',
            'u.email',
            'u.username',
            'u.password',
            'u.phone',
            'u.country',
            'u.city',
            'u.address',
            'u.zipcode',
            'u.gender',
            'u.active',
            'u.pfp',
            'c.name AS countryName'
        ])
            ->from(' users AS u')
            ->join(' LEFT JOIN country AS c ON c.id = u.country')
            ->order($column, $order)
            ->limit($start, $end)
            ->select();
        return $users;
    }

    public function isTakenUsername($username, $id = 0)
    {
        $usernames = $this->columns(['id'])
            ->from('users')
            ->where('username = :username AND id != :id', [':username' => $username, ':id' => $id])
            ->select();
        if (empty($usernames)) {
            return false;
        } else {
            return true;
        }
    }
    public function isTakenEmail($email, $id = 0)
    {
        $emails = $this->columns(['id'])
            ->from('users')
            ->where('email = :email AND id != :id', [':email' => $email, ':id' => $id])
            ->select();
        if (empty($emails)) {
            return false;
        } else {
            return true;
        }
    }
    public function formValidation($formVars)
    {
        $errors = [];

        $requiredFields = [
            'name' => 'name',
            'email' => 'Email',
            'password' => 'Password',
            'vpass' => 'Password Verification',
            'username' => 'Username',

        ];
        $formVars = array_filter($formVars);
        $missingThings = array_diff_key($requiredFields, $formVars);

        foreach ($missingThings as $key => $value) {
            $errors[$key] = $value . ' cannot be empty! ';
        }
        if (!empty($errors)) {
            return $errors;
        }

        if ($formVars['password'] != $formVars['vpass']) {
            $errors['password'] = 'Passwords doesn\'t match!';
        }
        if (!filter_var($formVars['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'We need a valid email!';
        }
        $id = $formVars['id'] ?? 0;
        if ($this->isTakenEmail($formVars['email'], $id) || $this->isTakenUsername($formVars['username'], $id)) {
            $errors['email'] = 'Be unique!';
            $errors['username'] = 'Be unique!';
        }
        $options = [
            'allowed_extensions' => ['jpg', 'png'],
            'max_filesize' => '24MB',
            'max_imagesize' => [
                'width' => 1920,
                'height' => 1080,
            ],
        ];
        if (!$this->isPfpValid($_FILES['filename'], $options)) {
            $errors['picture'] = 'Not valid file!';
        }

        return $errors;
    }
    public function isValidUser($username, $password)
    {
        $sql = "SELECT * FROM users
        WHERE username = :username
        AND password  = :hashedPw";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":username", $username);
        $hashedPw = sha1($this->salt . $password);
        $stmt->bindValue(":hashedPw", $hashedPw);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if (!empty($result)) {
            return true;
        } else {
            return false;
        }
    }
    public function getNumberOfUsers()
    {
        $sql = "SELECT COUNT(id) from users";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $userNum = $stmt->fetch();
        return $userNum;
    }
    public function isPfpValid($file, $settings = [])
    {
        $type = pathinfo($file["full_path"], PATHINFO_EXTENSION);
        $allowedExtensions = $settings['allowed_extensions'] ?? null;
        if ($allowedExtensions && !in_array($type, $allowedExtensions)) {
            return false;
        }
        $maxSize = $settings['max_filesize'] ?? null;
        if ($maxSize) {
            $sizeNum = intval($maxSize);
            if (!is_numeric($maxSize)) {
                $numbers = range(0, 9);
                $sizeBites = str_replace($numbers, '', $maxSize);
                $sizeNum = $sizeNum * $this->getBytes($sizeBites);
            } else {
                $sizeNum = $sizeNum * 1024;
            }
            if ($file['size'] > $sizeNum) {
                return false;
            }
        }
        $maxWidth = $settings['max_imagesize']['width'] ?? null;
        $maxHeight = $settings['max_imagesize']['height'] ?? null;
        list($width, $height) = getimagesize($file['tmp_name']);
        if ($maxWidth && $maxHeight) {
            if ($width > $maxWidth || $height > $maxHeight) {
                return false;
            }
        }
        return true;
    }
    public function getBytes(string $unit = 'default'): int
    {
        $sizeTable = [
            'KB' => 1,
            'MB' => 2,
            'GB' => 3,
            'kb' => 1,
            'mb' => 2,
            'gb' => 3,
            'default' => 1
        ];
        if (in_array($unit, $sizeTable)) {
            $multiplier = pow(1024, $sizeTable[$unit]);
        } else {
            $multiplier = pow(1024, $sizeTable['default']);
        }
        return $multiplier;
    }
    public function savePfp($file, $destination = '')
    {
        $type = pathinfo($file["full_path"], PATHINFO_EXTENSION);
        $fileName = pathinfo($file['full_path'], PATHINFO_FILENAME);
        $fileName = preg_replace('/[^a-zA-Z0-9 ]/ ', '', $fileName);
        $fileName = str_replace(' ', '-', $fileName);

        if (!is_dir($destination)) {
            mkdir($destination, 0777, true);
        }

        $fullPath = $destination . $fileName . '.' . $type;
        $counter = 1;
        while (file_exists($fullPath)) {
            $newFileName = $fileName . '_' . $counter;

            $fullPath = str_replace($fileName, $newFileName, $fullPath);
            $counter++;
            if (file_exists($fullPath)) {
                $newFileName = substr($newFileName, 0, strlen($newFileName) - 2);
            }
        }
        $fileName = $newFileName ?? $fileName;
        if (move_uploaded_file($file["tmp_name"], $fullPath)) {
            return $fullPath;
        } else {
            return 'error';
        }
    }
}
