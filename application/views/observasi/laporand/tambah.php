<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>Observasi/tambah" class="btn btn-primary">Upload Laporan</a>
        </div>

    </div>

    <div class="row mt-3">
        <!-- <div class="col-md-6"> -->
        <h3> Laporan Observasi Monitoring </h1>
            <!-- <ul class="list-group">
                    <?php foreach ($Observasi as $obs) : ?>
                        <li class="list-group-item"><?= $obs['No_spt']; ?></li>
                    <?php endforeach; ?>
                </ul>
        </div>
    </div> -->

            <div class="table-responsive-md">
                <table class="table table-bordered text-center" style="width:fit-content;">
                    <tr>
                        <td>No.</td>
                        <td>Tanggal</td>
                        <td>No.SPT</td>
                        <td>Judul</td>
                        <td>Lokasi</td>
                        <td>Jenis</td>
                        <td>file</td>
                    </tr>
                    <?php foreach ($Observasi as $obs) : ?>
                        <tr>
                            <td><?php echo $obs['id']; ?></td>
                            <td><?php echo $obs['Tanggal']; ?></td>
                            <td><?php echo $obs['No_spt']; ?></td>
                            <td><?php echo $obs['Judul']; ?></td>
                            <td><?php echo $obs['Lokasi']; ?></td>
                            <td><?php echo $obs['jenis']; ?></td>
                            <td><?php echo $obs['upload_file']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div>
            </div>