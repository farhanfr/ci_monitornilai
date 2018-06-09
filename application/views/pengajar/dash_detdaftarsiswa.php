<div class="card card-login">
    <div class="card-block">
        <div class="row">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Klik Disini Untuk Cari siswa...." class="form-control">
            <div class="table-responsive">
                <div id="notif"><?= $this->session->flashdata('msg_upnilai'); ?></div>
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr class="header">
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>T1</th>
                                <th>T2</th>
                                <th>T3</th>
                                <th>T4</th>
                                <th>T5</th>
                                <th>UAS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                        <?php foreach ($get_data as $gd): ?>     
                            <tr>
                                <td><?= $gd->nama_anggota ?></td>
                                <td><?= $gd->nama_kelas ?></td>
                                <td class="<?php if($gd->t1 < "75") {
                                    echo 'bg-danger';
                                }?>"><?= $gd->t1 ?></td>
                                <td class="<?php if($gd->t2 < "75") {
                                    echo 'bg-danger';
                                }?>"><?= $gd->t2 ?></td>
                                <td class="<?php if($gd->t3 < "75") {
                                    echo 'bg-danger';
                                }?>"><?= $gd->t3 ?></td>
                                <td class="<?php if($gd->t4 < "75") {
                                    echo 'bg-danger';
                                }?>"><?= $gd->t4 ?></td>
                                <td class="<?php if($gd->t5 < "75") {
                                    echo 'bg-danger';
                                }?>"><?= $gd->t5 ?></td>
                                <td class="<?php if($gd->uas < "75") {
                                    echo 'bg-danger';
                                }?>"><?= $gd->uas ?></td>
                                <td>
                                    <a href="<?= base_url('index.php/Con_pengajar/dash_updatenilai/'.$gd->id_data_siswa.'');?>"><button class="btn btn-info">Atur Nilai</button></a>
                                    <a href="<?= base_url('index.php/Con_pengajar/delete_siswa/'.$gd->id_data_siswa.'');?>"><button class="btn btn-danger" onclick="return confirm('Hapus Siswa Ini?')">Hapus Siswa</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                    <h5>Keterangan : </h5>
                    <ol>
                        <li>KKM 75 (Kotak akan merah saat nilai dibawah KKM)</li>
                    </ol>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript">
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

