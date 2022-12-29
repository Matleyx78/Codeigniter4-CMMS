<?php
namespace Matleyx\CI4CMMS\Controllers;

use CodeIgniter\Controller;
use Matleyx\CI4CMMS\Models\CmmsSectorsModel;

use Matleyx\CI4CMMS\Models\CmmsBuildingsModel;

class CmmsSectorsController extends Controller
{
    protected $cmms_sector;
	protected $cmms_buildings;
    /**
     * CmmsSectorsController constructor.
     */
    public function __construct()
    {
		if (auth()->loggedIn()) {
			$user = auth()->user();
			if (! $user->inGroup('manteiners')) {
				echo 'Access denied';
				exit;
			}
		}else{			
			echo 'Access denied';
			exit;
		}
        $this->cmms_sector = new CmmsSectorsModel();
		$this->cmms_buildings = new CmmsBuildingsModel;
    }

    public function index()
    {
        $cmms_sectors = $this->cmms_sector->j_findAll();
        return view('Matleyx\CI4CMMS\Views\cmms_sectors/index', [
            'cmms_sectors' => $cmms_sectors
        ]);
    }

    public function add()
    {
        $data = array();
		$data['cmms_buildings'] = $this->cmms_buildings->findAll();
        
        return view('Matleyx\CI4CMMS\Views\cmms_sectors/add', $data);
    }

    public function save()
    {
		$data['cmms_buildings'] = $this->cmms_buildings->findAll();

			$sect_description = $this->request->getPost('sect_description');
			$sect_id_buil = $this->request->getPost('sect_id_buil');

        $insert_data = [
			'sect_description' => $sect_description,
			'sect_id_buil' => $sect_id_buil
        ];
        if ($this->cmms_sector->save($insert_data) == false) {
            $data['errors'] = $this->cmms_sector->errors();
            return view('Matleyx\CI4CMMS\Views\cmms_sectors/add', $data);
        } else {
            return redirect('cmms_sectors');
        }
    }

    public function edit($id)
    {
		$data['cmms_buildings'] = $this->cmms_buildings->findAll();

        $cmms_sector = $this->cmms_sector->find($id);
        $data['value'] = $cmms_sector;
        return view('Matleyx\CI4CMMS\Views\cmms_sectors/edit', $data);
    }

    public function update()
    {
            $id = $this->request->getPost('id_sect');
			$sect_description = $this->request->getPost('sect_description');
			$sect_id_buil = $this->request->getPost('sect_id_buil');

        $insert_data = [
			'sect_description' => $sect_description,
			'sect_id_buil' => $sect_id_buil
        ];
        $this->cmms_sector->update($id, $insert_data);
        return redirect('cmms_sectors');
    }

    public function delete($id)
    {
        $this->cmms_sector->delete($id);
        return redirect('cmms_sectors');
    }

    // POST CRUD
    public function sect_by_build($id_buil)
    {
		$data['cmms_sectors'] = $this->cmms_sector->sec_by_bui($id_buil);
        return view('Matleyx\CI4CMMS\Views\cmms_sectors/index', $data);
    }
}