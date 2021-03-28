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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role Id</th>
                            <th>Is Active</th>
                            <th>Start date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dataUser as $du) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $du->name ?></td>
                                <td><?= $du->email ?></td>
                                <td><?= $du->role ?></td>
                                <td value="<?= $du->is_active ?>"> <?php if ($du->is_active == "0") {
                                                                        echo "Not Active";
                                                                    } else {
                                                                        echo "Active";
                                                                    } ?></td>
                                <td> <?= date('d F Y', $du->date_created); ?></td>

                                <td><a href="<?= site_url('admin/updateAkun') . $du->id ?>">aktifkan akun</a></td>
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