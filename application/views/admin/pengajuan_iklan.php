<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Nama Pembuat</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                            <th>Total Dana</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pengajuanIklan as $pi) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $pi->judul ?></td>
                                <td><?= $pi->name ?></td>
                                <td><?= $pi->date ?></td>
                                <td><?= $pi->date_end ?></td>
                                <td><?= number_format($pi->total_dana, 0, '.', '.')  ?></td>
                                <td> <img width="50px" src="<?= site_url('assets/img/') . $pi->gambar ?>" alt=""> </td>


                                <td><a class="btn btn-primary" href="<?= site_url('admin/konfirmasiIklan/') . $pi->id ?>">Detail</a></td>
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