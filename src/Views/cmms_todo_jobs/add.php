<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Aggiungi record
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
		            	<div class="text-danger">
							<?php if (!empty($errors)): ?>
	                            <?php foreach ($errors as $field => $error) : ?>
	                                <div class="text-danger"> <?= $error; ?> </div>
	                            <?php endforeach; ?>
	                        <?php endif; ?>
						</div>
		                <form class="row g-2" role="form" action="<?= site_url('/cmms_todo_jobs/save') ?>" method="post">
							<div class="col-md-6">
							    <label>Tdjb Type</label>
							    <input type="" name="tdjb_type" class="form-control" id="tdjb_type" placeholder="Tdjb Type">
			                </div>
							<div class="col-md-6">
							    <label>Tdjb Description</label>
							    <input type="text" name="tdjb_description" class="form-control" id="tdjb_description" placeholder="Tdjb Description">
			                </div>
							<div class="col-md-6">
							    <label>Tdjb Tools</label>
							    <input type="text" name="tdjb_tools" class="form-control" id="tdjb_tools" placeholder="Tdjb Tools">
			                </div>
							<div class="col-md-6">
							    <label>Tdjb Id Mtnr Creator</label>
                                <select name="tdjb_id_mtnr_creator" class="form-control">
                                    <?php foreach($cmms_manteiners_creator as $ers_c): ?>
                                        <option value="<?php echo $ers_c['id_mtnr']; ?>" class="form-control" id="tdjb_id_mtnr_creator"><?php echo $ers_c['mtnr_username']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div>
							<div class="col-md-6">
							    <label>Tdjb Id Mtnr Reference</label>
                                <select name="tdjb_id_mtnr_reference" class="form-control">
                                    <?php foreach($cmms_manteiners_reference as $ers_r): ?>
                                        <option value="<?php echo $ers_r['id_mtnr']; ?>" class="form-control" id="tdjb_id_mtnr_reference"><?php echo $ers_r['mtnr_username']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div>
							<div class="col-md-6">
							    <label>Tdjb Id Mtnr Supervisor</label>
                                <select name="tdjb_id_mtnr_supervisor" class="form-control">
                                    <?php foreach($cmms_manteiners_supervisor as $ers_s): ?>
                                        <option value="<?php echo $ers_s['id_mtnr']; ?>" class="form-control" id="tdjb_id_mtnr_supervisor"><?php echo $ers_s['mtnr_username']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div>
							<div class="col-md-6">
							    <label>Tdjb Id Buil</label>
                                <select name="tdjb_id_buil" class="form-control">
                                    <?php foreach($cmms_buildings as $ngs): ?>
                                        <option value="<?php echo $ngs['id_buil']; ?>" class="form-control" id="tdjb_id_buil"><?php echo $ngs['buil_description']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div>
							<div class="col-md-6">
							    <label>Tdjb Id Sect</label>
                                <select name="tdjb_id_sect" class="form-control">
                                    <?php foreach($cmms_sectors as $ors): ?>
                                        <option value="<?php echo $ors['id_sect']; ?>" class="form-control" id="tdjb_id_sect"><?php echo $ors['sect_description']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div>
							<div class="col-md-6">
							    <label>Tdjb Id Asst</label>
                                <select name="tdjb_id_asst" class="form-control">
                                    <?php foreach($cmms_assets as $ets): ?>
                                        <option value="<?php echo $ets['id_asst']; ?>" class="form-control" id="tdjb_id_asst"><?php echo $ets['asst_description']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div>
							<!-- <div class="col-md-6">
							    <label>Tdjb Id Cont</label>
                                <select name="tdjb_id_cont" class="form-control">
                                    <?php foreach($cmms_counters as $ers): ?>
                                        <option value="<?php echo $ers['id_cont']; ?>" class="form-control" id="tdjb_id_cont"><?php echo $ers['id_cont']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div>
							<div class="col-md-6">
							    <label>Tdjb Id Coin</label>
                                <select name="tdjb_id_coin" class="form-control">
                                    <?php foreach($cmms_co_intervals as $als): ?>
                                        <option value="<?php echo $als['id_coin']; ?>" class="form-control" id="tdjb_id_coin"><?php echo $als['id_coin']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div> -->
							<div class="col-md-6">
							    <label>Tdjb Id Wdin</label>
                                <select name="tdjb_id_wdin" class="form-control">
                                    <?php foreach($cmms_wd_intervals as $als): ?>
                                        <option value="<?php echo $als['id_wdin']; ?>" class="form-control" id="tdjb_id_wdin"><?php echo $als['wdin_description']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div>
							<!-- <div class="col-md-6">
							    <label>Tdjb Job Active</label>
							    <input type="" name="tdjb_job_active" class="form-control" id="tdjb_job_active" placeholder="Tdjb Job Active">
			                </div> -->
					<div class="form-group">
                            <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Salva
                            </button>
                    </div>
							<!-- <div class="col-md-12 d-flex justify-content-between align-items-center">
			                    <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
			                    <button type="submit" id="submit" class="btn btn-primary btn-sm">Save</button>
			                </div> -->
		                </form>
		            </div>
		        </div>
		    </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>