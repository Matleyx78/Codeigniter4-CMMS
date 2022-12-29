<?php
namespace Matleyx\CI4CMMS\Controllers;

use CodeIgniter\Controller;
use Matleyx\CI4CMMS\Models\CmmsManteinersModel;



class CmmsManteinersController extends Controller
{
    protected $cmms_manteiner;

    /**
     * CmmsManteinersController constructor.
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
        $this->cmms_manteiner = new CmmsManteinersModel();

    }

    public function index()
    {
        $cmms_manteiners = $this->cmms_manteiner->findAll();
        return view('Matleyx\CI4CMMS\Views\cmms_manteiners/index', [
            'cmms_manteiners' => $cmms_manteiners
        ]);
    }

    public function add()
    {
        $data = array();

        
        return view('Matleyx\CI4CMMS\Views\cmms_manteiners/add', $data);
    }

    public function save()
    {


			$mtnr_username = $this->request->getPost('mtnr_username');
			$mtnr_email = $this->request->getPost('mtnr_email');
			$mtnr_id_shield = $this->request->getPost('mtnr_id_shield');

        $insert_data = [
			'mtnr_username' => $mtnr_username,
			'mtnr_email' => $mtnr_email,
			'mtnr_id_shield' => $mtnr_id_shield
        ];
        if ($this->cmms_manteiner->save($insert_data) == false) {
            $data['errors'] = $this->cmms_manteiner->errors();
            return view('Matleyx\CI4CMMS\Views\cmms_manteiners/add', $data);
        } else {
            return redirect('cmms_manteiners');
        }
    }

    public function edit($id)
    {


        $cmms_manteiner = $this->cmms_manteiner->find($id);
        $data['value'] = $cmms_manteiner;
        return view('Matleyx\CI4CMMS\Views\cmms_manteiners/edit', $data);
    }

    public function update()
    {
            $id = $this->request->getPost('id_mtnr');
			$mtnr_username = $this->request->getPost('mtnr_username');
			$mtnr_email = $this->request->getPost('mtnr_email');
			$mtnr_id_shield = $this->request->getPost('mtnr_id_shield');

        $insert_data = [
			'mtnr_username' => $mtnr_username,
			'mtnr_email' => $mtnr_email,
			'mtnr_id_shield' => $mtnr_id_shield
        ];
        $this->cmms_manteiner->update($id, $insert_data);
        return redirect('cmms_manteiners');
    }

    public function delete($id)
    {
        $this->cmms_manteiner->delete($id);
        return redirect('cmms_manteiners');
    }
}