<?php
namespace Matleyx\CI4CMMS\Controllers;

use CodeIgniter\Controller;
use Matleyx\CI4CMMS\Models\CmmsCountersModel;



class CmmsCountersController extends Controller
{
    protected $cmms_counter;

    /**
     * CmmsCountersController constructor.
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
        $this->cmms_counter = new CmmsCountersModel();

    }

    public function index()
    {
        $cmms_counters = $this->cmms_counter->findAll();
        return view('Matleyx\CI4CMMS\Views\cmms_counters/index', [
            'cmms_counters' => $cmms_counters
        ]);
    }

    public function add()
    {
        $data = array();

        
        return view('Matleyx\CI4CMMS\Views\cmms_counters/add', $data);
    }

    public function save()
    {


			$cont_description = $this->request->getPost('cont_description');
			$cont_value = $this->request->getPost('cont_value');

        $insert_data = [
			'cont_description' => $cont_description,
			'cont_value' => $cont_value
        ];
        if ($this->cmms_counter->save($insert_data) == false) {
            $data['errors'] = $this->cmms_counter->errors();
            return view('Matleyx\CI4CMMS\Views\cmms_counters/add', $data);
        } else {
            return redirect('cmms_counters');
        }
    }

    public function edit($id)
    {


        $cmms_counter = $this->cmms_counter->find($id);
        $data['value'] = $cmms_counter;
        return view('Matleyx\CI4CMMS\Views\cmms_counters/edit', $data);
    }

    public function update()
    {
            $id = $this->request->getPost('id_cont');
			$cont_description = $this->request->getPost('cont_description');
			$cont_value = $this->request->getPost('cont_value');

        $insert_data = [
			'cont_description' => $cont_description,
			'cont_value' => $cont_value
        ];
        $this->cmms_counter->update($id, $insert_data);
        return redirect('cmms_counters');
    }

    public function delete($id)
    {
        $this->cmms_counter->delete($id);
        return redirect('cmms_counters');
    }
}