<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Elenco Cmms_manteiners</a>
                        <form class="navbar-form navbar-left form-inline" role="form" action="<?php echo site_url('cmms_manteiners/search_id')?>" method="post">
                            
                                <input type="text" class="form-control" name="search_id" placeholder="Search id..." id="search_id">
                            
                                <button type="submit" class="btn btn-info" name="submit">Cerca...</button>
                        </form>
                            
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo site_url('cmms_manteiners/add') ?>"><span class="glyphicon glyphicon-plus"></span> Add Cmms_manteiners</a></li>
                    </ul>
                </div>
            </nav>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">                
                        <tr>
						<th>Mtnr Username</th>
						<th>Mtnr Email</th>
						<th>Mtnr Id Shield</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php if($cmms_manteiners): ?>
						<?php foreach($cmms_manteiners as $row): ?>
							<tr>
								<td><?php echo $row['mtnr_username']; ?></td>
								<td><?php echo $row['mtnr_email']; ?></td>
								<td><?php echo $row['mtnr_id_shield']; ?></td>
								<td>
									<a href="<?php echo site_url('/cmms_manteiners/edit/'.$row['id_mtnr']);?>" class="btn btn-warning btn-xs">Modifica</a>
									<a onclick="return confirm('Are you sure you want to delete this cmms_manteiner?')" href="<?php echo site_url('/cmms_manteiners/delete/'.$row['id_mtnr']);?>" class="btn btn-danger btn-xs">Elimina</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
				</table>
				<?php if (isset($pager)) : ?> 
					<div align="center">
						<?php $pagi_path = 'cmms_manteiners'; ?>
						<?php $pager->setPath($pagi_path); ?>
						<?= $pager->links() ?>
					</div>
				<?php endif ; ?>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>