<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Elenco Edifici</a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo site_url('cmms_buildings/add') ?>"><span class="glyphicon glyphicon-plus"></span> Aggiungi Edificio</a></li>
					</ul>
				</div>
			</nav>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<tr>
							<th>Descrizione</th>
							<th>Settori</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
							<?php if ($cmms_buildings) : ?>
								<?php foreach ($cmms_buildings as $row) : ?>
									<tr>
										<td><?php echo $row['buil_description']; ?></td>
										<td>
											<a href="<?php echo site_url('/cmms_sectors/sect_by_build/' . $row['id_buil']); ?>" class="btn btn-info btn-xs">Vedi Settori</a>
										</td>
										<td>
											<a href="<?php echo site_url('/cmms_buildings/edit/' . $row['id_buil']); ?>" class="btn btn-warning btn-xs">Modifica</a>
											<a onclick="return confirm('Are you sure you want to delete this cmms_building?')" href="<?php echo site_url('/cmms_buildings/delete/' . $row['id_buil']); ?>" class="btn btn-danger btn-xs">Elimina</a>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
						</tbody>
					</table>
					<?php if (isset($pager)) : ?>
						<div align="center">
							<?php $pagi_path = 'cmms_buildings'; ?>
							<?php $pager->setPath($pagi_path); ?>
							<?= $pager->links() ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
	<?= $this->endSection(); ?>