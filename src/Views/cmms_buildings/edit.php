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
						<form role="form" action="<?= site_url('/cmms_buildings/update') ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_buil" value="<?= $value['id_buil'] ?>">
							<div class="row clearfix">
								<div class="col-md-6">
									<label class="form-label" for="buil_description">Buil Description</label>
									<div class="form-group">
										<input type="text" name="buil_description" class="form-control" id="buil_description" value="<?php echo $value['buil_description']; ?>">
									</div>
								</div>
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