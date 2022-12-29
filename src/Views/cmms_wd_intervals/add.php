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
		                <form class="row g-2" role="form" action="<?= site_url('/cmms_wd_intervals/save') ?>" method="post">
							<div class="col-md-6">
							    <label>Wdin Description</label>
							    <input type="text" name="wdin_description" class="form-control" id="wdin_description" placeholder="Wdin Description">
			                </div>
							<div class="col-md-6">
							    <label>Wdin Years</label>
							    <input type="number" name="wdin_years" class="form-control" id="wdin_years" placeholder="Wdin Years">
			                </div>
							<div class="col-md-6">
							    <label>Wdin Months</label>
							    <input type="number" name="wdin_months" class="form-control" id="wdin_months" placeholder="Wdin Months">
			                </div>
							<div class="col-md-6">
							    <label>Wdin Days</label>
							    <input type="number" name="wdin_days" class="form-control" id="wdin_days" placeholder="Wdin Days">
			                </div>
							<div class="col-md-6">
							    <label>Wdin Work Days</label>
							    <input type="number" name="wdin_work_days" class="form-control" id="wdin_work_days" placeholder="Wdin Work Days">
			                </div>
							<div class="col-md-6">
							    <label>Wdin First Ad</label>
							    <input type="number" name="wdin_first_ad" class="form-control" id="wdin_first_ad" placeholder="Wdin First Ad">
			                </div>
							<div class="col-md-6">
							    <label>Wdin Second Ad</label>
							    <input type="number" name="wdin_second_ad" class="form-control" id="wdin_second_ad" placeholder="Wdin Second Ad">
			                </div>
							<div class="col-md-6">
							    <label>Wdin Last Ad</label>
							    <input type="number" name="wdin_last_ad" class="form-control" id="wdin_last_ad" placeholder="Wdin Last Ad">
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