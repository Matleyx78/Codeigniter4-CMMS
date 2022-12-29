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
		$data = array();
		$data['cmms_buildings'] = $this->cmms_buildings->findAll();
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
		$data['cmms_buildings'] = $this->cmms_buildings->findAll();
		$data['cmms_sectors'] = $this->cmms_sectors->findAll();

		$cmms_asset = $this->cmms_asset->find($id);
		$data['value'] = $cmms_asset;
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
		$this->cmms_asset->update($id, $insert_data);
		return redirect('cmms_assets');
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
}
