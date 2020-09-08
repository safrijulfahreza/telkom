<!-- Begin Page Content -->
<div class="container-fluid">
    <link href="<?= base_url('assets/'); ?>css/stars.css" rel="stylesheet">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php if ($gangguan != null) : ?>
        <div class="card mb-3" style="max-width: 640px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/laporan/') . $gangguan['image']; ?>" class="card-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Nomor Tiket : <?= $gangguan['nomor_tiket']; ?></h5>
                        <p><?= $gangguan['perbaikan']; ?></p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Penilaian
                        </button>
                        <p class="card-text"><small class="text-muted">Terakhir Upadate <?= substr($gangguan['tgl_update'], -19, -9); ?></small></p>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <h3 class="text-center alert alert-success">Terimakasih telah menggunakan layanan kami</h3>
    <?php endif; ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Penilaian Konsumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3">Silahkan Berikan Penilaian Anda</label>
                        <div class="col-xs-8">
                            <section class='rating-widget'>
                                <!-- Rating Stars Box -->
                                <div class='rating-stars text-center'>
                                    <ul id='stars'>
                                        <li class='star' title='Poor' data-value='1'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Fair' data-value='2'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Good' data-value='3'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='Excellent' data-value='4'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star' title='WOW!!!' data-value='5'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                    </ul>
                                </div>
                                <form method="POST" action="<?= base_url('validasi/rate'); ?>">
                                    <textarea class="form-control" placeholder="Keterangan" row="3" id="ket" name="ket"></textarea>
                                    <input type="hidden" name="rate" id="rate">
                                    <input type="hidden" name="no_ti" id="no_ti" value="<?= $gangguan['nomor_tiket'] ?>">
                            </section>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function() {
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function(e) {
                    if (e < onStar) {
                        $(this).addClass('hover');
                    } else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function() {
                $(this).parent().children('li.star').each(function(e) {
                    $(this).removeClass('hover');
                });
            });


            /* 2. Action to perform on click */
            $('#stars li').on('click', function() {
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }

                // JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                rate(ratingValue);
            });

            function rate(ratingValue) {
                document.getElementById('rate').value = ratingValue;
            }


        });
    </script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->