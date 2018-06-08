<div class="card card-login">
    <div class="card-block">
       <div id="notif"><?= $this->session->flashdata('msg_regkel'); ?>
        <?= $this->session->flashdata('msg_delkel'); ?></div>
        <div class="row">
            <form action="<?= base_url('index.php/Con_pengajar/register_kelas');?>" method="post"> 
                <div class="form-group">
                    <label>Masukkan Kelas</label>
                    <select name="nama_kelas" class="form-control">
                        <?php foreach ($get_data2 as $gd2): ?>
                            <option value="<?= $gd2->macam_kelas ?>"><?= $gd2->macam_kelas ?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="submit" name="submit" value=Tambah class="btn btn-success" onclick="return confirm('Tambah Kelas Ini?')">
                </div>

            </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                         <tbody>
                            <?php $no=1; foreach ($get_data as $gd): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $gd->nama_kelas ?></td>
                                <td><a href="<?= base_url('index.php/Con_pengajar/delete_kelas/'.$gd->id_kelas.'');?>"><button class="btn btn-danger" onclick="return confirm('Hapus Kelas Ini?')">Hapus Kelas</button></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

            </div>
        </div>
</div>