<?php 


require_once __DIR__ . '/../DB/Connection.php';
require_once __DIR__ . '/../Interface/ModelInterface.php';
require_once __DIR__ . '/Model.php';

class User extends Model {
    private $table = "users";
    private $primary_key = "id_users";

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

    public function register($data)
    {
        $email = $data['post']['email'];
        $name = $data['post']['full_name'];
        $password = $data['post']['password'];
        $gender = $data['post']['gender'];

        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);

        if(mysqli_num_rows($result) > 0) {
            return "Email Sudah Terdaftar";
        }

        $nama_file = $data["files"]["avatar"]["name"];
        $tmp_name = $data["files"]["avatar"]["tmp_name"];
        $ekstensi_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $ekstensi_allowed = ["jpg", "png", "jpeg", "gif", "webp", "heic"];

        if(!in_array($ekstensi_file, $ekstensi_allowed)) {
            echo "<script>
            alert('Ekstensi Tidak Diperbolehkan');
            window.location.href = 'create-menu.php';
            </script>";
        }

        if($data["files"]["avatar"]["size"] > 2000000) {
        echo "<script>
            alert('Gambar tidak boleh lebih dari 2 MB');
            window.location.href = 'create-menu.php';
            </script>";
        }

        $nama_file = uniqid() . "." . $ekstensi_file;   

        move_uploaded_file($tmp_name, "../public/img/users/" . $nama_file);

        $password = base64_encode($password);

        $query_register = "INSERT INTO {$this->table} (name, avatar, gender, email, password) VALUES ('$name', '$nama_file', '$gender', '$email',  '$password')";

        $result = mysqli_query($this->db, $query_register);

        if(!$result) {
            return "Register Gagal";
        }

        $_SESSION['full_name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['avatar'] = $nama_file;

        $detail_user = [
            'full_name' => $name,
            'email' => $email,
            'avatar' => $nama_file
        ];

        return $detail_user;
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = '$email'";
        $result = mysqli_query($this->db, $query);

        if(mysqli_num_rows($result) == 0) {
            return "User Tidak Ditemukan";
        }

        $user = mysqli_fetch_assoc($result);
        if(base64_decode($user['password'], false) == $password) {
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['avatar'] = $user['avatar'];
    
            $detail_user = [
                'full_name' => $user['full_name'],
                'email' => $email,
                'avatar' => $user['avatar']
            ];
    
            return $detail_user;
        } else {
            return "Password Tidak Sesuai";
        }
    }

    public function logout() {
        session_destroy();
        return "Logout Berhasil";
    }
    
}