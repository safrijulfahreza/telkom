<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <a href="" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#tambahHelpdesk">Tambah Helpdesk</a>
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
                    <h6 class="m-0 font-weight-bold text-secondary">List Helpdesk</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Helpdesk</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Tanggal Terdaftar</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($regis as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $r['name']; ?></td>
                                        <td><?= $r['email']; ?></td>
                                        <td><?= date('d F Y', $r['date_created']); ?></td>
                                        <?php if ($r['role_id'] == 1) : ?>
                                            <td>Admin</td>
                                        <?php else : ?>
                                            <td>Helpdesk</td>
                                        <?php endif; ?>
                                        <?php if ($r['is_active'] == 1) : ?>
                                            <td>Aktif</td>
                                        <?php else : ?>
                                            <td>Nonaktif</td>
                                        <?php endif ?>
                                        <td>
                                            <a href="<?= base_url(); ?>admin/registrasi/<?= $r['id']; ?>" data-id="<?= $i; ?>" class="badge badge-primary" data-toggle="modal" data-target="#update<?php echo $r['email']; ?>">Update</a>
                                            <a href="<?= base_url(); ?>admin/hapushelpdesk/<?= $r['id']; ?>" class="badge badge-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
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
<div class="modal fade" id="tambahHelpdesk" tabindex="-1" role="dialog" aria-labelledby="tambahHelpdeskLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahHelpdeskLabel">Tambah Helpdesk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/registrasi'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3">Nama Helpdesk</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label class="control-label col-xs-3">Password</label>
                                <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukkan Password">
                            </div>
                            <div class="col">

                                <label class="control-label col-xs-3">Confirm Password</label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Masukkan Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update -->
<?php
foreach ($regis as $regis) :
    $name = $regis['name'];
    $email = $regis['email'];
    $status = $regis['is_active'];
    $role = $regis['role_id'];
    ?>
    <div class="modal fade" id="update<?php echo $email; ?>" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateLabel">Edit Helpdesk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/updateuser'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Helpdesk</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Helpdesk" value="<?= $name ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">NIK</label>
                            <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK" value="<?= $email ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Status</label>
                            <select name="status" id="status" class="form-control">
                                <?php if ($status == 1) : ?>
                                    <option value="1" selected>Aktif</option>
                                    <option value="0">Nonaktif</option>
                                <?php else : ?>
                                    <option value="1">Aktif</option>
                                    <option value="0" selected>Nonaktif</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Role</label>
                            <select name="role" id="role" class="form-control">
                                <?php if ($role == 1) : ?>
                                    <option value="1" selected>Admin</option>
                                    <option value="2">Helpdesk</option>
                                <?php else : ?>
                                    <option value="1">Admin</option>
                                    <option value="2" selected>Helpdesk</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>