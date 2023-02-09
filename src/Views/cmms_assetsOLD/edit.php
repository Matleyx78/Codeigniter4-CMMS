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
						<form class="row g-2" role="form" action="<?= site_url('/cmms_assets/update') ?>" method="post" enctype="multipart/form-data">
		                    <input type="hidden" name="id_asst" value="<?= $value['id_asst'] ?>">
							<div class="col-md-6">
							    <label class="form-label" for="asst_title">Asst Title</label>
							    <input type="text" name="asst_title" class="form-control" id="asst_title" value="<?php echo $value['asst_title']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="asst_description">Asst Description</label>
							    <input type="text" name="asst_description" class="form-control" id="asst_description" value="<?php echo $value['asst_description']; ?>">
			                </div>
							<div class="col-md-6">
                    <label>Asst Id Sect</label>
                    <select name="asst_id_sect" class="form-control">
                        <?php foreach($cmms_sectors as $ors): ?>
                            <option value="<?php echo $ors['id_sect']; ?>" <?php if ($value['asst_id_sect'] == $ors['id_sect']) echo "selected=\"selected\"";?> class="form-control" id="asst_id_sect"><?php echo $ors['id_sect']; ?></option>
                        <?php endforeach;?>
                    </select>							    
                </div>
							<div class="col-md-6">
                    <label>Asst Id Buil</label>
                    <select name="asst_id_buil" class="form-control">
                        <?php foreach($cmms_buildings as $ngs): ?>
                            <option value="<?php echo $ngs['id_buil']; ?>" <?php if ($value['asst_id_buil'] == $ngs['id_buil']) echo "selected=\"selected\"";?> class="form-control" id="asst_id_buil"><?php echo $ngs['id_buil']; ?></option>
                        <?php endforeach;?>
                    </select>							    
                </div>
							<div class="col-md-6">
							    <label class="form-label" for="asst_brand">Asst Brand</label>
							    <input type="text" name="asst_brand" class="form-control" id="asst_brand" value="<?php echo $value['asst_brand']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="asst_model">Asst Model</label>
							    <input type="text" name="asst_model" class="form-control" id="asst_model" value="<?php echo $value['asst_model']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="asst_targa">Asst Targa</label>
							    <input type="text" name="asst_targa" class="form-control" id="asst_targa" value="<?php echo $value['asst_targa']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="asst_frame_number">Asst Frame Number</label>
							    <input type="text" name="asst_frame_number" class="form-control" id="asst_frame_number" value="<?php echo $value['asst_frame_number']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="asst_serial_number">Asst Serial Number</label>
							    <input type="text" name="asst_serial_number" class="form-control" id="asst_serial_number" value="<?php echo $value['asst_serial_number']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="asst_tech_char">Asst Tech Char</label>
							    <input type="text" name="asst_tech_char" class="form-control" id="asst_tech_char" value="<?php echo $value['asst_tech_char']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="asst_fabbrication">Asst Fabbrication</label>
							    <input type="text" name="asst_fabbrication" class="form-control" id="asst_fabbrication" value="<?php echo $value['asst_fabbrication']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="asst_note">Asst Note</label>
							    <input type="text" name="asst_note" class="form-control" id="asst_note" value="<?php echo $value['asst_note']; ?>">
			                </div>
							<div class="col-md-6">
							    <label class="form-label" for="asst_revision">Asst Revision</label>
							    <input type="" name="asst_revision" class="form-control" id="asst_revision" value="<?php echo $value['asst_revision']; ?>">
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