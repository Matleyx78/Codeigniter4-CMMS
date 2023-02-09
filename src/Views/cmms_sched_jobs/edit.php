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
						<form class="row g-2" role="form" action="<?= site_url('/cmms_sched_jobs/update') ?>" method="post" enctype="multipart/form-data">
		                    <input type="hidden" name="id_scjb" value="<?= $value['id_scjb'] ?>">
							<div class="col-md-6">
                    <label>Scjb Id Tdjb</label>
                    <select name="scjb_id_tdjb" class="form-control">
                        <?php foreach($cmms_todo_jobs as $obs): ?>
                            <option value="<?php echo $obs['id_tdjb']; ?>" <?php if ($value['scjb_id_tdjb'] == $obs['id_tdjb']) echo "selected=\"selected\"";?> class="form-control" id="scjb_id_tdjb"><?php echo $obs['id_tdjb']; ?></option>
                        <?php endforeach;?>
                    </select>							    
                </div>
							<div class="col-md-6">
							    <label class="form-label" for="scjb_status">Scjb Status</label>
							    <input type="number" name="scjb_status" class="form-control" id="scjb_status" value="<?php echo $value['scjb_status']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="scjb_execute_by">Scjb Execute By</label>
							    <input type="text" name="scjb_execute_by" class="form-control" id="scjb_execute_by" value="<?php echo $value['scjb_execute_by']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="scjb_time_exec_minut">Scjb Time Exec Minut</label>
							    <input type="number" name="scjb_time_exec_minut" class="form-control" id="scjb_time_exec_minut" value="<?php echo $value['scjb_time_exec_minut']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="scjb_comment">Scjb Comment</label>
							    <input type="text" name="scjb_comment" class="form-control" id="scjb_comment" value="<?php echo $value['scjb_comment']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="scjb_note">Scjb Note</label>
							    <input type="text" name="scjb_note" class="form-control" id="scjb_note" value="<?php echo $value['scjb_note']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="scjb_execute_at">Scjb Execute At</label>
							    <input type="datetime" name="scjb_execute_at" class="form-control" id="scjb_execute_at" value="<?php echo $value['scjb_execute_at']; ?>">
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