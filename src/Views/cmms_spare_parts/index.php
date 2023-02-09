<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Elenco Cmms_spare_parts</a>
                        <form class="navbar-form navbar-left form-inline" role="form" action="<?php echo site_url('cmms_spare_parts/search_id')?>" method="post">
                            
                                <input type="text" class="form-control" name="search_id" placeholder="Search id..." id="search_id">
                            
                                <button type="submit" class="btn btn-info" name="submit">Cerca...</button>
                        </form>
                            
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo site_url('cmms_spare_parts/add') ?>"><span class="glyphicon glyphicon-plus"></span> Add Cmms_spare_parts</a></li>
                    </ul>
                </div>
            </nav>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">                
                        <tr>
						<th>Sppa Id Asst</th>
						<th>Sppa Description</th>
						<th>Sppa Brand</th>
						<th>Sppa Model</th>
						<th>Sppa Useful Info</th>
						<th>Sppa Comment</th>
						<th>Sppa Note</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php if($cmms_spare_parts): ?>
						<?php foreach($cmms_spare_parts as $row): ?>
							<tr>
								<td><?php echo $row['sppa_id_asst']; ?></td>
								<td><?php echo $row['sppa_description']; ?></td>
								<td><?php echo $row['sppa_brand']; ?></td>
								<td><?php echo $row['sppa_model']; ?></td>
								<td><?php echo $row['sppa_useful_info']; ?></td>
								<td><?php echo $row['sppa_comment']; ?></td>
								<td><?php echo $row['sppa_note']; ?></td>
								<td>
									<a href="<?php echo site_url('/cmms_spare_parts/edit/'.$row['id_sppa']);?>" class="btn btn-warning btn-xs">Modifica</a>
									<a onclick="return confirm('Are you sure you want to delete this cmms_spare_part?')" href="<?php echo site_url('/cmms_spare_parts/delete/'.$row['id_sppa']);?>" class="btn btn-danger btn-xs">Elimina</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
				</table>
				<?php if (isset($pager)) : ?> 
					<div align="center">
						<?php $pagi_path = 'cmms_spare_parts'; ?>
						<?php $pager->setPath($pagi_path); ?>
						<?= $pager->links() ?>
					</div>
				<?php endif ; ?>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>