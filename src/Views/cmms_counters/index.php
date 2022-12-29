<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Elenco Cmms_counters</a>
                        <form class="navbar-form navbar-left form-inline" role="form" action="<?php echo site_url('cmms_counters/search_id')?>" method="post">
                            
                                <input type="text" class="form-control" name="search_id" placeholder="Search id..." id="search_id">
                            
                                <button type="submit" class="btn btn-info" name="submit">Cerca...</button>
                        </form>
                            
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo site_url('cmms_counters/add') ?>"><span class="glyphicon glyphicon-plus"></span> Add Cmms_counters</a></li>
                    </ul>
                </div>
            </nav>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">                
                        <tr>
						<th>Cont Description</th>
						<th>Cont Value</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php if($cmms_counters): ?>
						<?php foreach($cmms_counters as $row): ?>
							<tr>
								<td><?php echo $row['cont_description']; ?></td>
								<td><?php echo $row['cont_value']; ?></td>
								<td>
									<a href="<?php echo site_url('/cmms_counters/edit/'.$row['id_cont']);?>" class="btn btn-warning btn-xs">Modifica</a>
									<a onclick="return confirm('Are you sure you want to delete this cmms_counter?')" href="<?php echo site_url('/cmms_counters/delete/'.$row['id_cont']);?>" class="btn btn-danger btn-xs">Elimina</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
				</table>
				<?php if (isset($pager)) : ?> 
					<div align="center">
						<?php $pagi_path = 'cmms_counters'; ?>
						<?php $pager->setPath($pagi_path); ?>
						<?= $pager->links() ?>
					</div>
				<?php endif ; ?>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>