<div class="row">
     <?php foreach ($get_data as $gd): ?>
<div class="col-xs-12 col-sm-6 col-md-4">
<div class="card card-login">
    <div class="card-block">
             <div class="card-title">Pengajar <?= $gd->namaus ?></div>
             <a href="<?= base_url('index.php/Con_admin/dash_detsiswa/'.$gd->id_user.'');?>" class="btn btn-primary">Lihat</a>
        </div>
    </div>
</div>
    <?php endforeach ?>
</div>

