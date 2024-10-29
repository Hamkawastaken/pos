<?php

require_once __DIR__ . '/../DB/Connection.php';
require_once __DIR__ . '/../Interface/ModelInterface.php';

abstract class Model extends Connection implements ModelInterface {
    public function createData($data, $table) {
        $key = array_keys($data);
        $value = array_values($data);
        $key = implode(",", $key);
        $value = implode("','", $value);

        $query = "INSERT INTO $table ($key) VALUES ('$value')";

        $result = mysqli_query($this->db, $query);

        if($result) {
            return $data;
        } else {
            return false;
        }
    }

    public function allData($table) {
        $query = "SELECT * FROM $table";
        $result = mysqli_query($this->db, $query);

        return $this->convertData($result);
    }

    public function convertData($datas) {
        $data = [];
        while ( $row = mysqli_fetch_assoc($datas) ) {
            $data[] = $row;
        }
        return $data;
    }

    public function findData($id, $table)
    {
        $query = "SELECT * FROM $table WHERE id = $id";
        $result = mysqli_query($this->db, $query);
        return $this->convertData($result);
    }

    public function updateData($id, $data, $table)
    {
        $key = array_keys($data);
        $value = array_values($data);

        $query = "UPDATE $table SET ";
        for ($i = 0; $i < count($key); $i++) {
            $query .= $key[$i] . " = '" . $value[$i] . "'";
            if($i != count($key) - 1) {
                $query .= ",";
            }
        }
        $query .= " WHERE id = $id";
        $result = mysqli_query($this->db, $query);
        
        if($result) {
            return $data;
        } else {
            return false;
        }
    }

    public function deleteData($id, $table)
    {
        $query = "DELETE FROM $table WHERE id = $id";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
}