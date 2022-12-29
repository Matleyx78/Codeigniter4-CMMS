<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Elenco Cmms_sched_jobs</a>
                        <form class="navbar-form navbar-left form-inline" role="form" action="<?php echo site_url('cmms_sched_jobs/search_id')?>" method="post">
                            
                                <input type="text" class="form-control" name="search_id" placeholder="Search id..." id="search_id">
                            
                                <button type="submit" class="btn btn-info" name="submit">Cerca...</button>
                        </form>
                            
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo site_url('cmms_sched_jobs/add') ?>"><span class="glyphicon glyphicon-plus"></span> Add Cmms_sched_jobs</a></li>
                    </ul>
                </div>
            </nav>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">                
                        <tr>
						<th>Scjb Id Tdjb</th>
						<th>Scjb Status</th>
						<th>Scjb Execute By</th>
						<th>Scjb Time Exec Minut</th>
						<th>Scjb Comment</th>
						<th>Scjb Note</th>
						<th>Scjb Execute At</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php if($cmms_sched_jobs): ?>
						<?php foreach($cmms_sched_jobs as $row): ?>
							<tr>
								<td><?php echo $row['scjb_id_tdjb']; ?></td>
								<td><?php echo $row['scjb_status']; ?></td>
								<td><?php echo $row['scjb_execute_by']; ?></td>
								<td><?php echo $row['scjb_time_exec_minut']; ?></td>
								<td><?php echo $row['scjb_comment']; ?></td>
								<td><?php echo $row['scjb_note']; ?></td>
								<td><?php echo $row['scjb_execute_at']; ?></td>
								<td>
									<a href="<?php echo site_url('/cmms_sched_jobs/edit/'.$row['id_scjb']);?>" class="btn btn-warning btn-xs">Modifica</a>
									<a onclick="return confirm('Are you sure you want to delete this cmms_sched_job?')" href="<?php echo site_url('/cmms_sched_jobs/delete/'.$row['id_scjb']);?>" class="btn btn-danger btn-xs">Elimina</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
				</table>
				<?php if (isset($pager)) : ?> 
					<div align="center">
						<?php $pagi_path = 'cmms_sched_jobs'; ?>
						<?php $pager->setPath($pagi_path); ?>
						<?= $pager->links() ?>
					</div>
				<?php endif ; ?>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>