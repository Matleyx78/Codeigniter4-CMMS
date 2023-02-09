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
						<form class="row g-2" role="form" action="<?= site_url('/cmms_manteiners/update') ?>" method="post" enctype="multipart/form-data">
		                    <input type="hidden" name="id_mtnr" value="<?= $value['id_mtnr'] ?>">
							<div class="col-md-6">
							    <label class="form-label" for="mtnr_username">Mtnr Username</label>
							    <input type="text" name="mtnr_username" class="form-control" id="mtnr_username" value="<?php echo $value['mtnr_username']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="mtnr_email">Mtnr Email</label>
							    <input type="text" name="mtnr_email" class="form-control" id="mtnr_email" value="<?php echo $value['mtnr_email']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="mtnr_id_shield">Mtnr Id Shield</label>
							    <input type="number" name="mtnr_id_shield" class="form-control" id="mtnr_id_shield" value="<?php echo $value['mtnr_id_shield']; ?>">
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