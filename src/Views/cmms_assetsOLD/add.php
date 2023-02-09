<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<script type="text/javascript">
	$(document).ready(function(){

		var scegli = '<option value="0">Scegli...</option>';
		var attendere = '<option value="0">Attendere...</option>';
		
		$("select#province").html(scegli);
		$("select#province").attr("disabled", "disabled");
		$("select#comuni").html(scegli);
		$("select#comuni").attr("disabled", "disabled");
		
		
		$("select#regioni").change(function(){
			var regione = $("select#regioni option:selected").attr('value');
			$("select#province").html(attendere);
			$("select#province").attr("disabled", "disabled");
			$("select#comuni").html(scegli);
			$("select#comuni").attr("disabled", "disabled");
			
			$.post("<?php echo site_url('/ajax/selectprov'); ?>", {id_regione:regione}, function(data){
				$("select#province").removeAttr("disabled"); 
				$("select#province").html(data);	
			});
		});	
		
		$("select#province").change(function(){
			$("select#comuni").attr("disabled", "disabled");
			$("select#comuni").html(attendere);
			var provincia = $("select#province option:selected").attr('value');
			$.post("<?php echo site_url('/ajax/selectcom'); ?>", {id_provincia:provincia}, function(data){
				$("select#comuni").removeAttr("disabled");
				$("select#comuni").html(data);	
			});
		});	
	});
	
	</script>
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
		                <form class="row g-2" role="form" action="<?= site_url('/cmms_assets/save') ?>" method="post">
							<div class="col-md-6">
							    <label>Asst Title</label>
							    <input type="text" name="asst_title" class="form-control" id="asst_title" placeholder="Asst Title">
			                </div>
							<div class="col-md-6">
							    <label>Asst Description</label>
							    <input type="text" name="asst_description" class="form-control" id="asst_description" placeholder="Asst Description">
			                </div>
							<div class="col-md-6">
							    <label>Asst Id Sect</label>
                                <select name="asst_id_sect" class="form-control">
                                    <?php foreach($cmms_sectors as $ors): ?>
                                        <option value="<?php echo $ors['id_sect']; ?>" class="form-control" id="asst_id_sect"><?php echo $ors['sect_description']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div>
							<div class="col-md-6">
							    <label>Asst Id Buil</label>
                                <select name="asst_id_buil" class="form-control">
                                    <?php foreach($cmms_buildings as $ngs): ?>
                                        <option value="<?php echo $ngs['id_buil']; ?>" class="form-control" id="asst_id_buil"><?php echo $ngs['buil_description']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div>
							<div class="col-md-6">
							    <label>Asst Brand</label>
							    <input type="text" name="asst_brand" class="form-control" id="asst_brand" placeholder="Asst Brand">
			                </div>
							<div class="col-md-6">
							    <label>Asst Model</label>
							    <input type="text" name="asst_model" class="form-control" id="asst_model" placeholder="Asst Model">
			                </div>
							<div class="col-md-6">
							    <label>Asst Targa</label>
							    <input type="text" name="asst_targa" class="form-control" id="asst_targa" placeholder="Asst Targa">
			                </div>
							<div class="col-md-6">
							    <label>Asst Frame Number</label>
							    <input type="text" name="asst_frame_number" class="form-control" id="asst_frame_number" placeholder="Asst Frame Number">
			                </div>
							<div class="col-md-6">
							    <label>Asst Serial Number</label>
							    <input type="text" name="asst_serial_number" class="form-control" id="asst_serial_number" placeholder="Asst Serial Number">
			                </div>
							<div class="col-md-6">
							    <label>Asst Tech Char</label>
							    <input type="text" name="asst_tech_char" class="form-control" id="asst_tech_char" placeholder="Asst Tech Char">
			                </div>
							<div class="col-md-6">
							    <label>Asst Fabbrication</label>
							    <input type="text" name="asst_fabbrication" class="form-control" id="asst_fabbrication" placeholder="Asst Fabbrication">
			                </div>
							<div class="col-md-6">
							    <label>Asst Note</label>
							    <input type="text" name="asst_note" class="form-control" id="asst_note" placeholder="Asst Note">
			                </div>
							<div class="col-md-6">
							    <label>Asst Revision</label>
							    <input type="" name="asst_revision" class="form-control" id="asst_revision" placeholder="Asst Revision">
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