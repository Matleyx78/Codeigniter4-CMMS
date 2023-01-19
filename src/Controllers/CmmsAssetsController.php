<?php

namespace Matleyx\CI4CMMS\Controllers;

use CodeIgniter\Controller;
use Matleyx\CI4CMMS\Models\CmmsAssetsModel;

use Matleyx\CI4CMMS\Models\CmmsBuildingsModel;
use Matleyx\CI4CMMS\Models\CmmsSectorsModel;

class CmmsAssetsController extends Controller
{
	protected $cmms_asset;
	protected $cmms_buildings;
	protected $cmms_sectors;
	/**
	 * CmmsAssetsController constructor.
	 */
	public function __construct()
	{
		if (auth()->loggedIn()) {
			$user = auth()->user();
			if (!$user->inGroup('manteiners')) {
				echo 'Access denied';
				exit;
			}
		} else {
			echo 'Access denied';
			exit;
		}
		$this->cmms_asset = new CmmsAssetsModel();
		$this->cmms_buildings = new CmmsBuildingsModel;
		$this->cmms_sectors = new CmmsSectorsModel;
	}

	public function index()
	{
		$tot_assets = $this->cmms_asset->get_all_cmms_assets();
		$pager = service('pager');
		$page = (int)(($this->request->getVar('page') !== null) ? $this->request->getVar('page') : 1) - 1;
		$perPage =  12;
		$total = count($tot_assets);
		$pager->makeLinks($page + 1, $perPage, $total);
		$offset = $page * $perPage;
		$data['cmms_assets'] = $this->cmms_asset->get_all_cmms_assets($perPage, $offset);
		$data['pager'] = $pager;
		return view('Matleyx\CI4CMMS\Views\cmms_assets/index', $data);
	}

	public function add()
	{
		$data['buildingdb'] = $this->cmms_buildings->findAll();
		$buildings = '<option value="0">Scegli...</option>';
		foreach ($data['buildingdb'] as $row) {
			$buildings .= '<option value="' . $row['id_buil'] . '" class="form-control" id="asst_id_buil">' . utf8_encode($row['buil_description']) . '</option>';
		}
		$data['cmms_buildings'] = $buildings;
		$data['cmms_sectors'] = $this->cmms_sectors->findAll();

		return view('Matleyx\CI4CMMS\Views\cmms_assets/add', $data);
	}

	public function save()
	{
		$data['cmms_buildings'] = $this->cmms_buildings->findAll();
		$data['cmms_sectors'] = $this->cmms_sectors->findAll();

		$asst_title = $this->request->getPost('asst_title');
		$asst_description = $this->request->getPost('asst_description');
		$asst_id_sect = $this->request->getPost('asst_id_sect');
		$asst_id_buil = $this->request->getPost('asst_id_buil');
		$asst_brand = $this->request->getPost('asst_brand');
		$asst_model = $this->request->getPost('asst_model');
		$asst_targa = $this->request->getPost('asst_targa');
		$asst_frame_number = $this->request->getPost('asst_frame_number');
		$asst_serial_number = $this->request->getPost('asst_serial_number');
		$asst_tech_char = $this->request->getPost('asst_tech_char');
		$asst_fabbrication = $this->request->getPost('asst_fabbrication');
		$asst_note = $this->request->getPost('asst_note');
		$asst_revision = $this->request->getPost('asst_revision');

		$insert_data = [
			'asst_title' => $asst_title,
			'asst_description' => $asst_description,
			'asst_id_sect' => $asst_id_sect,
			'asst_id_buil' => $asst_id_buil,
			'asst_brand' => $asst_brand,
			'asst_model' => $asst_model,
			'asst_targa' => $asst_targa,
			'asst_frame_number' => $asst_frame_number,
			'asst_serial_number' => $asst_serial_number,
			'asst_tech_char' => $asst_tech_char,
			'asst_fabbrication' => $asst_fabbrication,
			'asst_note' => $asst_note,
			'asst_revision' => $asst_revision
		];
		if ($this->cmms_asset->save($insert_data) == false) {
			$data['errors'] = $this->cmms_asset->errors();
			return view('Matleyx\CI4CMMS\Views\cmms_assets/add', $data);
		} else {
			return redirect('cmms_assets');
		}
	}

	public function edit($id)
	{
		$data['value'] = $this->cmms_asset->j_find($id);
		//$data['cmms_buildings'] = $this->cmms_buildings->findAll();
		$data['buildingdb'] = $this->cmms_buildings->findAll();
		$buildings = '<option value="0">Scegli...</option>';
		foreach ($data['buildingdb'] as $row) {
			if ($row['id_buil'] == $data['value']['asst_id_buil']){
				$buildings .= '<option value="' . $row['id_buil'] . '" class="form-control" id="asst_id_buil" selected="selected">' . utf8_encode($row['buil_description']) . '</option>';
			}else{
				$buildings .= '<option value="' . $row['id_buil'] . '" class="form-control" id="asst_id_buil">' . utf8_encode($row['buil_description']) . '</option>';
			}
		}
		$data['cmms_buildings'] = $buildings;
		$data['cmms_sectors'] = $this->cmms_sectors->sec_by_bui($data['value']['asst_id_buil']);

		//$data['value'] = $cmms_asset;
		return view('Matleyx\CI4CMMS\Views\cmms_assets/edit', $data);
	}

	public function update()
	{
		$id = $this->request->getPost('id_asst');
		$asst_title = $this->request->getPost('asst_title');
		$asst_description = $this->request->getPost('asst_description');
		$asst_id_sect = $this->request->getPost('asst_id_sect');
		$asst_id_buil = $this->request->getPost('asst_id_buil');
		$asst_brand = $this->request->getPost('asst_brand');
		$asst_model = $this->request->getPost('asst_model');
		$asst_targa = $this->request->getPost('asst_targa');
		$asst_frame_number = $this->request->getPost('asst_frame_number');
		$asst_serial_number = $this->request->getPost('asst_serial_number');
		$asst_tech_char = $this->request->getPost('asst_tech_char');
		$asst_fabbrication = $this->request->getPost('asst_fabbrication');
		$asst_note = $this->request->getPost('asst_note');
		$asst_revision = $this->request->getPost('asst_revision');

		$insert_data = [
			'asst_title' => $asst_title,
			'asst_description' => $asst_description,
			'asst_id_sect' => $asst_id_sect,
			'asst_id_buil' => $asst_id_buil,
			'asst_brand' => $asst_brand,
			'asst_model' => $asst_model,
			'asst_targa' => $asst_targa,
			'asst_frame_number' => $asst_frame_number,
			'asst_serial_number' => $asst_serial_number,
			'asst_tech_char' => $asst_tech_char,
			'asst_fabbrication' => $asst_fabbrication,
			'asst_note' => $asst_note,
			'asst_revision' => $asst_revision
		];
		
		if ($this->cmms_asset->update($id, $insert_data) == false) {
			$data['errors'] = $this->cmms_asset->errors();
			var_dump($data['errors']);
			//return view('Matleyx\CI4CMMS\Views\cmms_assets/edit'.$id, $data);
		} else {
			echo 'nessun';
			//return redirect('cmms_assets');
		}

		//$this->cmms_asset->update($id, $insert_data);
		//return redirect('cmms_assets');
	}

	public function delete($id)
	{
		$this->cmms_asset->delete($id);
		return redirect('cmms_assets');
	}
	    // POST CRUD
		public function asse_by_sect($id_sect)
		{
			$data['cmms_assets'] = $this->cmms_asset->ass_by_sec($id_sect);
			return view('Matleyx\CI4CMMS\Views\cmms_assets/index', $data);
		}
	function aj_sel_sect()
	{
		if ($this->request->isAjax()) {
			$buil = $this->request->getPost('id_building');
			$csrfHash_new = csrf_hash();
			$sectordb = $this->cmms_sectors->where('sect_id_buil', $buil)->findAll();
			foreach ($sectordb as $row) {
				$ris = ['id_sect' => $row['id_sect'], 'sec_des' => $row['sect_description']];
				$ris2[] = $ris;
			}
			$risultati = [
				'result' => $ris2,
				'csrfHash_new' => $csrfHash_new,
			];
			return $this->response->setJSON($risultati);
		}
	}
	function generaStringaRandom($lunghezza)
	{
		$caratteri = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$stringaRandom = '';
		for ($i = 0; $i < $lunghezza; $i++) {
			$stringaRandom .= $caratteri[rand(0, strlen($caratteri) - 1)];
		}
		return $stringaRandom;
	}
}
