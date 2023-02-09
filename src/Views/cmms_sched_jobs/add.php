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
		                <form class="row g-2" role="form" action="<?= site_url('/cmms_sched_jobs/save') ?>" method="post">
							<div class="col-md-6">
							    <label>Scjb Id Tdjb</label>
                                <select name="scjb_id_tdjb" class="form-control">
                                    <?php foreach($cmms_todo_jobs as $obs): ?>
                                        <option value="<?php echo $obs['id_tdjb']; ?>" class="form-control" id="scjb_id_tdjb"><?php echo $obs['id_tdjb']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div>
							<div class="col-md-6">
							    <label>Scjb Status</label>
							    <input type="number" name="scjb_status" class="form-control" id="scjb_status" placeholder="Scjb Status">
			                </div>
							<div class="col-md-6">
							    <label>Scjb Execute By</label>
							    <input type="text" name="scjb_execute_by" class="form-control" id="scjb_execute_by" placeholder="Scjb Execute By">
			                </div>
							<div class="col-md-6">
							    <label>Scjb Time Exec Minut</label>
							    <input type="number" name="scjb_time_exec_minut" class="form-control" id="scjb_time_exec_minut" placeholder="Scjb Time Exec Minut">
			                </div>
							<div class="col-md-6">
							    <label>Scjb Comment</label>
							    <input type="text" name="scjb_comment" class="form-control" id="scjb_comment" placeholder="Scjb Comment">
			                </div>
							<div class="col-md-6">
							    <label>Scjb Note</label>
							    <input type="text" name="scjb_note" class="form-control" id="scjb_note" placeholder="Scjb Note">
			                </div>
							<div class="col-md-6">
							    <label>Scjb Execute At</label>
							    <input type="datetime" name="scjb_execute_at" class="form-control" id="scjb_execute_at" placeholder="Scjb Execute At">
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