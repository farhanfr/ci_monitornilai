<div class="card card-login">
    <div class="card-block">
        <div class="row">
        	<?php foreach ($get_data as $gd): ?>
        		
        	
        	<form action="<?= base_url('index.php/Con_pengajar/update_nilai');?>" method="post">
        		
        		<input type="hidden" name="id_data_siswa_bekas" value="<?= $gd->id_data_siswa ?>" placeholder="">
        		<input type="hidden" name="id_kelas" value="<?= $gd->id_kelas ?>" placeholder="">

        		<div class="form-group">
        			<label>t1</label>
        			<input type="number" name="t1" value="<?= $gd->t1 ?>" class="form-control">
        		</div>

        		<div class="form-group">
        			<label>t2</label>
        			<input type="number" name="t2" value="<?= $gd->t2 ?>" class="form-control">
        		</div>

        		<div class="form-group">
        			<label>t3</label>
        			<input type="number" name="t3" value="<?= $gd->t3 ?>" class="form-control">
        		</div>

        		<div class="form-group">
        			<label>t4</label>
        			<input type="number" name="t4" value="<?= $gd->t4 ?>" class="form-control">
        		</div>

        		<div class="form-group">
        			<label>t5</label>
        			<input type="number" name="t5" value="<?= $gd->t5 ?>" class="form-control">
        		</div>

        		<div class="form-group">
        			<label>UAS</label>
        			<input type="number" name="uas" value="<?= $gd->t5 ?>" class="form-control">
        		</div>

        		<input type="submit" name="submit" value="Atur Nilai" class="btn btn-info">
        	</form>

        	<?php endforeach ?>


        </div>
    </div>
</div>