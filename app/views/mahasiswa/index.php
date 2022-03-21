<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3 tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah Data Mahasiswa
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-2">
            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="cari mahasiswa" name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari" >Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach($data["mhs"] as $mhs): ?>
                    <li class="list-group-item ">
                    <a href="<?=BASEURL;?>/mahasiswa/hapus/<?=$mhs["id"];?>" class="badge bg-danger float-end mx-1" style="text-decoration:none;" onclick="return confirm('yakin ingin menghapus data mahasiswa ini?')">hapus</a>    
                    <?= $mhs["nama"]?>
                    <a href="<?=BASEURL;?>/mahasiswa/ubah/<?=$mhs["id"];?>" class="badge bg-success float-end mx-1 tampilModalUbah" style="text-decoration:none;" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $mhs['id'];?>">ubah</a>
                    <a href="<?=BASEURL;?>/mahasiswa/detail/<?=$mhs["id"];?>" class="badge bg-info float-end mx-1" style="text-decoration:none;">detail</a>
                </li>
                <?php endforeach;?>
            </ul>
            
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/mahasiswa/tambah" method="post">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="jurusan"></label>
                <select class="form-control" name="jurusan" id="jurusan">
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Pertanian">Teknik Pertanian</option>
                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                    <option value="Pendidikan Olahraga">Pendidikan Olahraga</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Industri Pertanian">Industri Pertanian</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"></button>
        </form>
      </div>
    </div>
  </div>
</div>