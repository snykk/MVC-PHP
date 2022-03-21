<?php

class Mahasiswa_model {
    private $table = "mahasiswa";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllMahasiswa() {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data) {
        $query = "INSERT INTO mahasiswa 
                    VALUES ('', :nama, :nim, :email, :jurusan)";

        $this->db->query($query);
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("nim", $data["nim"]);
        $this->db->bind("email", $data["email"]);
        $this->db->bind("jurusan", $data["jurusan"]);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id) {
        $query = "DELETE FROM mahasiswa WHERE id= :id";
        $this->db->query($query);
        $this->db->bind("id", $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahhDataMahasiswa($data) {
        $query = "UPDATE mahasiswa
                    SET nama = :nama,
                        nim = :nim,
                        email = :email,
                        jurusan = :jurusan
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind("id", $data["id"]);
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("nim", $data["nim"]);
        $this->db->bind("email", $data["email"]);
        $this->db->bind("jurusan", $data["jurusan"]);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa() {
        $keyword = $_POST["keyword"];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind("keyword","%$keyword%");
        return $this->db->resultSet();
    }
    
}

// public function getAllMahasiswa() {
    // $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
    // $this->stmt->execute();
    // // return $this->mhs;
    // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    // // $this->stmt = $this->dbh->query("SELECT * FROM mahasiswa");
    // // $this->stmt->fetch_assoc();
    // // return $this->stmt;
// }


    // private $mhs = [
    //     [
    //         "nama"=>"Moh. Najib Fikri",
    //         "NIM"=>"202410102033",
    //         "email"=>"najibfikri13@gmail.com",
    //         "jurusan"=>"Teknologi Informasi"
    //     ],
    //     [
    //         "nama"=>"Muh. Wildan Al Aziz",
    //         "NIM"=>"201910302003",
    //         "email"=>"akupejuangbangsairan@gmail.com",
    //         "jurusan"=>"Teknik Pertanian"
    //     ],
    //     [
    //         "nama"=>"Ahmad Faisal Fahmi",
    //         "NIM"=>"201020201044",
    //         "email"=>"akubukanorangbiasa@gmail.com",
    //         "jurusan"=>"Teknik Perkapalan"
    //     ],
    //     [
    //         "nama"=>"Bagus Satria Pamungkas",
    //         "NIM"=>"209020301122",
    //         "email"=>"temannyasiva@gmail.com",
    //         "jurusan"=>"Pendidikan Olahraga"
    //     ]
    // ];


