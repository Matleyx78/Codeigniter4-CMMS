<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <?php $title = 'Dettagli lavoro n. ';
                        $title .= $value['id_tdjb'] . ' da eseguire su ' . $value['asst_description'];
                        ?>
                        <a class="navbar-brand" href="#"><?php echo $title; ?></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="<?php echo site_url('cmms_todo_jobs/add') ?>"><span class="glyphicon glyphicon-plus"></span> Add Cmms_todo_jobs</a></li> -->
                    </ul>
                </div>
            </nav>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <label>Tipo</label>
                        <p><?php echo $value['tdjb_type'] = 0 ? 'Monitoraggio' : 'Manutenzione'; ?></p>
                    </div>
                    <div class="col-md-3">
                        <label>Creator</label>
                        <p><?php echo $value['cre_name']; ?></p>
                    </div>
                    <div class="col-md-3">
                        <label>Referente</label>
                        <p><?php echo $value['ref_name']; ?></p>
                    </div>
                    <div class="col-md-3">
                        <label>Supervisore</label>
                        <p><?php echo $value['sup_name']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Descrizione</label>
                        <p><?php echo $value['tdjb_description']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <label>Attrezzi</label>
                        <p><?php echo $value['tdjb_tools']; ?></p>
                    </div>
                    <div class="col-md-3">
                        <label>Intervallo</label>
                        <p><?php echo $value['wdin_description']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Edificio</label>
                        <p><?php echo $value['buil_description']; ?></p>
                    </div>
                    <div class="col-md-4">
                        <label>Settore</label>
                        <p><?php echo $value['sect_description']; ?></p>
                    </div>
                    <div class="col-md-4">
                        <label>Asset</label>
                        <p><?php echo $value['asst_description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Elenco Programmazioni - Prossima scadenza <?php echo $scadenza->format('d/m/Y');?></a>                            
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                                <!-- <li><a href="<?php echo site_url('cmms_sched_jobs/add') ?>"><span class="glyphicon glyphicon-plus"></span> Add Cmms_sched_jobs</a></li> -->
                    </ul>
                </div>
            </nav>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">                
                        <tr>
						<!-- <th>Scjb Id Tdjb</th> -->
						<th>Stato</th>
						<th>Esecutore</th>
						<th>Tempo impiegato</th>
						<th>Commenti</th>
						<th>Note</th>
						<th>Data esecuzione</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
					<?php if($cmms_sched_jobs): ?>
						<?php foreach($cmms_sched_jobs as $row): ?>
							<tr>
                                <?php switch ($row['scjb_status']) {
                                        case 0:
                                            $status = 'Non Iniziata';
                                            break;
                                        case 1:
                                            $status = 'In corso';
                                            break;
                                        case 2:
                                            $status = 'Completata';
                                            break;
                                        default:
                                            $status = '-';
                                    }
                                ?>
								<!-- <td><?php echo $row['scjb_id_tdjb']; ?></td> -->
								<td><?php echo $status; ?></td>
								<td><?php echo $row['scjb_execute_by']; ?></td>
								<td><?php echo $row['scjb_time_exec_minut']; ?></td>
								<td><?php echo $row['scjb_comment']; ?></td>
								<td><?php echo $row['scjb_note']; ?></td>
								<td><?php echo mysql_to_human1($row['scjb_execute_at']); ?></td>
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
<?= $this->endSection() ?>