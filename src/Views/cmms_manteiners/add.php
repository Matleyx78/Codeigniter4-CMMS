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
		                <form class="row g-2" role="form" action="<?= site_url('/cmms_manteiners/save') ?>" method="post">
							<div class="col-md-6">
							    <label>Mtnr Username</label>
							    <input type="text" name="mtnr_username" class="form-control" id="mtnr_username" placeholder="Mtnr Username">
			                </div>
							<div class="col-md-6">
							    <label>Mtnr Email</label>
							    <input type="text" name="mtnr_email" class="form-control" id="mtnr_email" placeholder="Mtnr Email">
			                </div>
							<div class="col-md-6">
							    <label>Mtnr Id Shield</label>
							    <input type="number" name="mtnr_id_shield" class="form-control" id="mtnr_id_shield" placeholder="Mtnr Id Shield">
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