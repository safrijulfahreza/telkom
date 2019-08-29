<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=File.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<table border="1" width="100%">
    <thead>

        <tr>

            <th>NO</th>

            <th>NOMOR TIKET</th>
            <th>STATUS</th>

            <th>LAYANAN</th>
            <th>SEGEMEN</th>
            <th>NAMA TEKNISI 1</th>
            <th>NAMA TEKNISI 2</th>
            <th>NAMA HELPDESK</th>
            <th>STO</th>
            <th>ALPRO</th>
            <th>SUB SEGMENTASI</th>
            <th>KETERANGAN</th>
            <th>TGL INPUT</th>
            <th>TGL UPDATE</th>
            <th>SLEEVE</th>
            <th>ADAPTOR</th>
            <th>PRECON 50</th>
            <th>PRECON 75</th>
            <th>PRECON 100</th>
            <th>PRECON 150</th>
            <th>PS 1:4</th>
            <th>PS 1:8</th>
            <th>PIGTAIL</th>

        </tr>

    </thead>

    <tbody>

        <?php $i = 1;
        foreach ($data as $data) { ?>

            <tr>

                <td><?php echo $i ?></td>

                <td><?php echo $data['nomor_tiket'] ?></td>
                <td><?php echo $data['status'] ?></td>
                <td><?php echo $data['layanan'] ?></td>
                <td><?php echo $data['segmen'] ?></td>
                <td><?php echo $data['teknisi1'] ?></td>
                <td><?php echo $data['teknisi2'] ?></td>
                <td><?php echo $data['helpdesk'] ?></td>
                <td><?php echo $data['sto'] ?></td>
                <td><?php echo $data['alpro'] ?></td>
                <td><?php echo $data['perbaikan'] ?></td>
                <td><?php echo $data['keterangan'] ?></td>
                <td><?php echo substr($data['tgl_input'], -19, -9) ?></td>
                <td><?php echo substr($data['tgl_input'], -19, -9) ?></td>
                <td><?php echo $data['sleeve'] ?></td>
                <td><?php echo $data['adaptor'] ?></td>
                <td><?php echo $data['precon50'] ?></td>
                <td><?php echo $data['precon75'] ?></td>
                <td><?php echo $data['precon100'] ?></td>
                <td><?php echo $data['precon150'] ?></td>
                <td><?php echo $data['ps1:4'] ?></td>
                <td><?php echo $data['ps1:8'] ?></td>
                <td><?php echo $data['pigtail'] ?></td>


            </tr>

        <?php $i++;
        } ?>

    </tbody>

</table>