<?php
namespace Matleyx\CI4CMMS\Controllers;

use CodeIgniter\Controller;
use Matleyx\CI4CMMS\Models\CmmsCoIntervalsModel;

use Matleyx\CI4CMMS\Models\CmmsCountersModel;

class CmmsCoIntervalsController extends Controller
{
    protected $cmms_co_interval;
	protected $cmms_counters;
    /**
     * CmmsCoIntervalsController constructor.
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
        $this->cmms_co_interval = new CmmsCoIntervalsModel();
		$this->cmms_counters = new CmmsCountersModel;
    }

    public function index()
    {
        $cmms_co_intervals = $this->cmms_co_interval->j_findAll();
        return view('Matleyx\CI4CMMS\Views\cmms_co_intervals/index', [
            'cmms_co_intervals' => $cmms_co_intervals
        ]);
    }

    public function add()
    {
        $data = array();
		$data['cmms_counters'] = $this->cmms_counters->findAll();
        
        return view('Matleyx\CI4CMMS\Views\cmms_co_intervals/add', $data);
    }

    public function save()
    {
		$data['cmms_counters'] = $this->cmms_counters->findAll();

			$coin_description = $this->request->getPost('coin_description');
			$coin_value = $this->request->getPost('coin_value');
			$coin_id_cont = $this->request->getPost('coin_id_cont');
			$coin_first_ad = $this->request->getPost('coin_first_ad');
			$coin_second_ad = $this->request->getPost('coin_second_ad');
			$coin_last_ad = $this->request->getPost('coin_last_ad');

        $insert_data = [
			'coin_description' => $coin_description,
			'coin_value' => $coin_value,
			'coin_id_cont' => $coin_id_cont,
			'coin_first_ad' => $coin_first_ad,
			'coin_second_ad' => $coin_second_ad,
			'coin_last_ad' => $coin_last_ad
        ];
        if ($this->cmms_co_interval->save($insert_data) == false) {
            $data['errors'] = $this->cmms_co_interval->errors();
            return view('Matleyx\CI4CMMS\Views\cmms_co_intervals/add', $data);
        } else {
            return redirect('cmms_co_intervals');
        }
    }

    public function edit($id)
    {
		$data['cmms_counters'] = $this->cmms_counters->findAll();

        $cmms_co_interval = $this->cmms_co_interval->find($id);
        $data['value'] = $cmms_co_interval;
        return view('Matleyx\CI4CMMS\Views\cmms_co_intervals/edit', $data);
    }

    public function update()
    {
            $id = $this->request->getPost('id_coin');
			$coin_description = $this->request->getPost('coin_description');
			$coin_value = $this->request->getPost('coin_value');
			$coin_id_cont = $this->request->getPost('coin_id_cont');
			$coin_first_ad = $this->request->getPost('coin_first_ad');
			$coin_second_ad = $this->request->getPost('coin_second_ad');
			$coin_last_ad = $this->request->getPost('coin_last_ad');

        $insert_data = [
			'coin_description' => $coin_description,
			'coin_value' => $coin_value,
			'coin_id_cont' => $coin_id_cont,
			'coin_first_ad' => $coin_first_ad,
			'coin_second_ad' => $coin_second_ad,
			'coin_last_ad' => $coin_last_ad
        ];
        $this->cmms_co_interval->update($id, $insert_data);
        return redirect('cmms_co_intervals');
    }

    public function delete($id)
    {
        $this->cmms_co_interval->delete($id);
        return redirect('cmms_co_intervals');
    }
}