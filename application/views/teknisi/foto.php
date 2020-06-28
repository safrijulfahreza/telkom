<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <form id="myForm" action="<?= base_url('teknisi/upload'); ?>" enctype="multipart/form-data" method="POST">
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
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                    <label for="image" class="custom-file-label">Choose File</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="button" onclick="checkBut()" class="btn btn-success">Submit</button>
                    </div>
                    <script>
                        function checkBut() {
                            if (document.getElementById("foto").files.length == 0) {
                                alert("Tidak ada foto yang dipilih");
                            } else {
                                document.getElementById("myForm").submit();
                            }
                        }
                    </script>
                </div>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->