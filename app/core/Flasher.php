<?php

class Flasher {
    public static function setFlash($pesan, $aksi, $tipe, $simbol) {
        $_SESSION["flash"] = [
            "pesan" => $pesan,
            "aksi" => $aksi,
            "tipe" => $tipe,
            "simbol" => $simbol
        ];
    }

    public static function flash () {
        if (isset($_SESSION["flash"])) {
            echo '<div class="alert alert-' . $_SESSION["flash"]["tipe"] .' d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="' . $_SESSION["flash"]["tipe"] .':"><use xlink:href="' . $_SESSION["flash"]["simbol"] .'"/></svg>
            <div>
              Data Mahasiswa <strong> ' . $_SESSION["flash"]["pesan"] . '</strong> '. $_SESSION["flash"]["aksi"] . '
            </div>
          </div>';
          unset($_SESSION["flash"]);
        }
    }
}