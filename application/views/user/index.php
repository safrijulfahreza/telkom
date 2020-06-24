<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['name']; ?></h5>
                            <p class="card-text"><?= $user['nik']; ?></p>
                            <p class="card-text"><small class="text-muted">Since <?= date('d F Y', $user['date_created']); ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3" style="max-width: 540ox;">
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bolder">Jumlah Gangguan Dengan Status Close</h5>
                    <h3 class="card-text text-center"><?= $close['close']; ?> Dari <?= $laporanDit['helpdesk']; ?> Gangguan</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3" style="max-width: 540ox;">
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bolder">Jumlah Seluruh Gangguan</h5>
                    <h3 class="card-text text-center"><?= $total; ?></h3>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->