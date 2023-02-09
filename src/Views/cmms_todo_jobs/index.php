<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Elenco Cmms_todo_jobs</a>
                        <form class="navbar-form navbar-left form-inline" role="form" action="<?php echo site_url('cmms_todo_jobs/search_id')?>" method="post">
                            
                                <input type="text" class="form-control" name="search_id" placeholder="Search id..." id="search_id">
                            
                                <button type="submit" class="btn btn-info" name="submit">Cerca...</button>
                        </form>
                            
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo site_url('cmms_todo_jobs/add') ?>"><span class="glyphicon glyphicon-plus"></span> Add Cmms_todo_jobs</a></li>
                    </ul>
                </div>
            </nav>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">                
                        <tr>
						<!-- <th>Tdjb Type</th> -->
						<th>Descrizion</th>
						<!-- <th>Attrezzi</th> -->
						<!-- <th>Creator</th> -->
						<th>Reference</th>
						<th>Supervisor</th>
						<!-- <th>Tdjb Id Buil</th> -->
						<!-- <th>Tdjb Id Sect</th> -->
						<th>Asset</th>
						<!-- <th>Contatore</th> -->
						<!-- <th>Int. Contatore</th> -->
						<th>Int_giorni</th>
						<th>Attivo</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php if($cmms_todo_jobs): ?>
						<?php foreach($cmms_todo_jobs as $row): ?>
							<tr>
								<!-- <td><?php echo $row['tdjb_type']; ?></td> -->
								<td><?php echo $row['tdjb_description']; ?></td>
								<!-- <td><?php echo $row['tdjb_tools']; ?></td> -->
								<!-- <td><?php echo $row['cre_name']; ?></td> -->
								<td><?php echo $row['ref_name']; ?></td>
								<td><?php echo $row['sup_name']; ?></td>
								<!-- <td><?php echo $row['tdjb_id_buil']; ?></td> -->
								<!-- <td><?php echo $row['tdjb_id_sect']; ?></td> -->
								<td><?php echo $row['asst_description']; ?></td>
								<!-- <td><?php echo $row['cont_description']; ?></td> -->
								<!-- <td><?php echo $row['coin_description']; ?></td> -->
								<td><?php echo $row['wdin_description']; ?></td>
								<td><?php echo $row['tdjb_job_active'] == TRUE ? 'Si' : 'No'; ?></td>
								<td>
									<a href="<?php echo site_url('/cmms_todo_jobs/detail/'.$row['id_tdjb']);?>" class="btn btn-info btn-xs">Dettagli</a>
									<!-- <a href="<?php echo site_url('/cmms_todo_jobs/edit/'.$row['id_tdjb']);?>" class="btn btn-warning btn-xs">Modifica</a> -->
									<!-- <a onclick="return confirm('Are you sure you want to delete this cmms_todo_job?')" href="<?php echo site_url('/cmms_todo_jobs/delete/'.$row['id_tdjb']);?>" class="btn btn-danger btn-xs">Elimina</a> -->
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
				</table>
				<?php if (isset($pager)) : ?> 
					<div align="center">
						<?php $pagi_path = 'cmms_todo_jobs'; ?>
						<?php $pager->setPath($pagi_path); ?>
						<?= $pager->links() ?>
					</div>
				<?php endif ; ?>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>