<div class="card card-login">
    <div class="card-block">
    	 			<table class="table table-bordered">
                       <thead>
                           <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                           </tr>
                       </thead>
                       <?php $no=1; foreach ($get_data2 as $gd2): ?>
                       <tbody>
                            <td><?= $no++; ?></td>
                            <td><?= $gd2->nama_anggota ?></td>
                            <td><?= $gd2->nama_kelas ?></td>
                            <td><button class="btn btn-danger" disabled>Hapus Siswa Ini</button></td>
                       </tbody>
                        <?php endforeach ?>
                   </table>

    </div>
</div>