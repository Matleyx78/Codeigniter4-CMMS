<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Aggiungi settore
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<div class="text-danger">
							<?php if (!empty($errors)) : ?>
								<?php foreach ($errors as $field => $error) : ?>
									<div class="text-danger"> <?= $error; ?> </div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<form role="form" action="<?= site_url('/cmms_sectors/save') ?>" method="post">
							<div class="row clearfix">
								<div class="col-md-6">
									<label>Sect Description</label>
									<div class="form-group">
										<input type="text" name="sect_description" class="form-control" id="sect_description" placeholder="Sect Description">
									</div>
								</div>
								<div class="col-md-6">
									<label>Sect Id Buil</label>
									<div class="form-group">
										<select name="sect_id_buil" class="form-control">
											<?php foreach ($cmms_buildings as $ngs) : ?>
												<option value="<?php echo $ngs['id_buil']; ?>" class="form-control" id="sect_id_buil"><?php echo $ngs['buil_description']; ?></option>
											<?php endforeach; ?>
										</select>
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