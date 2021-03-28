<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">

        </div>
    </div>
    <div class="col-sm-6">
        <?php foreach ($edit as $ed) { ?>
            <?= form_open_multipart('admin/konfirmasiIklanAksi'); ?>
            <div class="form-group">
                <label for="formGroupExampleInput">id</label>
                <input type="text" class="form-control" name="id" id="id" value="<?= $ed->id ?>">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">Kategori</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $ed->id_kategori  ?>">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput2">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?= $ed->id_user ?>" readonly>
            </div>

            <!-- <div class="form-group">
                <label for="formGroupExampleInput2">Status</label>
                <select class="form-control" name="role_id" id="role_id">
                    <option value="<?= $ed->role_id; ?>">---Pilih---</option>
                    <option value="1">Administrator</option>
                    <option value="2">Member</option>
                </select>
            </div> -->

            <div class="form-group">
                <label for="formGroupExampleInput2">Active</label>
                <select class="form-control" name="is_active" id="is_active">
                    <option value="<?= $ed->is_active ?>">---Pilih---</option>
                    <option value="1">Active</option>
                    <option value="0">Not Active</option>
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        <?php } ?>

    </div>
</div>
</div>