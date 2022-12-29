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
		                <form class="row g-2" role="form" action="<?= site_url('/cmms_spare_parts/save') ?>" method="post">
							<div class="col-md-6">
							    <label>Sppa Id Asst</label>
                                <select name="sppa_id_asst" class="form-control">
                                    <?php foreach($cmms_assets as $ets): ?>
                                        <option value="<?php echo $ets['id_asst']; ?>" class="form-control" id="sppa_id_asst"><?php echo $ets['id_asst']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div>
							<div class="col-md-6">
							    <label>Sppa Description</label>
							    <input type="text" name="sppa_description" class="form-control" id="sppa_description" placeholder="Sppa Description">
			                </div>
							<div class="col-md-6">
							    <label>Sppa Brand</label>
							    <input type="text" name="sppa_brand" class="form-control" id="sppa_brand" placeholder="Sppa Brand">
			                </div>
							<div class="col-md-6">
							    <label>Sppa Model</label>
							    <input type="text" name="sppa_model" class="form-control" id="sppa_model" placeholder="Sppa Model">
			                </div>
							<div class="col-md-6">
							    <label>Sppa Useful Info</label>
							    <input type="text" name="sppa_useful_info" class="form-control" id="sppa_useful_info" placeholder="Sppa Useful Info">
			                </div>
							<div class="col-md-6">
							    <label>Sppa Comment</label>
							    <input type="text" name="sppa_comment" class="form-control" id="sppa_comment" placeholder="Sppa Comment">
			                </div>
							<div class="col-md-6">
							    <label>Sppa Note</label>
							    <input type="text" name="sppa_note" class="form-control" id="sppa_note" placeholder="Sppa Note">
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