<?php
namespace Matleyx\CI4CMMS\Controllers;

use CodeIgniter\Controller;
use Matleyx\CI4CMMS\Models\CmmsSchedJobsModel;

use Matleyx\CI4CMMS\Models\CmmsTodoJobsModel;

class CmmsSchedJobsController extends Controller
{
    protected $cmms_sched_job;
	protected $cmms_todo_jobs;
    /**
     * CmmsSchedJobsController constructor.
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
        $this->cmms_sched_job = new CmmsSchedJobsModel();
		$this->cmms_todo_jobs = new CmmsTodoJobsModel;
    }

    public function index()
    {
        $cmms_sched_jobs = $this->cmms_sched_job->findAll();
        return view('Matleyx\CI4CMMS\Views\cmms_sched_jobs/index', [
            'cmms_sched_jobs' => $cmms_sched_jobs
        ]);
    }

    public function add()
    {
        $data = array();
		$data['cmms_todo_jobs'] = $this->cmms_todo_jobs->findAll();
        
        return view('Matleyx\CI4CMMS\Views\cmms_sched_jobs/add', $data);
    }

    public function save()
    {
		$data['cmms_todo_jobs'] = $this->cmms_todo_jobs->findAll();

			$scjb_id_tdjb = $this->request->getPost('scjb_id_tdjb');
			$scjb_status = $this->request->getPost('scjb_status');
			$scjb_execute_by = $this->request->getPost('scjb_execute_by');
			$scjb_time_exec_minut = $this->request->getPost('scjb_time_exec_minut');
			$scjb_comment = $this->request->getPost('scjb_comment');
			$scjb_note = $this->request->getPost('scjb_note');
			$scjb_execute_at = $this->request->getPost('scjb_execute_at');

        $insert_data = [
			'scjb_id_tdjb' => $scjb_id_tdjb,
			'scjb_status' => $scjb_status,
			'scjb_execute_by' => $scjb_execute_by,
			'scjb_time_exec_minut' => $scjb_time_exec_minut,
			'scjb_comment' => $scjb_comment,
			'scjb_note' => $scjb_note,
			'scjb_execute_at' => $scjb_execute_at
        ];
        if ($this->cmms_sched_job->save($insert_data) == false) {
            $data['errors'] = $this->cmms_sched_job->errors();
            return view('Matleyx\CI4CMMS\Views\cmms_sched_jobs/add', $data);
        } else {
            return redirect('cmms_sched_jobs');
        }
    }

    public function edit($id)
    {
		$data['cmms_todo_jobs'] = $this->cmms_todo_jobs->findAll();

        $cmms_sched_job = $this->cmms_sched_job->find($id);
        $data['value'] = $cmms_sched_job;
        return view('Matleyx\CI4CMMS\Views\cmms_sched_jobs/edit', $data);
    }

    public function update()
    {
            $id = $this->request->getPost('id_scjb');
			$scjb_id_tdjb = $this->request->getPost('scjb_id_tdjb');
			$scjb_status = $this->request->getPost('scjb_status');
			$scjb_execute_by = $this->request->getPost('scjb_execute_by');
			$scjb_time_exec_minut = $this->request->getPost('scjb_time_exec_minut');
			$scjb_comment = $this->request->getPost('scjb_comment');
			$scjb_note = $this->request->getPost('scjb_note');
			$scjb_execute_at = $this->request->getPost('scjb_execute_at');

        $insert_data = [
			'scjb_id_tdjb' => $scjb_id_tdjb,
			'scjb_status' => $scjb_status,
			'scjb_execute_by' => $scjb_execute_by,
			'scjb_time_exec_minut' => $scjb_time_exec_minut,
			'scjb_comment' => $scjb_comment,
			'scjb_note' => $scjb_note,
			'scjb_execute_at' => $scjb_execute_at
        ];
        $this->cmms_sched_job->update($id, $insert_data);
        return redirect('cmms_sched_jobs');
    }

    public function delete($id)
    {
        $this->cmms_sched_job->delete($id);
        return redirect('cmms_sched_jobs');
    }
}