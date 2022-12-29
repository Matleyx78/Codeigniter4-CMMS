<?php
namespace Matleyx\CI4CMMS\Controllers;

use CodeIgniter\Controller;
use Matleyx\CI4CMMS\Models\CmmsWdIntervalsModel;



class CmmsWdIntervalsController extends Controller
{
    protected $cmms_wd_interval;

    /**
     * CmmsWdIntervalsController constructor.
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
        $this->cmms_wd_interval = new CmmsWdIntervalsModel();

    }

    public function index()
    {
        $cmms_wd_intervals = $this->cmms_wd_interval->findAll();
        return view('Matleyx\CI4CMMS\Views\cmms_wd_intervals/index', [
            'cmms_wd_intervals' => $cmms_wd_intervals
        ]);
    }

    public function add()
    {
        $data = array();

        
        return view('Matleyx\CI4CMMS\Views\cmms_wd_intervals/add', $data);
    }

    public function save()
    {


			$wdin_description = $this->request->getPost('wdin_description');
			$wdin_years = $this->request->getPost('wdin_years');
			$wdin_months = $this->request->getPost('wdin_months');
			$wdin_days = $this->request->getPost('wdin_days');
			$wdin_work_days = $this->request->getPost('wdin_work_days');
			$wdin_first_ad = $this->request->getPost('wdin_first_ad');
			$wdin_second_ad = $this->request->getPost('wdin_second_ad');
			$wdin_last_ad = $this->request->getPost('wdin_last_ad');

        $insert_data = [
			'wdin_description' => $wdin_description,
			'wdin_years' => $wdin_years,
			'wdin_months' => $wdin_months,
			'wdin_days' => $wdin_days,
			'wdin_work_days' => $wdin_work_days,
			'wdin_first_ad' => $wdin_first_ad,
			'wdin_second_ad' => $wdin_second_ad,
			'wdin_last_ad' => $wdin_last_ad
        ];
        if ($this->cmms_wd_interval->save($insert_data) == false) {
            $data['errors'] = $this->cmms_wd_interval->errors();
            return view('Matleyx\CI4CMMS\Views\cmms_wd_intervals/add', $data);
        } else {
            return redirect('cmms_wd_intervals');
        }
    }

    public function edit($id)
    {


        $cmms_wd_interval = $this->cmms_wd_interval->find($id);
        $data['value'] = $cmms_wd_interval;
        return view('Matleyx\CI4CMMS\Views\cmms_wd_intervals/edit', $data);
    }

    public function update()
    {
            $id = $this->request->getPost('id_wdin');
			$wdin_description = $this->request->getPost('wdin_description');
			$wdin_years = $this->request->getPost('wdin_years');
			$wdin_months = $this->request->getPost('wdin_months');
			$wdin_days = $this->request->getPost('wdin_days');
			$wdin_work_days = $this->request->getPost('wdin_work_days');
			$wdin_first_ad = $this->request->getPost('wdin_first_ad');
			$wdin_second_ad = $this->request->getPost('wdin_second_ad');
			$wdin_last_ad = $this->request->getPost('wdin_last_ad');

        $insert_data = [
			'wdin_description' => $wdin_description,
			'wdin_years' => $wdin_years,
			'wdin_months' => $wdin_months,
			'wdin_days' => $wdin_days,
			'wdin_work_days' => $wdin_work_days,
			'wdin_first_ad' => $wdin_first_ad,
			'wdin_second_ad' => $wdin_second_ad,
			'wdin_last_ad' => $wdin_last_ad
        ];
        $this->cmms_wd_interval->update($id, $insert_data);
        return redirect('cmms_wd_intervals');
    }

    public function delete($id)
    {
        $this->cmms_wd_interval->delete($id);
        return redirect('cmms_wd_intervals');
    }
}