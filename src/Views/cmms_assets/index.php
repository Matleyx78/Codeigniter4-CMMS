<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Elenco Cmms_assets</a>
                        <form class="navbar-form navbar-left form-inline" role="form" action="<?php echo site_url('cmms_assets/search_id')?>" method="post">
                            
                                <input type="text" class="form-control" name="search_id" placeholder="Search id..." id="search_id">
                            
                                <button type="submit" class="btn btn-info" name="submit">Cerca...</button>
                        </form>
                            
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo site_url('cmms_assets/add') ?>"><span class="glyphicon glyphicon-plus"></span> Add Cmms_assets</a></li>
                    </ul>
                </div>
            </nav>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">                
                        <tr>
						<!-- <th>Asst Id Maccimpi</th>
						<th>Asst Title</th> -->
						<th>Asst Description</th>
						<th>Asst Id Sect</th>
						<th>Asst Id Buil</th>
						<!-- <th>Asst Brand</th>
						<th>Asst Model</th>
						<th>Asst Targa</th>
						<th>Asst Frame Number</th>
						<th>Asst Serial Number</th>
						<th>Asst Tech Char</th>
						<th>Asst Fabbrication</th>
						<th>Asst Note</th>
						<th>Asst Revision</th> -->
						<th>Action</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php if($cmms_assets): ?>
						<?php foreach($cmms_assets as $row): ?>
							<tr>
								<!-- <td><?php echo $row['asst_id_maccimpi']; ?></td>
								<td><?php echo $row['asst_title']; ?></td> -->
								<td><?php echo $row['asst_description']; ?></td>
								<td><?php echo $row['sect_description']; ?></td>
								<td><?php echo $row['buil_description']; ?></td>
								<!-- <td><?php echo $row['asst_brand']; ?></td>
								<td><?php echo $row['asst_model']; ?></td>
								<td><?php echo $row['asst_targa']; ?></td>
								<td><?php echo $row['asst_frame_number']; ?></td>
								<td><?php echo $row['asst_serial_number']; ?></td>
								<td><?php echo $row['asst_tech_char']; ?></td>
								<td><?php echo $row['asst_fabbrication']; ?></td>
								<td><?php echo $row['asst_note']; ?></td>
								<td><?php echo $row['asst_revision']; ?></td> -->
								<td>
									<a href="<?php echo site_url('/cmms_todo_jobs/jobs_by_ast/'.$row['id_asst']);?>" class="btn btn-warning btn-xs">Lavori</a>
									<!-- <a href="<?php echo site_url('cmms_report/tdjb_by_asst/'.$row['id_asst']);?>" class="btn btn-warning btn-xs">Lavori</a> -->
									<!-- <a onclick="return confirm('Are you sure you want to delete this cmms_asset?')" href="<?php echo site_url('/cmms_assets/delete/'.$row['id_asst']);?>" class="btn btn-danger btn-xs">Elimina</a> -->
								</td>
								<td>
									<a href="<?php echo site_url('/cmms_assets/edit/'.$row['id_asst']);?>" class="btn btn-warning btn-xs">Modifica</a>
									<a onclick="return confirm('Are you sure you want to delete this cmms_asset?')" href="<?php echo site_url('/cmms_assets/delete/'.$row['id_asst']);?>" class="btn btn-danger btn-xs">Elimina</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
				</table>
				<?php if (isset($pager)) : ?> 
					<div align="center">
						<?php $pagi_path = 'cmms_assets'; ?>
						<?php $pager->setPath($pagi_path); ?>
						<?= $pager->links() ?>
					</div>
				<?php endif ; ?>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>