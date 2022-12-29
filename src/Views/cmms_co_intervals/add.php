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
		                <form class="row g-2" role="form" action="<?= site_url('/cmms_co_intervals/save') ?>" method="post">
							<div class="col-md-6">
							    <label>Coin Description</label>
							    <input type="text" name="coin_description" class="form-control" id="coin_description" placeholder="Coin Description">
			                </div>
							<div class="col-md-6">
							    <label>Coin Value</label>
							    <input type="number" name="coin_value" class="form-control" id="coin_value" placeholder="Coin Value">
			                </div>
							<div class="col-md-6">
							    <label>Coin Id Cont</label>
                                <select name="coin_id_cont" class="form-control">
                                    <?php foreach($cmms_counters as $ers): ?>
                                        <option value="<?php echo $ers['id_cont']; ?>" class="form-control" id="coin_id_cont"><?php echo $ers['id_cont']; ?></option>
                                    <?php endforeach;?>
                                </select>							    
			                </div>
							<div class="col-md-6">
							    <label>Coin First Ad</label>
							    <input type="number" name="coin_first_ad" class="form-control" id="coin_first_ad" placeholder="Coin First Ad">
			                </div>
							<div class="col-md-6">
							    <label>Coin Second Ad</label>
							    <input type="number" name="coin_second_ad" class="form-control" id="coin_second_ad" placeholder="Coin Second Ad">
			                </div>
							<div class="col-md-6">
							    <label>Coin Last Ad</label>
							    <input type="number" name="coin_last_ad" class="form-control" id="coin_last_ad" placeholder="Coin Last Ad">
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