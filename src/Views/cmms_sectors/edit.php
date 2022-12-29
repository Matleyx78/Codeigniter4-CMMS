<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Modifica settore
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<form role="form" action="<?= site_url('/cmms_sectors/update') ?>" method="post" enctype="multipart/form-data">
							<div class="row clearfix">
								<input type="hidden" name="id_sect" value="<?= $value['id_sect'] ?>">
								<div class="col-md-6">
									<label class="form-label" for="sect_description">Descrizione settore</label>
									<div class="form-group">
										<input type="text" name="sect_description" class="form-control" id="sect_description" value="<?php echo $value['sect_description']; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<label>Edificio</label>
									<div class="form-group">
										<select name="sect_id_buil" class="form-control">
											<?php foreach ($cmms_buildings as $ngs) : ?>
												<option value="<?php echo $ngs['id_buil']; ?>" <?php if ($value['sect_id_buil'] == $ngs['id_buil']) echo "selected=\"selected\""; ?> class="form-control" id="sect_id_buil"><?php echo $ngs['buil_description']; ?></option>
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