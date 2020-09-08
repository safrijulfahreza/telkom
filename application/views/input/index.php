<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="mt-3">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>
        <?= $this->session->flashdata('message'); ?>
    </div>

    <form action="<?= base_url('input'); ?>" method="post">
        <div class="row">
            <div class="col">
                <label for="">Nomor Tiket</label>
                <input type="text" class="form-control" placeholder="Masukkan Nomor Tiket" id="nomor" name="nomor" value="<?= set_value('nomor'); ?>">
                <div class="mt-2">
                    <label for="">Status</label>
                    <select class="custom-select my-0 mr-sm-2" id="status" name="status">
                        <option selected value="">Pilih</option>
                        <option value="IN TECHNICIAN">IN TECHNICIAN</option>
                        <option value="GAMAS">GAMAS</option>
                        <option value="PENDING">PENDING</option>
                        <option value="CLOSE">CLOSE</option>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="">Layanan</label>
                    <select class="custom-select my-0 mr-sm-2" id="layanan" name="layanan">
                        <option selected value="">Pilih</option>
                        <option value="ASTINET">ASTINET</option>
                        <option value="METRO E">METRO E</option>
                        <option value="VPN IP">VPN IP</option>
                        <option value="VOICE">VOICE</option>
                        <option value="INTERNET">INTERNET</option>
                        <option value="IP TV">IP TV</option>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="">Segmen <span class="badge badge-secondary">Customer</span></label>
                    <select class="custom-select my-0 mr-sm-2" id="segmen" name="segmen">
                        <option selected value="">Pilih</option>
                        <option value="DES">DES</option>
                        <option value="DGS">DGS</option>
                        <option value="DBS">DBS</option>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="">Nama Teknisi 1</label>
                    <select class="custom-select my-0 mr-sm-2" id="teknisi1" name="teknisi1">
                        <option selected value="">Pilih</option>
                        <?php foreach ($teknisi as $t) : ?>
                            <option value="<?= $t['name']; ?>"><?= $t['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="">Nama Teknisi 2</label>
                    <select class="custom-select my-0 mr-sm-2" id="teknisi2" name="teknisi2">
                        <option selected value="">Pilih</option>
                        <?php foreach ($teknisi as $t) : ?>
                            <option value="<?= $t['name']; ?>"><?= $t['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="">STO</label>
                <select class="custom-select my-0 mr-sm-2" name="sto" id="sto">
                    <option selected value="">Pilih</option>
                    <?php foreach ($sto as $s) : ?>
                        <option value="<?= $s['pilihan']; ?>"><?= $s['pilihan']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="mt-2">
                    <label for="">ALPRO</label>
                    <select class="custom-select my-0 mr-sm-2" name="alpro" id="alpro">
                        <option selected value="">Pilih</option>
                        <option value="FO">FO</option>
                        <option value="COOPER">COOPER</option>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="">Sub Segmentasi Perbaikan</label>
                    <select class="custom-select my-0 mr-sm-2" id="subsegmen" name="subsegmen">
                        <option selected value="">Pilih</option>
                        <?php foreach ($perbaikan as $p) : ?>
                            <option value="<?= $p['subsegmen']; ?>"><?= $p['subsegmen']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="">Pelanggan</label>
                    <select class="custom-select my-0 mr-sm-2" id="pelanggan" name="pelanggan">
                        <option selected value="">Pilih</option>
                        <?php foreach ($pelanggan as $pg) : ?>
                            <option value="<?= $pg['id']; ?>"><?= $pg['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success mb-2 form-control">Submit</button>
                </div>
            </div>
        </div>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->