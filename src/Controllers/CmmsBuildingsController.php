<?php
namespace Matleyx\CI4CMMS\Controllers;

use CodeIgniter\Controller;
use Matleyx\CI4CMMS\Models\CmmsBuildingsModel;



class CmmsBuildingsController extends Controller
{
    protected $cmms_building;

    /**
     * CmmsBuildingsController constructor.
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
        $this->cmms_building = new CmmsBuildingsModel();

    }

    public function index()
    {
        $cmms_buildings = $this->cmms_building->findAll();
        return view('Matleyx\CI4CMMS\Views\cmms_buildings/index', [
            'cmms_buildings' => $cmms_buildings
        ]);
    }

    public function add()
    {
        $data = array();

        
        return view('Matleyx\CI4CMMS\Views\cmms_buildings/add', $data);
    }

    public function save()
    {


			$buil_description = $this->request->getPost('buil_description');

        $insert_data = [
			'buil_description' => $buil_description
        ];
        if ($this->cmms_building->save($insert_data) == false) {
            $data['errors'] = $this->cmms_building->errors();
            return view('Matleyx\CI4CMMS\Views\cmms_buildings/add', $data);
        } else {
            return redirect('cmms_buildings');
        }
    }

    public function edit($id)
    {


        $cmms_building = $this->cmms_building->find($id);
        $data['value'] = $cmms_building;
        return view('Matleyx\CI4CMMS\Views\cmms_buildings/edit', $data);
    }

    public function update()
    {
            $id = $this->request->getPost('id_buil');
			$buil_description = $this->request->getPost('buil_description');

        $insert_data = [
			'buil_description' => $buil_description
        ];
        $this->cmms_building->update($id, $insert_data);
        return redirect('cmms_buildings');
    }

    public function delete($id)
    {
        $this->cmms_building->delete($id);
        return redirect('cmms_buildings');
    }
}