<?php
namespace Matleyx\CI4CMMS\Controllers;

use CodeIgniter\Controller;
use Matleyx\CI4CMMS\Models\CmmsTodoJobsModel;

use Matleyx\CI4CMMS\Models\CmmsAssetsModel;
use Matleyx\CI4CMMS\Models\CmmsBuildingsModel;
use Matleyx\CI4CMMS\Models\CmmsCoIntervalsModel;
use Matleyx\CI4CMMS\Models\CmmsCountersModel;
use Matleyx\CI4CMMS\Models\CmmsManteinersModel;
use Matleyx\CI4CMMS\Models\CmmsSchedJobsModel;
// use Matleyx\CI4CMMS\Models\CmmsManteinersModel;
use Matleyx\CI4CMMS\Models\CmmsSectorsModel;
use Matleyx\CI4CMMS\Models\CmmsWdIntervalsModel;
use Matleyx\CI4CMMS\Libraries\Common_function as CfCMMS;
use DateTime;

class CmmsTodoJobsController extends Controller
{
    protected $cmms_todo_job;
	protected $cmms_assets;
	protected $cmms_buildings;
	protected $cmms_co_intervals;
	protected $cmms_counters;
	protected $cmms_manteiners_creator;
	protected $cmms_manteiners_reference;
	protected $cmms_manteiners_supervisor;
	protected $cmms_sectors;
	protected $cmms_wd_intervals;
	protected $cmms_sched_job;
    /**
     * CmmsTodoJobsController constructor.
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
        $this->cmms_todo_job = new CmmsTodoJobsModel();
		$this->cmms_assets = new CmmsAssetsModel;
		$this->cmms_buildings = new CmmsBuildingsModel;
		$this->cmms_co_intervals = new CmmsCoIntervalsModel;
		$this->cmms_counters = new CmmsCountersModel;
		$this->cmms_manteiners_creator = new CmmsManteinersModel;
		$this->cmms_manteiners_reference = new CmmsManteinersModel;
		$this->cmms_manteiners_supervisor = new CmmsManteinersModel;
		$this->cmms_sectors = new CmmsSectorsModel;
		$this->cmms_wd_intervals = new CmmsWdIntervalsModel;
		$this->cmms_sched_job = new CmmsSchedJobsModel;
    }

    public function index()
    {
        $cf = new CfCMMS;
		$tot_tdjb = $this->cmms_todo_job->get_all_cmms_todojobs();
		$pager = service('pager');
		$page = (int)(($this->request->getVar('page') !== null) ? $this->request->getVar('page') : 1) - 1;
		$perPage =  12;
		$total = count($tot_tdjb);
		$pager->makeLinks($page + 1, $perPage, $total);
		$offset = $page * $perPage;
		$data['cmms_todo_jobs'] = $this->cmms_todo_job->get_all_cmms_todojobs($perPage, $offset);
		foreach ($data['cmms_todo_jobs'] as &$td)
		{
            $td['sched'] = $cf->scjb_by_tdjb($td['id_tdjb']);
		}
		$data['pager'] = $pager;
		return view('Matleyx\CI4CMMS\Views\cmms_todo_jobs/index', $data);
    }

    public function add()
    {
        $data = array();
		$data['cmms_assets'] = $this->cmms_assets->findAll();
		$data['cmms_buildings'] = $this->cmms_buildings->findAll();
		$data['cmms_co_intervals'] = $this->cmms_co_intervals->findAll();
		$data['cmms_counters'] = $this->cmms_counters->findAll();
		$data['cmms_manteiners_creator'] = $this->cmms_manteiners_creator->findAll();
		$data['cmms_manteiners_reference'] = $this->cmms_manteiners_reference->findAll();
		$data['cmms_manteiners_supervisor'] = $this->cmms_manteiners_supervisor->findAll();
		$data['cmms_sectors'] = $this->cmms_sectors->findAll();
		$data['cmms_wd_intervals'] = $this->cmms_wd_intervals->findAll();
        
        return view('Matleyx\CI4CMMS\Views\cmms_todo_jobs/add', $data);
    }

    public function save()
    {
		$data['cmms_assets'] = $this->cmms_assets->findAll();
		$data['cmms_buildings'] = $this->cmms_buildings->findAll();
		$data['cmms_co_intervals'] = $this->cmms_co_intervals->findAll();
		$data['cmms_counters'] = $this->cmms_counters->findAll();
		$data['cmms_manteiners_creator'] = $this->cmms_manteiners_creator->findAll();
		$data['cmms_manteiners_reference'] = $this->cmms_manteiners_reference->findAll();
		$data['cmms_manteiners_supervisor'] = $this->cmms_manteiners_supervisor->findAll();
		$data['cmms_sectors'] = $this->cmms_sectors->findAll();
		$data['cmms_wd_intervals'] = $this->cmms_wd_intervals->findAll();

			$tdjb_type = $this->request->getPost('tdjb_type');
			$tdjb_description = $this->request->getPost('tdjb_description');
			$tdjb_tools = $this->request->getPost('tdjb_tools');
			$tdjb_id_mtnr_creator = $this->request->getPost('tdjb_id_mtnr_creator');
			$tdjb_id_mtnr_reference = $this->request->getPost('tdjb_id_mtnr_reference');
			$tdjb_id_mtnr_supervisor = $this->request->getPost('tdjb_id_mtnr_supervisor');
			$tdjb_id_buil = $this->request->getPost('tdjb_id_buil');
			$tdjb_id_sect = $this->request->getPost('tdjb_id_sect');
			$tdjb_id_asst = $this->request->getPost('tdjb_id_asst');
			$tdjb_id_cont = $this->request->getPost('tdjb_id_cont');
			$tdjb_id_coin = $this->request->getPost('tdjb_id_coin');
			$tdjb_id_wdin = $this->request->getPost('tdjb_id_wdin');
			$tdjb_job_active = $this->request->getPost('tdjb_job_active');

        $insert_data = [
			'tdjb_type' => $tdjb_type,
			'tdjb_description' => $tdjb_description,
			'tdjb_tools' => $tdjb_tools,
			'tdjb_id_mtnr_creator' => $tdjb_id_mtnr_creator,
			'tdjb_id_mtnr_reference' => $tdjb_id_mtnr_reference,
			'tdjb_id_mtnr_supervisor' => $tdjb_id_mtnr_supervisor,
			'tdjb_id_buil' => $tdjb_id_buil,
			'tdjb_id_sect' => $tdjb_id_sect,
			'tdjb_id_asst' => $tdjb_id_asst,
			'tdjb_id_cont' => $tdjb_id_cont,
			'tdjb_id_coin' => $tdjb_id_coin,
			'tdjb_id_wdin' => $tdjb_id_wdin,
			'tdjb_job_active' => $tdjb_job_active
        ];
        if ($this->cmms_todo_job->save($insert_data) == false) {
            $data['errors'] = $this->cmms_todo_job->errors();
            return view('Matleyx\CI4CMMS\Views\cmms_todo_jobs/add', $data);
        } else {
            return redirect('cmms_todo_jobs');
        }
    }

    public function edit($id)
    {
		$data['cmms_assets'] = $this->cmms_assets->findAll();
		$data['cmms_buildings'] = $this->cmms_buildings->findAll();
		$data['cmms_co_intervals'] = $this->cmms_co_intervals->findAll();
		$data['cmms_counters'] = $this->cmms_counters->findAll();
		$data['cmms_manteiners_creator'] = $this->cmms_manteiners_creator->findAll();
		$data['cmms_manteiners_reference'] = $this->cmms_manteiners_reference->findAll();
		$data['cmms_manteiners_supervisor'] = $this->cmms_manteiners_supervisor->findAll();
		$data['cmms_sectors'] = $this->cmms_sectors->findAll();
		$data['cmms_wd_intervals'] = $this->cmms_wd_intervals->findAll();

        $cmms_todo_job = $this->cmms_todo_job->find($id);
        $data['value'] = $cmms_todo_job;
        return view('Matleyx\CI4CMMS\Views\cmms_todo_jobs/edit', $data);
    }

    public function update()
    {
            $id = $this->request->getPost('id_tdjb');
			$tdjb_type = $this->request->getPost('tdjb_type');
			$tdjb_description = $this->request->getPost('tdjb_description');
			$tdjb_tools = $this->request->getPost('tdjb_tools');
			$tdjb_id_mtnr_creator = $this->request->getPost('tdjb_id_mtnr_creator');
			$tdjb_id_mtnr_reference = $this->request->getPost('tdjb_id_mtnr_reference');
			$tdjb_id_mtnr_supervisor = $this->request->getPost('tdjb_id_mtnr_supervisor');
			$tdjb_id_buil = $this->request->getPost('tdjb_id_buil');
			$tdjb_id_sect = $this->request->getPost('tdjb_id_sect');
			$tdjb_id_asst = $this->request->getPost('tdjb_id_asst');
			$tdjb_id_cont = $this->request->getPost('tdjb_id_cont');
			$tdjb_id_coin = $this->request->getPost('tdjb_id_coin');
			$tdjb_id_wdin = $this->request->getPost('tdjb_id_wdin');
			$tdjb_job_active = $this->request->getPost('tdjb_job_active');

        $insert_data = [
			'tdjb_type' => $tdjb_type,
			'tdjb_description' => $tdjb_description,
			'tdjb_tools' => $tdjb_tools,
			'tdjb_id_mtnr_creator' => $tdjb_id_mtnr_creator,
			'tdjb_id_mtnr_reference' => $tdjb_id_mtnr_reference,
			'tdjb_id_mtnr_supervisor' => $tdjb_id_mtnr_supervisor,
			'tdjb_id_buil' => $tdjb_id_buil,
			'tdjb_id_sect' => $tdjb_id_sect,
			'tdjb_id_asst' => $tdjb_id_asst,
			'tdjb_id_cont' => $tdjb_id_cont,
			'tdjb_id_coin' => $tdjb_id_coin,
			'tdjb_id_wdin' => $tdjb_id_wdin,
			'tdjb_job_active' => $tdjb_job_active
        ];
        $this->cmms_todo_job->update($id, $insert_data);
        return redirect('cmms_todo_jobs');
    }

    public function delete($id)
    {
        $this->cmms_todo_job->delete($id);
        return redirect('cmms_todo_jobs');
    }
	    // POST CRUD
		public function tdjb_by_asst($id_asset)
		{
			$data['cmms_todo_jobs'] = $this->cmms_todo_job->tdj_by_ass($id_asset);
			return view('Matleyx\CI4CMMS\Views\cmms_todo_jobs/index', $data);
		}
    public function testq()
    {
        $cmms_todo_job = $this->cmms_todo_job->testquery();
        $data['value'] = $cmms_todo_job;
        return view('Matleyx\CI4P\Views\test\testview', $data);		
    }	

	public function detail($id)
    {
		helper('date_helper');
		$data['cmms_assets'] = $this->cmms_assets->findAll();
		$data['cmms_buildings'] = $this->cmms_buildings->findAll();
		$data['cmms_co_intervals'] = $this->cmms_co_intervals->findAll();
		$data['cmms_counters'] = $this->cmms_counters->findAll();
		$data['cmms_manteiners_creator'] = $this->cmms_manteiners_creator->findAll();
		$data['cmms_manteiners_reference'] = $this->cmms_manteiners_reference->findAll();
		$data['cmms_manteiners_supervisor'] = $this->cmms_manteiners_supervisor->findAll();
		$data['cmms_sectors'] = $this->cmms_sectors->findAll();
		$data['cmms_wd_intervals'] = $this->cmms_wd_intervals->findAll();
		$data['cmms_sched_jobs'] = $this->cmms_sched_job->where('scjb_id_tdjb',$id)->orderBy('scjb_execute_at', 'desc')->findAll();
        $data['value'] = $this->cmms_todo_job->j_find($id);
		$ultima_esec = new DateTime($data['cmms_sched_jobs'][0]['scjb_execute_at']);
        $data['scadenza'] = $ultima_esec->modify('+ '.$data['value']['wdin_total_day_for_order'].' days');
		//$ultima_esec = new DateTime($data['cmms_sched_jobs'][0]['scjb_execute_at']);
        return view('Matleyx\CI4CMMS\Views\cmms_todo_jobs/job_detail', $data);
    }
}