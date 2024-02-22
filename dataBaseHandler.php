<?php
namespace database;
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Belgrade');
class DataBaseHandler
{
    protected $pdo = null;
    protected $columns = [];
    protected $table = '';
    protected $where = '';
    protected $limit = '';
    protected $join = '';
    protected $params = [];
    protected $insertParams = [];
    protected $order = '';

    public function __construct($dsn, $dbparams, $pdoOptions)
    {
        $this->pdo = new \PDO($dsn, $dbparams['USER'], $dbparams['PASSWORD'], $pdoOptions);
    }

    public function columns($columns)
    {
        $this->columns = $columns;
        return $this;
    }

    public function from($table)
    {
        $this->table = $table;
        return $this;
    }
    public function insertParams(array $params)
    {
        $this->insertParams = $params;
        return $this;
    }
    public function where($where, array $params)
    {
        $this->where = $where;
        $this->params = $params;
        return $this;
    }

    public function limit($start, $rowCount)
    {
        $this->limit = " $start, $rowCount";
        return $this;
    }

    public function join($join)
    {
        $this->join = $join;
        return $this;
    }
    public function order($column, $order)
    {
        $this->order = $column . ' ' . $order;
        return $this;
    }

    public function select()
    {
        $query = 'SELECT ';

        if (count($this->columns) >= 1 && !empty($this->columns[0])) {
            $query .= implode(', ', $this->columns);
        } else {
            $query .= "*";
        }
        $query .= ' FROM ';
        $query .= $this->table;
        if (!empty($this->where)) {
            $query .= ' WHERE ';
            $query .= $this->where;
        }
        if (!empty($this->join)) {
            $query .= $this->join;
        }
        if (!empty($this->order)) {
            $query .= ' ORDER BY ';
            $query .= $this->order;
        }
        if (!empty($this->limit)) {
            $query .= ' LIMIT ';
            $query .= $this->limit;
        }
        $stmt = $this->pdo->prepare($query);
        if (!empty($this->params)) {
            foreach ($this->params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
        }
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    public function delete()
    {
        $query = 'DELETE FROM ' . $this->table;
        if (!empty($this->where)) {
            $query .= ' WHERE ';
            $query .= $this->where;
        }
        $stmt = $this->pdo->prepare($query);
        if (!empty($this->params)) {
            foreach ($this->params as $key => $value) {
                $stmt->bindValue($key + 1, $value);
            }
        }
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insert()
    {
        $query = 'INSERT INTO ' . $this->table . ' ';
        if (count($this->columns) >= 1 && !empty($this->columns[0])) {
            $query .= '(' . implode(', ', $this->columns) . ') VALUES(:' . implode(', :', $this->columns) . ')';
        } else {
            return false;
        }

        $stmt = $this->pdo->prepare($query);
        if (!empty($this->insertParams)) {
            foreach ($this->insertParams as $key => $value) {
                $stmt->bindValue($key, $value);
            }
        }

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function update()
    {
        $query = 'UPDATE ' . $this->table . ' SET ';
        $updateValues = '';
        foreach ($this->columns as $column) {
            $updateValues .= $column . ' = :' . $column . ', ';
        }
        $updateValues = substr($updateValues, 0, strlen($updateValues) - 2);
        $query .= $updateValues;
        $query .= ' WHERE ';
        $query .= $this->where;
        $stmt = $this->pdo->prepare($query);
        if (!empty($this->insertParams)) {
            foreach ($this->insertParams as $key => $value) {
                $stmt->bindValue($key, $value);
            }
        }
        foreach ($this->params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
