<!-- Begin Page Content -->
<div class="container-fluid">


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
                                <td value="<?= $dk->is_active ?>"> <?php if ($dk->is_active == "0") {
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