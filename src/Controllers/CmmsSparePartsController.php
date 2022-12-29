<?php
namespace Matleyx\CI4CMMS\Controllers;

use CodeIgniter\Controller;
use Matleyx\CI4CMMS\Models\CmmsSparePartsModel;

use Matleyx\CI4CMMS\Models\CmmsAssetsModel;

class CmmsSparePartsController extends Controller
{
    protected $cmms_spare_part;
	protected $cmms_assets;
    /**
     * CmmsSparePartsController constructor.
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
        $this->cmms_spare_part = new CmmsSparePartsModel();
		$this->cmms_assets = new CmmsAssetsModel;
    }

    public function index()
    {
        $cmms_spare_parts = $this->cmms_spare_part->findAll();
        return view('Matleyx\CI4CMMS\Views\cmms_spare_parts/index', [
            'cmms_spare_parts' => $cmms_spare_parts
        ]);
    }

    public function add()
    {
        $data = array();
		$data['cmms_assets'] = $this->cmms_assets->findAll();
        
        return view('Matleyx\CI4CMMS\Views\cmms_spare_parts/add', $data);
    }

    public function save()
    {
		$data['cmms_assets'] = $this->cmms_assets->findAll();

			$sppa_id_asst = $this->request->getPost('sppa_id_asst');
			$sppa_description = $this->request->getPost('sppa_description');
			$sppa_brand = $this->request->getPost('sppa_brand');
			$sppa_model = $this->request->getPost('sppa_model');
			$sppa_useful_info = $this->request->getPost('sppa_useful_info');
			$sppa_comment = $this->request->getPost('sppa_comment');
			$sppa_note = $this->request->getPost('sppa_note');

        $insert_data = [
			'sppa_id_asst' => $sppa_id_asst,
			'sppa_description' => $sppa_description,
			'sppa_brand' => $sppa_brand,
			'sppa_model' => $sppa_model,
			'sppa_useful_info' => $sppa_useful_info,
			'sppa_comment' => $sppa_comment,
			'sppa_note' => $sppa_note
        ];
        if ($this->cmms_spare_part->save($insert_data) == false) {
            $data['errors'] = $this->cmms_spare_part->errors();
            return view('Matleyx\CI4CMMS\Views\cmms_spare_parts/add', $data);
        } else {
            return redirect('cmms_spare_parts');
        }
    }

    public function edit($id)
    {
		$data['cmms_assets'] = $this->cmms_assets->findAll();

        $cmms_spare_part = $this->cmms_spare_part->find($id);
        $data['value'] = $cmms_spare_part;
        return view('Matleyx\CI4CMMS\Views\cmms_spare_parts/edit', $data);
    }

    public function update()
    {
            $id = $this->request->getPost('id_sppa');
			$sppa_id_asst = $this->request->getPost('sppa_id_asst');
			$sppa_description = $this->request->getPost('sppa_description');
			$sppa_brand = $this->request->getPost('sppa_brand');
			$sppa_model = $this->request->getPost('sppa_model');
			$sppa_useful_info = $this->request->getPost('sppa_useful_info');
			$sppa_comment = $this->request->getPost('sppa_comment');
			$sppa_note = $this->request->getPost('sppa_note');

        $insert_data = [
			'sppa_id_asst' => $sppa_id_asst,
			'sppa_description' => $sppa_description,
			'sppa_brand' => $sppa_brand,
			'sppa_model' => $sppa_model,
			'sppa_useful_info' => $sppa_useful_info,
			'sppa_comment' => $sppa_comment,
			'sppa_note' => $sppa_note
        ];
        $this->cmms_spare_part->update($id, $insert_data);
        return redirect('cmms_spare_parts');
    }

    public function delete($id)
    {
        $this->cmms_spare_part->delete($id);
        return redirect('cmms_spare_parts');
    }
}