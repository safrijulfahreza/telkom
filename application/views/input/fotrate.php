<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">

            <div class="form-group row">
                <label for="nik" class="col-sm-2 col-form-label">Nomor Tiket</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_tiket" name="nomor_tiket" value="<?= $nomor_tiket; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-7">
                            <img src="<?= base_url('assets/img/laporan/') . $laporan['image']; ?>" class="img-thumbnail" alt="Responsive image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="nik" class="col-sm-2 col-form-label">Rating Konsumen</label>
                <div class="col-sm-10">
                    <?php for ($i = 0; $i < 5; $i++) : ?>
                        <?php if ($i >= $penilaian['rate']) : ?>
                            <?= '<span class="fa fa-star"></span>'; ?>
                        <?php else : ?>
                            <?= '<span class="fa fa-star" style="color: orange;" ></span>'; ?>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <textarea class="form-control" readonly value=""><?= $penilaian['keterangan']; ?></textarea>
                </div>
            </div>


        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->