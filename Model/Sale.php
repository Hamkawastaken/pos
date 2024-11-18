<?php 

require_once __DIR__ . '/../DB/Connection.php';
require_once __DIR__ . '/../Interface/ModelInterface.php';
require_once __DIR__ . '/Model.php';

class Sale extends Model {
    protected $table = "sales";
    protected $primary_key = "id_sale";

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

    public function all2()
    {
        $query = "SELECT sales.id_sales, sales.name_customer, sales.note, sales.status, sales.amount, sales.user_id, sales.created_at_sales, items.id_item, items.name_item, items.attachment, items.price, users.id_user, users.full_name, users.avatar FROM sales JOIN pivot_item_sales ON sales.id_sales = pivot_item_sales.sale_id_pivot JOIN items ON items.id_item = pivot_item_sales.item_id_pivot JOIN users ON users.id_user = sales.user_id";
        $result = mysqli_query($this->db, $query);
        return $this->convertData($result);
    }

}