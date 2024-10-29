<?php 

require_once __DIR__ . '/../DB/Connection.php';
require_once __DIR__ . '/../Interface/ModelInterface.php';
require_once __DIR__ . '/Model.php';

class Owner extends Model {
    private $table = "owners";

    public function create($data)
    {
        parent::createData($data, $this->table);
    }

    public function all()
    {
        return parent::allData($this->table);
    }

    public function find($id)
    {
        return parent::findData($id, $this->table);
    }

    public function update($id, $data) 
    {
        return parent::updateData($id, $data, $this->table);
    }

    public function delete($id) 
    {
        return parent::deleteData($id, $this->table);
    }
}