<?php

class database extends PDO {

    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
    }

    public function select($query, $data = array(), $fetchType = true, $fetchMode = PDO::FETCH_ASSOC) {

        $sql = $this->prepare($query);
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if (is_int($value))
                    $param = PDO::PARAM_INT;
                elseif (is_bool($value))
                    $param = PDO::PARAM_BOOL;
                elseif (is_null($value))
                    $param = PDO::PARAM_NULL;
                else
                    $param = PDO::PARAM_STR;

                $sql->bindValue("$key", $value, $param);
            }
        }
        $sql->execute();
        if ($fetchType == true) {
            return $sql->fetchAll($fetchMode);
        } else {
            return $sql->fetch($fetchMode);
        }
    }

    public function insert($table, $data) {

        $fieldNames = implode(',', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $query = "INSERT INTO $table ($fieldNames) VALUES ($fieldValues)";
        $sql = $this->prepare($query);
        foreach ($data as $key => $value) {
            if (is_int($value))
                $param = PDO::PARAM_INT;
            elseif (is_bool($value))
                $param = PDO::PARAM_BOOL;
            elseif (is_null($value))
                $param = PDO::PARAM_NULL;
            else
                $param = PDO::PARAM_STR;

            $sql->bindValue(":$key", $value, $param);
        }
        if ($sql->execute()):
            return TRUE;
        else:
            return FALSE;
        endif;
    }

    public function update($table, $data, $where) {

        $field = NULL;
        foreach ($data as $key => $value) {
            $field .= "$key = :$key,";
        }
        $field = rtrim($field, ',');

        $query = "UPDATE $table SET $field WHERE $where";
        $sql = $this->prepare($query);
        foreach ($data as $key => $value) {
            if (is_int($value))
                $param = PDO::PARAM_INT;
            elseif (is_bool($value))
                $param = PDO::PARAM_BOOL;
            elseif (is_null($value))
                $param = PDO::PARAM_NULL;
            else
                $param = PDO::PARAM_STR;

            $sql->bindValue(":$key", $value, $param);
        }
        $sql->execute();
    }

    public function delete($table, $right, $left) {
        if (is_array($left)) {
            $left = rtrim(implode(',', $left));
        }
        $sql = $this->prepare("DELETE FROM $table WHERE $right IN ($left)");
        $sql->execute();
    }

}
