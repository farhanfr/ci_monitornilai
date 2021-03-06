<div class="card card-login">
    <div class="card-block">
        <div class="row">
            <div class="d-flex flex-wrap">
                <div>
                    <form action="<?= base_url('index.php/Con_pengajar/register_siswa');?>" method="post">
                         <h3 class="card-title">Form Register Siswa</h3>
                         <div id="notif"><?= $this->session->flashdata('msg_regsis'); ?></div>
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" name="nama_anggota" placeholder="Masukkan nama" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Kelas Siswa (Jika Kosong <?= anchor('Con_pengajar/dash_kelas_saya', 'Klik disini'); ?>)</label>
                                <select class="form-control" name="kelas">
                                     <?php foreach ($get_data as $gd): ?>
                                    <option value="<?= $gd->id_kelas ?>"><?= $gd->nama_kelas ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <input type="submit" name="submit" value="Tambah" class="btn btn-success" onclick="return confirm('Tambah Siswa ini?')">
                         </form>  
                </div>
            <div class="ml-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

