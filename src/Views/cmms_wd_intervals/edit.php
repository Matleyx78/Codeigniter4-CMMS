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
						<form class="row g-2" role="form" action="<?= site_url('/cmms_wd_intervals/update') ?>" method="post" enctype="multipart/form-data">
		                    <input type="hidden" name="id_wdin" value="<?= $value['id_wdin'] ?>">
							<div class="col-md-6">
							    <label class="form-label" for="wdin_description">Wdin Description</label>
							    <input type="text" name="wdin_description" class="form-control" id="wdin_description" value="<?php echo $value['wdin_description']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="wdin_years">Wdin Years</label>
							    <input type="number" name="wdin_years" class="form-control" id="wdin_years" value="<?php echo $value['wdin_years']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="wdin_months">Wdin Months</label>
							    <input type="number" name="wdin_months" class="form-control" id="wdin_months" value="<?php echo $value['wdin_months']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="wdin_days">Wdin Days</label>
							    <input type="number" name="wdin_days" class="form-control" id="wdin_days" value="<?php echo $value['wdin_days']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="wdin_work_days">Wdin Work Days</label>
							    <input type="number" name="wdin_work_days" class="form-control" id="wdin_work_days" value="<?php echo $value['wdin_work_days']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="wdin_first_ad">Wdin First Ad</label>
							    <input type="number" name="wdin_first_ad" class="form-control" id="wdin_first_ad" value="<?php echo $value['wdin_first_ad']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="wdin_second_ad">Wdin Second Ad</label>
							    <input type="number" name="wdin_second_ad" class="form-control" id="wdin_second_ad" value="<?php echo $value['wdin_second_ad']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="wdin_last_ad">Wdin Last Ad</label>
							    <input type="number" name="wdin_last_ad" class="form-control" id="wdin_last_ad" value="<?php echo $value['wdin_last_ad']; ?>">
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