<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>GUDANG ASSETS</h1>
        </div>

        <?php echo $this->session->flashdata('message'); ?>





        <div class="table-responsive">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header text-light bg-dark text-light">
                            <!-- <a class="btn btn-warning text-light mr-3"><i class="fa fa-user"></i> Profil Saya</a> -->
                        </div>
                        <div class="card-body table-responsive">
                            <form method="POST" action="operator/CKegiatanCRUD/savekategori">
                                <table class="table">
                                    <tr>
                                        <td>Kategori buku</td>
                                        <td><input type="text" name="kat" required class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="operator/CKegiatanCRUD" class="btn btn-warning"><i
                                                    class="fas fa-sync-alt    "></i> Kembali</a>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fas fa-paper-plane    "></i> Simpan</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header bg-dark text-light">
                            Data Kategori
                        </div>
                        <div class="card-body table-responsive">
                            <br>
                            <table id="dt" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $no = 1;
                                $q = $this->db->query("select * from kategori order by id desc ");
                                foreach($q->result() as $row){
                            ?>
                                    <tr>
                                        <td scope="row"><?php echo $no ?></td>
                                        <td><?php echo $row->kat ?></td>
                                        <td>
                                            <a href="operator/CKegiatanCRUD/hapuskategori/<?php echo $row->id ?>" class="btn btn-danger"
                                                onclick="return confirm('Hapus data?')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++;}  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
        <a class="page-link" href="#">Next</a>
        </li>
    </ul>
    </nav> -->

        </div>

    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="TambahKegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah FOTO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('operator/CKegiatanCRUD/uploadfile') ?>" method="post"
                    enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama_kegiatan" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" name="kategori" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" required>
                            </div>


                            <div class="form-group">
                                <label>Tanggal Input</label>
                                <input type="date" name="tanggal_input" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Upload File</label>
                                <input type="file" name="gambar" class="form-control" required>
                            </div>

                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Data yang sudah dihapus tidak bisa dikembalikan</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>