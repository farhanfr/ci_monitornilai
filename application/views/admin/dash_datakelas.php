<div class="card card-login">
    <div class="card-block">
    <div id="notif"><?= $this->session->flashdata('msg_delkel'); ?></div>
       
            <h3>Macam Kelas saat ini</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Kelas</button>
                <table class="table table-bordered">
                    
                       <thead>
                           <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                           </tr>
                       </thead>
                       <?php $no=1; foreach ($get_data2 as $gd2): ?>
                       <tbody>
                            <td><?= $no++; ?></td>
                            <td><?= $gd2->macam_kelas ?></td>
                            <td><a href="<?= base_url('index.php/Con_admin/delete_macamkelas/'.$gd2->id_macam_kelas.'');?>"><button class="btn btn-danger" onclick="return confirm('Hapus Kelas Ini?')">Hapus Kelas</button></a></td>
                       </tbody>
                        <?php endforeach ?>
                   </table>


                   <h3>Nama Pengajar & kelas digunakan</h3>
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                                <th>No</th>
                                <th>Nama Pengajar</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                           </tr>
                       </thead>
                       <tbody>
                        <?php $no=1; foreach ($get_data as $gd): ?>
                           <tr>
                               <td><?= $no++; ?></td>
                               <td><?= $gd->namaus ?></td>
                               <td><?= $gd->nama_kelas ?></td>
                               <td>
                                   <a href="<?= base_url('index.php/Con_admin/delete_kelas/'.$gd->id_kelas.'');?>"><button class="btn btn-danger" onclick="return confirm('Hapus Kelas Ini?')">Hapus Kelas</button></a>
                               </td>
                           </tr>
                        <?php endforeach ?>
                       </tbody>
                   </table>
                </div>
            </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('index.php/Con_admin/register_jeniskelas');?>" method="post">
            <div class="form-group">
                <input type="text" name="macam_kelas" value="" placeholder="Masukkan Nama Kelas" class="form-control">
            </div>
            <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
        </form>

      </div>
    </div>
  </div>
</div>