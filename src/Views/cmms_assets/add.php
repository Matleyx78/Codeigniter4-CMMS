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
		                <form role="form" action="<?= site_url('/cmms_assets/save') ?>" method="post">
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_id_maccimpi">Asst Id Maccimpi</label>
									<div class="form-group">
                                        <input type="number" name="asst_id_maccimpi" class="form-control" id="asst_id_maccimpi" placeholder="Asst Id Maccimpi">
                                    </div>    
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_title">Asst Title</label>
									<div class="form-group">
                                        <input type="text" name="asst_title" class="form-control" id="asst_title" placeholder="Asst Title">
                                    </div>    
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_description">Asst Description</label>
									<div class="form-group">
                                        <input type="text" name="asst_description" class="form-control" id="asst_description" placeholder="Asst Description">
                                    </div>    
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_id_sect">Asst Id Sect</label>
                                    <div class="form-group">
                                        <select name="asst_id_sect" class="form-control">
                                            <?php foreach($cmms_sectors as $ors): ?>
                                                <option value="<?php echo $ors['id_sect']; ?>" class="form-control" id="asst_id_sect"><?php echo $ors['id_sect']; ?></option>
                                            <?php endforeach;?>
                                        </select>	
                                    </div>
                                </div>    						    
			                </div>
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_id_buil">Asst Id Buil</label>
                                    <div class="form-group">
                                        <select name="asst_id_buil" class="form-control">
                                            <?php foreach($cmms_buildings as $ngs): ?>
                                                <option value="<?php echo $ngs['id_buil']; ?>" class="form-control" id="asst_id_buil"><?php echo $ngs['id_buil']; ?></option>
                                            <?php endforeach;?>
                                        </select>	
                                    </div>
                                </div>    						    
			                </div>
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_brand">Asst Brand</label>
									<div class="form-group">
                                        <input type="text" name="asst_brand" class="form-control" id="asst_brand" placeholder="Asst Brand">
                                    </div>    
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_model">Asst Model</label>
									<div class="form-group">
                                        <input type="text" name="asst_model" class="form-control" id="asst_model" placeholder="Asst Model">
                                    </div>    
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_targa">Asst Targa</label>
									<div class="form-group">
                                        <input type="text" name="asst_targa" class="form-control" id="asst_targa" placeholder="Asst Targa">
                                    </div>    
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_frame_number">Asst Frame Number</label>
									<div class="form-group">
                                        <input type="text" name="asst_frame_number" class="form-control" id="asst_frame_number" placeholder="Asst Frame Number">
                                    </div>    
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_serial_number">Asst Serial Number</label>
									<div class="form-group">
                                        <input type="text" name="asst_serial_number" class="form-control" id="asst_serial_number" placeholder="Asst Serial Number">
                                    </div>    
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_tech_char">Asst Tech Char</label>
									<div class="form-group">
                                        <input type="text" name="asst_tech_char" class="form-control" id="asst_tech_char" placeholder="Asst Tech Char">
                                    </div>    
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_fabbrication">Asst Fabbrication</label>
									<div class="form-group">
                                        <input type="text" name="asst_fabbrication" class="form-control" id="asst_fabbrication" placeholder="Asst Fabbrication">
                                    </div>    
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_note">Asst Note</label>
									<div class="form-group">
                                        <input type="text" name="asst_note" class="form-control" id="asst_note" placeholder="Asst Note">
                                    </div>    
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-md-6"> <label class="form-label" for="asst_revision">Asst Revision</label>
									<div class="form-group">
                                        <input type="" name="asst_revision" class="form-control" id="asst_revision" placeholder="Asst Revision">
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