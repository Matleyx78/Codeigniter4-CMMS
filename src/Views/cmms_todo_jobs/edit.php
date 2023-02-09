<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Modifica record
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
						<form class="row g-2" role="form" action="<?= site_url('/cmms_todo_jobs/update') ?>" method="post" enctype="multipart/form-data">
		                    <input type="hidden" name="id_tdjb" value="<?= $value['id_tdjb'] ?>">
							<div class="col-md-6">
							    <label class="form-label" for="tdjb_type">Tdjb Type</label>
							    <input type="" name="tdjb_type" class="form-control" id="tdjb_type" value="<?php echo $value['tdjb_type']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="tdjb_description">Tdjb Description</label>
							    <input type="text" name="tdjb_description" class="form-control" id="tdjb_description" value="<?php echo $value['tdjb_description']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="tdjb_tools">Tdjb Tools</label>
							    <input type="text" name="tdjb_tools" class="form-control" id="tdjb_tools" value="<?php echo $value['tdjb_tools']; ?>">
			                </div>
							<div class="col-md-6">
                    <label>Tdjb Id Mtnr Creator</label>
                    <select name="tdjb_id_mtnr_creator" class="form-control">
                        <?php foreach($cmms_manteiners as $ers): ?>
                            <option value="<?php echo $ers['id_mtnr']; ?>" <?php if ($value['tdjb_id_mtnr_creator'] == $ers['id_mtnr']) echo "selected=\"selected\"";?> class="form-control" id="tdjb_id_mtnr_creator"><?php echo $ers['id_mtnr']; ?></option>
                        <?php endforeach;?>
                    </select>							    
                </div>
							<div class="col-md-6">
                    <label>Tdjb Id Mtnr Reference</label>
                    <select name="tdjb_id_mtnr_reference" class="form-control">
                        <?php foreach($cmms_manteiners as $ers): ?>
                            <option value="<?php echo $ers['id_mtnr']; ?>" <?php if ($value['tdjb_id_mtnr_reference'] == $ers['id_mtnr']) echo "selected=\"selected\"";?> class="form-control" id="tdjb_id_mtnr_reference"><?php echo $ers['id_mtnr']; ?></option>
                        <?php endforeach;?>
                    </select>							    
                </div>
							<div class="col-md-6">
                    <label>Tdjb Id Mtnr Supervisor</label>
                    <select name="tdjb_id_mtnr_supervisor" class="form-control">
                        <?php foreach($cmms_manteiners as $ers): ?>
                            <option value="<?php echo $ers['id_mtnr']; ?>" <?php if ($value['tdjb_id_mtnr_supervisor'] == $ers['id_mtnr']) echo "selected=\"selected\"";?> class="form-control" id="tdjb_id_mtnr_supervisor"><?php echo $ers['id_mtnr']; ?></option>
                        <?php endforeach;?>
                    </select>							    
                </div>
							<div class="col-md-6">
                    <label>Tdjb Id Buil</label>
                    <select name="tdjb_id_buil" class="form-control">
                        <?php foreach($cmms_buildings as $ngs): ?>
                            <option value="<?php echo $ngs['id_buil']; ?>" <?php if ($value['tdjb_id_buil'] == $ngs['id_buil']) echo "selected=\"selected\"";?> class="form-control" id="tdjb_id_buil"><?php echo $ngs['id_buil']; ?></option>
                        <?php endforeach;?>
                    </select>							    
                </div>
							<div class="col-md-6">
                    <label>Tdjb Id Sect</label>
                    <select name="tdjb_id_sect" class="form-control">
                        <?php foreach($cmms_sectors as $ors): ?>
                            <option value="<?php echo $ors['id_sect']; ?>" <?php if ($value['tdjb_id_sect'] == $ors['id_sect']) echo "selected=\"selected\"";?> class="form-control" id="tdjb_id_sect"><?php echo $ors['id_sect']; ?></option>
                        <?php endforeach;?>
                    </select>							    
                </div>
							<div class="col-md-6">
                    <label>Tdjb Id Asst</label>
                    <select name="tdjb_id_asst" class="form-control">
                        <?php foreach($cmms_assets as $ets): ?>
                            <option value="<?php echo $ets['id_asst']; ?>" <?php if ($value['tdjb_id_asst'] == $ets['id_asst']) echo "selected=\"selected\"";?> class="form-control" id="tdjb_id_asst"><?php echo $ets['id_asst']; ?></option>
                        <?php endforeach;?>
                    </select>							    
                </div>
							<div class="col-md-6">
                    <label>Tdjb Id Cont</label>
                    <select name="tdjb_id_cont" class="form-control">
                        <?php foreach($cmms_counters as $ers): ?>
                            <option value="<?php echo $ers['id_cont']; ?>" <?php if ($value['tdjb_id_cont'] == $ers['id_cont']) echo "selected=\"selected\"";?> class="form-control" id="tdjb_id_cont"><?php echo $ers['id_cont']; ?></option>
                        <?php endforeach;?>
                    </select>							    
                </div>
							<div class="col-md-6">
                    <label>Tdjb Id Coin</label>
                    <select name="tdjb_id_coin" class="form-control">
                        <?php foreach($cmms_co_intervals as $als): ?>
                            <option value="<?php echo $als['id_coin']; ?>" <?php if ($value['tdjb_id_coin'] == $als['id_coin']) echo "selected=\"selected\"";?> class="form-control" id="tdjb_id_coin"><?php echo $als['id_coin']; ?></option>
                        <?php endforeach;?>
                    </select>							    
                </div>
							<div class="col-md-6">
                    <label>Tdjb Id Wdin</label>
                    <select name="tdjb_id_wdin" class="form-control">
                        <?php foreach($cmms_wd_intervals as $als): ?>
                            <option value="<?php echo $als['id_wdin']; ?>" <?php if ($value['tdjb_id_wdin'] == $als['id_wdin']) echo "selected=\"selected\"";?> class="form-control" id="tdjb_id_wdin"><?php echo $als['id_wdin']; ?></option>
                        <?php endforeach;?>
                    </select>							    
                </div>
							<div class="col-md-6">
							    <label class="form-label" for="tdjb_job_active">Tdjb Job Active</label>
							    <input type="" name="tdjb_job_active" class="form-control" id="tdjb_job_active" value="<?php echo $value['tdjb_job_active']; ?>">
			                </div>
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