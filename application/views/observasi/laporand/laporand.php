<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    UPLOAD DATA LAPORAN
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors();  ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <form>
                            <div class="form-group">
                                <label for="No SPT">No.SPT</label>
                                <input type="text" name="no_spt" class="form-control" id="No SPT">
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control" id="judul">
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" id="lokasi">
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis Laporan</label>
                                <select class="form-control" id="jenis" name="jenis">
                                    <option value="Laporan Perjalanan Dinas">Laporan Perjalanan Dinas</option>
                                    <option value="Laporan Rol">Laporan Rol</option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="upload_file"></label>
                                <input type="file" name="file" class="form-control-file" id="upload_file">
                            </div> -->

                            <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>

                        </form>
                </div>
            </div>

        </div>


    </div>

</div>