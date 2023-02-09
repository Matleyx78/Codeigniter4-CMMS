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
		                <form class="row g-2" role="form" action="<?= site_url('/cmms_counters/save') ?>" method="post">
							<div class="col-md-6">
							    <label>Cont Description</label>
							    <input type="text" name="cont_description" class="form-control" id="cont_description" placeholder="Cont Description">
			                </div>
							<div class="col-md-6">
							    <label>Cont Value</label>
							    <input type="number" name="cont_value" class="form-control" id="cont_value" placeholder="Cont Value">
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