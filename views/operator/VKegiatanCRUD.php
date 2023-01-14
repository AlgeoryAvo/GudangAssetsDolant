<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>GUDANG ASSETS</h1>
        </div>

        <?php echo $this->session->flashdata('message'); ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="small text-xs font-weight-bold text-info text-uppercase mb-1">
                                        <marquee>DOLANT</marquee>


                                    </div>
                                </div>
                                <div class="col-auto">
                                    <!-- <i class="fas fa-tasks fa-2x text-gray-300"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="small text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Assets
                                    </div>
                                    <div class="h8 mb-0 font-weight-bold text-gray-800"><?= $keg ?></td>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <!-- <i class="fas fa-tasks fa-2x text-gray-300"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col">
                                    <div class="small text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        TOTAL USER
                                    </div>
                                    <div class="h8 mb-0 font-weight-bold text-gray-800"><?= $PPTK ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <!-- <i class="fas fa-tasks fas-2x text-gray-300"></i> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="table-responsive">
            <div class="card">
                <div class="card-body">
                    <buttton class="btn btn-info mb-3" data-toggle="modal" data-target="#TambahKegiatan"><i
                            class="fas fa-plus fa-sm"></i> Tambah FOTO</buttton>
                    <a href="operator/CKegiatanCRUD/kategori" class="btn btn-success mb-3" ><i
                            class="fas fa-plus fa-sm"></i> Tambah Kategori</a>
                    <table id="dataTables" class="table dt table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Lokasi</th>
                                <th>Tanggal Input</th>
                                <th>Foto</th>

                                <th colspan="">Aksi</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php
                $no = 1;
                foreach ($kegiatan as $act) :
                ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $act->nama_kegiatan ?></td>
                                <td><?php echo $act->kategori ?></td>
                                <td><a href="image/<?php echo $act->kfoto ?>"
                                        target="_blank"><?php echo $act->kfoto ?></a></td>
                                <td><?php echo $act->tanggal_input ?></td>
                                <td>
                                    <?php 
                                if (empty($act->kfoto)) {
                                    echo '<center><img src="' . base_url('./assets/images/noimg.jpg') . '" border="0" width="70px" height="70px"> </center>';
                                } else {
                                    echo '<center><img src="' . base_url('./image/' . $act->kfoto) . '" border="0" width="70px" height="70px"> </center>';
                                }
                            ?>
                                </td>
                                <td>
                                    <?php echo anchor(
                                'operator/CKegiatanCRUD/halamanDetail/' . $act->id_kegiatan,
                                '<div class="btn btn-primary btn-sm"><i class="fas fa-search-plus"></i></div>'
                            ) ?>
                                    <?php echo anchor(
                                'operator/CKegiatanCRUD/halamanUpdate/' . $act->id_kegiatan,
                                '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></div>'
                            ) ?>
                                    <a class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data?')"
                                        href="<?php echo base_url('operator/CKegiatanCRUD/fungsiDelete/') ?>/<?php echo $act->id_kegiatan ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                </td>

                                <!-- <td> -->
                                </td>

                                <!-- <td> -->


                                <!-- <a onclick="deleteConfirm('<?php echo site_url('operator/CKegiatanCRUD/fungsiDelete/' . $act->id_kegiatan) ?>')" href="#!" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i></a> -->
                                <!-- </td> -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

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
                                <select class="form-control" name="kategori">
                                                <option value="">Pilih</option>
                                                <?php
$q = $this->db->get("kategori");
foreach($q->result() as $row){
?>
                                                <option value="<?php echo $row->kat ?>"><?php echo $row->kat ?></option>
                                                <?php }  ?>
                                            </select>
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