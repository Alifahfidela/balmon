<!-- Page Heading -->
<div class="row m-3" >
    <h1 class="h3 text-gray-800 ">Pengukuran Parameter Teknis</h1>
</div>

<div class="row m-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Upload
    </button>
</div>

<div class="row m-3">
<!-- DataTales Example -->
    <div class="card shadow col-12 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Laporan Pengukuran Parameter Teknis</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.SPT</th>
                            <th>Tanggal SPT</th>
                            <th>Judul</th>
                            <th>Lokasi</th>
                            <th>Jenis Laporan</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id='form'>
                <div class="form-group">
                    <label for="exampleInputEmail1">No.SPT</label>
                    <input name='no_spt' type="text" class="form-control" id="exampleInputEmail1" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal SPT</label>
                    <input name='tanggal' type="date" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputJudul">Judul</label>
                    <input name='judul' type="text" class="form-control" id="exampleInputJudul">
                </div>
                <div class="form-group">
                    <label for="exampleInputLokasi">Lokasi</label>
                    <select class="form-control" id="exampleInputLokasi" name="lokasi">
                        <option value="Kabupaten Banyuasin">Kabupaten Banyuasin</option>
                        <option value="Kabupaten Empat Lawang">Kabupaten Empat Lawang</option>
                        <option value="Kabupaten Lahat">Kabupaten Lahat</option>
                        <option value="Kabupaten Muara Enim">Kabupaten Muara Enim</option>
                        <option value="Kabupaten Musi Banyuasin">Kabupaten Musi Banyuasin</option>
                        <option value="Kabupaten Musi Rawas">Kabupaten Musi Rawas</option>
                        <option value="Kabupaten Musi Rawas Utara">Kabupaten Musi Rawas Utara</option>
                        <option value="Kabupaten Ogan Ilir">Kabupaten Ogan Ilir</option>
                        <option value="Kabupaten Ogan Komering Ilir">Kabupaten Ogan Komering Ilir</option>
                        <option value="Kabupaten Ogan Komering Ulu">Kabupaten Ogan Komering Ulu</option>
                        <option value="Kabupaten Ogan Komering Ulu Selatan">Kabupaten Ogan Komering Ulu Selatan</option>
                        <option value="Kabupaten Ogan Komering Ulu Timur">Kabupaten Ogan Komering Ulu Timur</option>
                        <option value="Kabupaten Penukal Abab Lematang Ilir">Kabupaten Penukal Abab Lematang Ilir</option>
                        <option value="Kota Lubuklinggau">Kota Lubuklinggau</option>
                        <option value="Kota Pagar Alam">Kota Pagar Alam</option>
                        <option value="Kota Palembang">Kota Palembang</option>
                        <option value="Kota Prabumulih">Kota Prabumulih</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputJenis">Jenis Laporan</label>
                    <select class="form-control" id="exampleInputJenis" name="jenis">
                        <option value="1">Laporan Perjalanan Dinas</option>
                        <option value="2">Laporan ROL</option>
                        <option value="3">Lampiran Gambar</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">File</label>
                    <input name='berkas' type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var tabel = $('#dataTable').DataTable();
        $('#form').submit(function () {
            event.preventDefault();
            $.ajax({
                url:"<?=base_url()?>index.php/Pengukuran/insertData",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                enctype: 'multipart/form-data',
            }).done(function(msg){
                const res = JSON.parse(msg);
                if(res['status'] == 1){
                    console.log('berhasil');
                    renderTabel();
                    $('#exampleModal').modal('hide');
                } else{
                    console.log('gagal')
                    console.log(res['msg']);
                }
            })
        })
        function renderTabel(){
            tabel.clear().draw(false);
            $.ajax({
                method: "POST",
                url:"<?=base_url()?>index.php/Pengukuran/getAllPengukuran"
            }).done(function(msg){
                const data = JSON.parse(msg);
                for (let i = 0; i< data.length; i++){
                    const jenis = data[i]['jenis'];
                    let tipedata;
                    if(jenis == '1'){
                        jenisB = 'Laporan Perjalanan Dinas'
                        tipedata = 'pdf';
                    }else if(jenis == '2'){
                        jenisB = 'Laporan Rol'
                        tipedata = 'xml';
                    }else{
                        jenisB = 'Gambar'
                        tipedata = 'jpg';
                    }
                    tabel.row.add([
                        data[i]['no_spt'],
                        data[i]['tanggal'],
                        data[i]['judul'],
                        data[i]['lokasi'],
                        jenisB,
                        `<a href="<?=base_url()?>upload/${tipedata}/${data[i]['namaberkas']}">${data[i]['namaberkas']}</a>`,
                    ]).draw(false)
                }
            })
        }
        renderTabel();
    })
</script>
