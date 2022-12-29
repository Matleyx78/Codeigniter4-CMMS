<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Elenco Cmms_co_intervals</a>
                        <form class="navbar-form navbar-left form-inline" role="form" action="<?php echo site_url('cmms_co_intervals/search_id')?>" method="post">
                            
                                <input type="text" class="form-control" name="search_id" placeholder="Search id..." id="search_id">
                            
                                <button type="submit" class="btn btn-info" name="submit">Cerca...</button>
                        </form>
                            
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo site_url('cmms_co_intervals/add') ?>"><span class="glyphicon glyphicon-plus"></span> Add Cmms_co_intervals</a></li>
                    </ul>
                </div>
            </nav>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">                
                        <tr>
						<th>Coin Description</th>
						<th>Coin Value</th>
						<th>Coin Id Cont</th>
						<th>Coin First Ad</th>
						<th>Coin Second Ad</th>
						<th>Coin Last Ad</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php if($cmms_co_intervals): ?>
						<?php foreach($cmms_co_intervals as $row): ?>
							<tr>
								<td><?php echo $row['coin_description']; ?></td>
								<td><?php echo $row['coin_value']; ?></td>
								<td><?php echo $row['coin_id_cont']; ?></td>
								<td><?php echo $row['coin_first_ad']; ?></td>
								<td><?php echo $row['coin_second_ad']; ?></td>
								<td><?php echo $row['coin_last_ad']; ?></td>
								<td>
									<a href="<?php echo site_url('/cmms_co_intervals/edit/'.$row['id_coin']);?>" class="btn btn-warning btn-xs">Modifica</a>
									<a onclick="return confirm('Are you sure you want to delete this cmms_co_interval?')" href="<?php echo site_url('/cmms_co_intervals/delete/'.$row['id_coin']);?>" class="btn btn-danger btn-xs">Elimina</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
					</tbody>
				</table>
				<?php if (isset($pager)) : ?> 
					<div align="center">
						<?php $pagi_path = 'cmms_co_intervals'; ?>
						<?php $pager->setPath($pagi_path); ?>
						<?= $pager->links() ?>
					</div>
				<?php endif ; ?>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>