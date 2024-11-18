<?php 

require_once __DIR__ . '/../DB/Connection.php';
require_once __DIR__ . '/../Interface/ModelInterface.php';
require_once __DIR__ . '/Model.php';

class Item extends Model {
    protected $table = "items";
    protected $primary_key = "id_item";

    public function create($data)
    {
        // var_dump($data["files"]);   
        $nama_file = $data["files"]["attachment"]["name"];
        $tmp_name = $data["files"]["attachment"]["tmp_name"];
        $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $ekstensi_allowed = ["jpg", "png", "jpeg", "gif", "webp", "heic"];

        if(!in_array($ekstensi_file, $ekstensi_allowed)) {
            echo "<script>
            alert('Ekstensi Tidak Diperbolehkan');
            window.location.href = 'create-menu.php';
            </script>";
        }

        if($data["files"]["attachment"]["size"] > 2000000) {
        echo "<script>
            alert('Gambar tidak boleh lebih dari 2 MB');
            window.location.href = 'create-menu.php';
            </script>";
        }

        $nama_file = uniqid() . "." . $ekstensi_file;

        move_uploaded_file($tmp_name, "../public/img/items/" . $nama_file);

        $data = [
            "name_item" => $data["post"]["name_item"],
            "attachment" => $nama_file,
            "price" => $data["post"]["price"],
            "category_id" => $data["post"]["category_id"],
        ];

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
        $keyword = "WHERE name LIKE '%$keyword%'";
        return parent::search_data($keyword, $this->table);
    }

        public function paginate($start, $limit) 
    {
        return parent::paginate_data($start, $limit, $this->table);
    }

    public function all2($start, $limit) 
    {
        $query = "SELECT * FROM items JOIN categories ON items.category_id = categories.id_category LIMIT $start, $limit";  
        $result = mysqli_query($this->db, $query);
        return $this->convertData($result);  
    }
}