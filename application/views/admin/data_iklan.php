<!-- Begin Page Content -->
<div class="container-fluid">

    <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahiklan">Tambah Iklan</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Iklan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                            <th>Gambar</th>
                            <th>Nama Pembuat</th>
                            <th>Is Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dataIklan as $dk) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dk->judul ?></td>
                                <td><?= date('d F Y', $dk->date_created); ?></td>
                                <td><?= $dk->date_end ?></td>
                                <td><?= $dk->gambar ?></td>
                                <td><?= $dk->name ?></td>
                                <td value="<?= $dk->is_active ?>"> <?php if ($dk->status == "0") {
                                                                        echo "Not Active";
                                                                    } else {
                                                                        echo "Active";
                                                                    } ?></td>
                                <td><a href="<?= site_url('admin/') . $dk->id ?>">edit</a></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
</div>
<!-- End of Main Content -->

<!-- modal -->
<?= form_open_multipart('admin/tambahIklan'); ?>
<!-- <form method="post" action="<?= base_url('admin/tambahIklan') ?>" enctype="multipart/form-data"> -->
<div class="modal fade" id="tambahiklan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Iklan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label> kategori</label>
                    <select name="id_kategori" class="form-control">
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($dataKategori as $dt) : ?>
                            <option value="<?= $dt->id_kategori ?>"><?= $dt->nama_kategori ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-grup" hidden>
                    <label>ID USER</label>
                    <input type="text" name="id_user" class="form-control" value="1">
                </div>
                <div class="form-grup">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control">
                </div>
                <div class="form-grup" hidden>
                    <label>Tanggal mulai</label>
                    <input type="text" name="date" class="form-control" value="<?= date('Y-m-d H:i:s'); ?>">
                </div>
                <div class="form-grup">
                    <label>Tanggal Akhir</label>
                    <input type="date" name="date_end" class="form-control">
                </div>
                <div class="form-grup">
                    <label>Total Dana</label>
                    <input type="number" name="total_dana" class="form-control">
                </div>
                <div class="form-grup">
                    <label>Cerita</label>
                    <input type="text" name="cerita" class="form-control">
                </div>
                <div class="form-grup" hidden>
                    <label>Status</label>
                    <input type="text" name="status" class="form-control" value="1">
                </div>
                <div class="form-grup">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- </form> -->
<?= form_close(); ?>