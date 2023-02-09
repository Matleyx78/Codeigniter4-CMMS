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
						<form class="row g-2" role="form" action="<?= site_url('/cmms_counters/update') ?>" method="post" enctype="multipart/form-data">
		                    <input type="hidden" name="id_cont" value="<?= $value['id_cont'] ?>">
							<div class="col-md-6">
							    <label class="form-label" for="cont_description">Cont Description</label>
							    <input type="text" name="cont_description" class="form-control" id="cont_description" value="<?php echo $value['cont_description']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="cont_value">Cont Value</label>
							    <input type="number" name="cont_value" class="form-control" id="cont_value" value="<?php echo $value['cont_value']; ?>">
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