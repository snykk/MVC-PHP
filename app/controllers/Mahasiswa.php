<?php

class Mahasiswa extends Controller {
    public function index() {
        $data["judul"] = "Daftar Mahasiswa";
        $data["mhs"] = $this->model("Mahasiswa_model")->getAllMahasiswa();
        $this->view("templates/header", $data);
        $this->view("mahasiswa/index", $data);
        $this->view("templates/footer");
    }

    public function detail($id) {
        $data["judul"] = "Detail Mahasiswa";
        $data["mhs"] = $this->model("Mahasiswa_model")->getMahasiswaById($id);
        $this->view("templates/header", $data);
        $this->view("mahasiswa/detail", $data);
        $this->view("templates/footer");
    }

    public function tambah() {
        if ($this->model("Mahasiswa_model")->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash("berhasil","ditambahkan","success", "#check-circle-fill");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash("gagal","ditambahkan","danger", "#exclamation-triangle-fill");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }

    public function hapus($id) {
        if ($this->model("Mahasiswa_model")->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash("berhasil","dihapus","success", "#check-circle-fill");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash("gagal","ditambahkan","danger", "#exclamation-triangle-fill");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }

    public function getubah() {
        echo json_encode($this->model("Mahasiswa_model")->getMahasiswaById($_POST["id"]));
    }

    public function ubah() {
        if ($this->model("Mahasiswa_model")->ubahhDataMahasiswa($_POST) > 0) {
            Flasher::setFlash("berhasil","diubah","success", "#check-circle-fill");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash("gagal","diubah","danger", "#exclamation-triangle-fill");
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }

    public function cari() {
        $data["judul"] = "Daftar Mahasiswa";
        $data["mhs"] = $this->model("Mahasiswa_model")->cariDataMahasiswa();
        $this->view("templates/header", $data);
        $this->view("mahasiswa/index", $data);
        $this->view("templates/footer");
    }
}