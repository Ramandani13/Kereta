<div class="container my-4">
    <div class="card">
        <div class='card-header bg-primary text-white'>INFO PERJALANAN</div>

        <div class='card-body'>
            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Nama Kereta</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" value='<?= $info->nama_kereta ?>'>
                </div>
            </div>

            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Waktu Berangkat</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" value='<?= $info->tgl_berangkat ?>'>
                </div>
            </div>

            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Waktu Tiba</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" value='<?= $info->tgl_sampai ?>'>
                </div>
            </div>

            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Rute</label>
                </div>
                <div class='col-md-9'>
                    <span> Dari</span>
                    <input class='form-control' readonly disabled type="text" value='<?= $info->ASAL ?>'>
                    <span> Ke </span>
                    <input class='form-control' readonly disabled type="text" value='<?= $info->TUJUAN ?>'>
                </div>
            </div>

            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Jumlah Penumpang</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" value='<?= $_GET['p'] ?>'>
                </div>
            </div>

            <div class='form-group form-inline'>
                <div class='col-md-2'>
                    <label>Harga Per Tiket</label>
                </div>
                <div class='col-md-9'>
                    <input class='form-control' readonly disabled type="text" 
                    value='<?= 'Rp. '.number_format($info->harga, 0, ',',  '.') ?>'>
                </div>
            </div>
        </div>
    </div>
    <br>
    <form action="<?= base_url('pesanTiket') ?>" method='POST'>
    <input type="hidden" name='penumpang' value='<?= $_GET['p'] ?>'>
    <input type="hidden" name='id_jadwal' value='<?= $id_jadwal ?>'>
    <input type="hidden" name='harga' value='<?= $info->harga ?>'>

    <div class='card'>
        <div class='card-header bg-primary text-white'>Detail Penumpang</div>
        <div class='card-body'>
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>>= 17 Tahun Nomor ID(KTP, SIM, PASPORT)*</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=1; $i<=$_GET['p'];$i++): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td>
                            <input type="text" class='form-control' name='nama<?= $i ?>' required>
                        </td>
                        <td>
                            <input type="text" class='form-control' name='identitas<?= $i ?>' required>
                        </td>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class='card'>
        <div class='card-header bg-primary text-white'>Detail Pemesan</div>
        <div class='card-body'>
            <div class='row'>
                <div class='col-md-4'>
                    <div class='form-group'>
                        <label>Nama</label>
                        <input class='form-control' type="text" name='nama_pemesan' placeholder='Nama Pemesan' required>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='form-group'>
                        <label>Email</label>
                        <input class='form-control' type="email" name='email' placeholder='Email Pemesan' required>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='form-group'>
                        <label>No.Telp</label>
                        <input class='form-control' type="text" name='no_telp' placeholder='Nomor Telepon Pemesan' required>
                    </div>
                </div>
                <div class='clearfix'></div>
                <div class='col-md-12'>
                    <div class='form-group'>
                        <label>Alamat</label>
                        <textarea name="alamat" class='form-control' rows="10" placeholder='Alamat Pemesan' required></textarea>
                    </div>
                </div>
            </div>

            <button class='btn btn-success float-right'>Simpan & Lanjutkan</button>
        </div>
    </div>
    </form>
</div>