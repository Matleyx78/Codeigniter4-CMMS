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
						<form class="row g-2" role="form" action="<?= site_url('/cmms_spare_parts/update') ?>" method="post" enctype="multipart/form-data">
		                    <input type="hidden" name="id_sppa" value="<?= $value['id_sppa'] ?>">
							<div class="col-md-6">
                    <label>Sppa Id Asst</label>
                    <select name="sppa_id_asst" class="form-control">
                        <?php foreach($cmms_assets as $ets): ?>
                            <option value="<?php echo $ets['id_asst']; ?>" <?php if ($value['sppa_id_asst'] == $ets['id_asst']) echo "selected=\"selected\"";?> class="form-control" id="sppa_id_asst"><?php echo $ets['id_asst']; ?></option>
                        <?php endforeach;?>
                    </select>							    
                </div>
							<div class="col-md-6">
							    <label class="form-label" for="sppa_description">Sppa Description</label>
							    <input type="text" name="sppa_description" class="form-control" id="sppa_description" value="<?php echo $value['sppa_description']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="sppa_brand">Sppa Brand</label>
							    <input type="text" name="sppa_brand" class="form-control" id="sppa_brand" value="<?php echo $value['sppa_brand']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="sppa_model">Sppa Model</label>
							    <input type="text" name="sppa_model" class="form-control" id="sppa_model" value="<?php echo $value['sppa_model']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="sppa_useful_info">Sppa Useful Info</label>
							    <input type="text" name="sppa_useful_info" class="form-control" id="sppa_useful_info" value="<?php echo $value['sppa_useful_info']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="sppa_comment">Sppa Comment</label>
							    <input type="text" name="sppa_comment" class="form-control" id="sppa_comment" value="<?php echo $value['sppa_comment']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="sppa_note">Sppa Note</label>
							    <input type="text" name="sppa_note" class="form-control" id="sppa_note" value="<?php echo $value['sppa_note']; ?>">
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