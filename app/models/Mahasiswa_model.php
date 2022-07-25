<?php
class Mahasiswa_model{
    // Database Handler, Statement
        private $table = 'mahasiswa';
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }
    
    // private $mhs = [
    //     [
    //         "nama" => "Yefta OS",
    //         "nis" => "12345",
    //         "email" => "yefta@gmail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama" => "Ntakk",
    //         "nis" => "23456",
    //         "email" => "Ntakk@gmail.com",
    //         "jurusan" => "Multimedia"
    //     ],
    //     [
    //         "nama" => "Upann",
    //         "nis" => "23456",
    //         "email" => "Upannail@gmail.com",
    //         "jurusan" => "Komunikasi"
    //     ],
    //     [
    //         "nama" => "StevenDesu",
    //         "nis" => "12345",
    //         "email" => "StevenDesu@gmail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ]
    //     ];

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table );
        return $this->db->resultSet();
        // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        // $this->stmt->execute();
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        // return $this->mhs;
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES ('', :nama, :nis, :email, :jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();
        return $this->db->rowCount();
        // return 0;
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM `mahasiswa` WHERE id = :id;";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET
                    nama = :nama,
                    nis = :nis,
                    email = :email,
                    jurusan = :jurusan
                    WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
        // return 0;
    }

    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
        }
}