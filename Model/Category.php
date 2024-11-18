<?php 

require_once __DIR__ . '/../DB/Connection.php';
require_once __DIR__ . '/../Interface/ModelInterface.php';
require_once __DIR__ . '/Model.php';

class Category extends Model {
    protected $table = "categories";
    protected $primary_key = "id_category";

    public function create($data)
    {
        return parent::createData($data, $this->table);
    }

    public function all()
    {
        return parent::allData($this->table);
    }

    public function find($id)
    {
        return parent::findData($id, $this->primary_key, $this->table);
    }

    public function update($id, $data) 
    {
        return parent::updateData($id, $this->primary_key, $data, $this->table);
    }

    public function delete($id) 
    {
        return parent::deleteData($id, $this->primary_key, $this->table);
    }

    public function search($keyword)
    {
        $keyword = "WHERE category_name LIKE '%$keyword%'";
        return parent::search_data($keyword, $this->table);
    }

    public function paginate($start, $limit) 
    {
        return parent::paginate_data($start, $limit, $this->table);
    }

}