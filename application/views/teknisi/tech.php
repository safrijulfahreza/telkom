<!-- Begin Page Content -->
<div class="container-fluid">


    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gangguan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor Tiket</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Layanan</th>
                                    <th scope="col">Segmen</th>
                                    <th scope="col">Teknisi 1</th>
                                    <th scope="col">Teknisi 2</th>
                                    <th scope="col">Helpdesk</th>
                                    <th scope="col">STO</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Tanggal Input</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($input as $in) : ?>
                                    <?php if ($user['name'] == $in['teknisi1'] || $user['name'] == $in['teknisi2']) : ?>
                                        <?php if ($in['status'] != 'CLOSE') : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $in['nomor_tiket'] ?></td>
                                                <td><?= $in['status'] ?></td>
                                                <td><?= $in['layanan'] ?></td>
                                                <td><?= $in['segmen'] ?></td>
                                                <td><?= $in['teknisi1'] ?></td>
                                                <td><?= $in['teknisi2'] ?></td>
                                                <td><?= $in['helpdesk'] ?></td>
                                                <td><?= $in['sto'] ?></td>
                                                <td><?= $in['keterangan'] ?></td>
                                                <td><?= substr($in['tgl_input'], -19, -9); ?></td>
                                                <td>
                                                    <a href="<?= base_url(); ?>teknisi/<?= $in['nomor_tiket']; ?>" data-id="<?= $i; ?>" class="badge badge-primary" data-toggle="modal" data-target="#detail<?php echo $in['nomor_tiket']; ?>">Detail</a>
                                                    <a href="<?= base_url(); ?>teknisi/foto/<?= $in['nomor_tiket']; ?>" class="badge badge-success">Upload Foto</a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal -->
<?php
foreach ($input as $i) :
    $id = $i['nomor_tiket'];
    $nomor_tiket = $i['nomor_tiket'];
    $status = $i['status'];
    $layanan = $i['layanan'];
    $segmen = $i['segmen'];
    $teknisi1 = $i['teknisi1'];
    $teknisi2 = $i['teknisi2'];
    $helpdesk = $i['helpdesk'];
    $sto = $i['sto'];
    $alpro = $i['alpro'];
    $subsegmen = $i['perbaikan'];
    $keterangan = $i['keterangan'];
    $tgl_input = $i['tgl_input'];
    $tgl_update = $i['tgl_update'];
    $sleeve = $i['sleeve'];
    $adaptor = $i['adaptor'];
    $precon50 = $i['precon50'];
    $precon75 = $i['precon75'];
    $precon100 = $i['precon100'];
    $precon150 = $i['precon150'];
    $ps1_4 = $i['ps1:4'];
    $ps1_8 = $i['ps1:8'];
    $pigtail = $i['pigtail'];
?>
    <div class="modal fade" id="detail<?php echo $nomor_tiket; ?>" tabindex="-1" role="dialog" aria-labelledby="detailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailLabel">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('teknisi/update') ?>">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nomor Tiket</label>
                            <div class="col-xs-8">
                                <input name="nomor" id="nomor" value="<?php echo $nomor_tiket; ?>" class="form-control" type="text" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Status</label>
                            <div class="col-xs-8">
                                <select class="custom-select my-0 mr-sm-2" id="status" name="status">
                                    <?php if ($status == "IN TECHNICIAN") : ?>
                                        <option value="IN TECHNICIAN" selected>IN TECHNICIAN</option>
                                        <option value="GAMAS">GAMAS</option>
                                        <option value="PENDING">PENDING</option>
                                        <option value="CLOSE">CLOSE</option>
                                    <?php elseif ($status == "GAMAS") : ?>
                                        <option value="IN TECHNICIAN">IN TECHNICIAN</option>
                                        <option value="GAMAS" selected>GAMAS</option>
                                        <option value="PENDING">PENDING</option>
                                        <option value="CLOSE">CLOSE</option>
                                    <?php elseif ($status == "PENDING") : ?>
                                        <option value="IN TECHNICIAN">IN TECHNICIAN</option>
                                        <option value="GAMAS">GAMAS</option>
                                        <option value="PENDING" selected>PENDING</option>
                                        <option value="CLOSE">CLOSE</option>
                                    <?php else : ?>
                                        <option value="IN TECHNICIAN">IN TECHNICIAN</option>
                                        <option value="GAMAS">GAMAS</option>
                                        <option value="PENDING">PENDING</option>
                                        <option value="CLOSE" selected>CLOSE</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Helpdesk</label>
                            <div class="col-xs-8">
                                <input name="helpdesk" id="helpdesk" value="<?php echo $helpdesk; ?>" class="form-control" type="text" readonly>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-xs-3">Sub Sementasi Perbaikan</label>
                            <div class="col-xs-8">
                                <select name="subsegmen" id="subsegmen" class="custom-select my-0 mr-sm-2">
                                    <?php foreach ($perbaikan as $p) : ?>
                                        <?php if ($subsegmen == $p['subsegmen']) : ?>
                                            <option value="<?= $p['subsegmen']; ?>" selected><?= $p['subsegmen'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $p['subsegmen']; ?>"><?= $p['subsegmen']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="control-label col-xs-3">Teknisi 1</label>
                                    <div class="col-xs-8">
                                        <input value="<?= $teknisi1; ?>" class="form-control" type="text" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="control-label col-xs-3">Teknisi 2</label>
                                    <div class="col-xs-8">
                                        <input value="<?= $teknisi2; ?>" class="form-control" type="text" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label class="control-label col-xs-3">Tanggal Input</label>
                                    <div class="col-xs-8">
                                        <span class="btn btn-secondary"><?= substr($i['tgl_input'], -19, -9); ?> </span>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="control-label col-xs-3">Terakhir Update</label>
                                    <div class="col-xs-8">
                                        <span class="btn btn-secondary"><?= substr($i['tgl_update'], -19, -9); ?> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Alpro</label>
                            <div class="col-xs-8">
                                <input name="alpro" id="alpro" value="<?php echo $alpro; ?>" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Keterangan</label>
                            <div class="col-xs-8">
                                <textarea name="keterangan" id="keterangan" value="" class="form-control" type="text"><?php echo $i['keterangan']; ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Sleeve</label>
                                    <div class="col-xs-8">
                                        <select name="sleeve" id="sleeve" class="custom-select my-0 mr-sm-2">
                                            <?php for ($op = 0; $op <= 10; $op++) : ?>
                                                <?php if ($sleeve == $op) : ?>
                                                    <option value="<?= $op ?>" selected><?= $op ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $op ?>"><?= $op ?></option>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Adaptor</label>
                                    <div class="col-xs-8">
                                        <select name="adaptor" id="adaptor" class="custom-select my-0 mr-sm-2">
                                            <?php for ($op = 0; $op <= 10; $op++) : ?>
                                                <?php if ($adaptor == $op) : ?>
                                                    <option value="<?= $op ?>" selected><?= $op ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $op ?>"><?= $op ?></option>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-3">PS 1:4</label>
                                    <div class="col-xs-8">
                                        <select name="ps14" id="ps14" class="custom-select my-0 mr-sm-2">
                                            <?php for ($op = 0; $op <= 10; $op++) : ?>
                                                <?php if ($ps1_4 == $op) : ?>
                                                    <option value="<?= $op ?>" selected><?= $op ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $op ?>"><?= $op ?></option>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Precon 50</label>
                                    <div class="col-xs-8">
                                        <select name="precon50" id="precon50" class="custom-select my-0 mr-sm-2">
                                            <?php for ($op = 0; $op <= 10; $op++) : ?>
                                                <?php if ($precon50 == $op) : ?>
                                                    <option value="<?= $op ?>" selected><?= $op ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $op ?>"><?= $op ?></option>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Precon 75</label>
                                    <div class="col-xs-8">
                                        <select name="precon75" id="precon75" class="custom-select my-0 mr-sm-2">
                                            <?php for ($op = 0; $op <= 10; $op++) : ?>
                                                <?php if ($precon75 == $op) : ?>
                                                    <option value="<?= $op ?>" selected><?= $op ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $op ?>"><?= $op ?></option>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Precon 150</label>
                                    <div class="col-xs-8">
                                        <select name="precon150" id="precon150" class="custom-select my-0 mr-sm-2">
                                            <?php for ($op = 0; $op <= 10; $op++) : ?>
                                                <?php if ($precon150 == $op) : ?>
                                                    <option value="<?= $op ?>" selected><?= $op ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $op ?>"><?= $op ?></option>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Precon 100</label>
                                    <div class="col-xs-8">
                                        <select name="precon100" id="precon100" class="custom-select my-0 mr-sm-2">
                                            <?php for ($op = 0; $op <= 10; $op++) : ?>
                                                <?php if ($precon100 == $op) : ?>
                                                    <option value="<?= $op ?>" selected><?= $op ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $op ?>"><?= $op ?></option>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Pigtail</label>
                                    <div class="col-xs-8">
                                        <select name="pigtail" id="pigtail" class="custom-select my-0 mr-sm-2">
                                            <?php for ($op = 0; $op <= 10; $op++) : ?>
                                                <?php if ($pigtail == $op) : ?>
                                                    <option value="<?= $op ?>" selected><?= $op ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $op ?>"><?= $op ?></option>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">PS 1:8</label>
                                    <div class="col-xs-8">
                                        <select name="ps18" id="ps18" class="custom-select my-0 mr-sm-2">
                                            <?php for ($op = 0; $op <= 10; $op++) : ?>
                                                <?php if ($ps1_8 == $op) : ?>
                                                    <option value="<?= $op ?>" selected><?= $op ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $op ?>"><?= $op ?></option>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label">History</label>
                        </div>
                        <?php
                        foreach ($history as $his) :
                            $id = $his['id'];
                            $nomor = $his['nomor'];
                            $hd = $his['hd'];
                            $status = $his['status'];
                            $waktu = $his['waktu'];
                            $name = $his['name'];
                        ?>
                            <?php if ($nomor == $nomor_tiket) : ?>
                                <div class="alert alert-secondary" role="alert"><?= $name; ?> Melakukan update <?= $status; ?> | <?= $waktu; ?></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>