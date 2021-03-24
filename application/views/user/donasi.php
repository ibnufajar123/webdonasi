<div class="row align-items-stretch">
    <div class="col-md-6">
        <img src="<?= base_url('assets/') ?>images/img_1.jpg" alt="Image" class="img-fluid shadow">
    </div>
    <div class="col-md-6">
        <div class="bg-white h-100 p-4 shadow">
            <h3 class="mb-4 text-cursive">Donate Now</h3>
            <!-- <?php form_open('welcome/inputDonasi'); ?> -->
            <form method="post" action="<?= base_url('user/inputDonasi'); ?>">

                <?php foreach ($donasi as $d) : ?>
                    <div class="form-group" hidden>
                        <input type="text" id="id_iklan" name="id_iklan" class="form-control" placeholder="Name" value="<?= $d->id ?>">
                    </div>
                <?php endforeach; ?>
                <div class="form-group">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="text" id="nominal" name="nominal" class="form-control" placeholder="Amount in Rupiah">
                </div>
                <div class="form-group" hidden>
                    <input type="text" id="date" name="date" class="form-control" value="<?= time() ?>">
                </div>
                <div class="form-group">
                    <input type="text" id="pesan" name="pesan" class="form-control" placeholder="Masukan pesan">
                </div>
                <div>
                    <button class="btn btn-success" type="submit">Donate Now</button>

                </div>
            </form>
        </div>
        <?php foreach ($totalDonasi as $td) : ?>
            <div><?= "Dana terkumpul saat ini Rp " . number_format($td->total, 2, ',', '.');  ?></div>
        <?php endforeach; ?>
        <?php foreach ($totalPendonasi as $pd) : ?>
            <div><?= "Jumlah Pendonasi " . $pd->pendonasi . " orang" ?></div>
        <?php endforeach; ?>
    </div>
</div>
</div>