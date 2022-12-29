<?php
namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsSchedJobsModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'cmms_sched_jobs';
	protected $primaryKey = 'id_scjb';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = [
		'scjb_id_tdjb',
		'scjb_status',
		'scjb_execute_by',
		'scjb_time_exec_minut',
		'scjb_comment',
		'scjb_note',
		'scjb_execute_at'
	];

	// Dates
	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'scjb_created_at';
	protected $updatedField = 'scjb_updated_at';
	protected $deletedField = 'scjb_deleted_at';

	// Validation
	protected $validationRules = [
		'scjb_id_tdjb' => 'required',
		'scjb_status' => 'required',
		'scjb_execute_by' => 'required',
		'scjb_time_exec_minut' => 'required',
		'scjb_execute_at' => 'required'
	];
	protected $validationMessages = [];
	protected $skipValidation = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks = true;
	protected $beforeInsert = [];
	protected $afterInsert = [];
	protected $beforeUpdate = [];
	protected $afterUpdate = [];
	protected $beforeFind = [];
	protected $afterFind = [];
	protected $beforeDelete = [];
	protected $afterDelete = [];

	public function j_findAll()
	{
		$this->select('*');
		$this->join('cmms_todo_jobs', 'cmms_todo_jobs.id_tdjb = cmms_sched_jobs.scjb_id_tdjb');
		return $this->findAll();
	}

	public function j_find($id)
	{
		$this->select('*');
		$this->join('cmms_todo_jobs', 'cmms_todo_jobs.id_tdjb = cmms_sched_jobs.scjb_id_tdjb');
		return $this->find($id);
	}

	public function last_scj_by_tdj($id_tdjb)
	{
		$this->select('*, ref.mtnr_username ref_name, cre.mtnr_username cre_name, sup.mtnr_username sup_name,');
		$this->join('cmms_todo_jobs', 'cmms_todo_jobs.id_tdjb = cmms_sched_jobs.scjb_id_tdjb');
		$this->join('cmms_manteiners cre', 'cre.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_creator', 'left');
		$this->join('cmms_manteiners ref', 'ref.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_reference', 'left');
		$this->join('cmms_manteiners sup', 'sup.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_supervisor', 'left');
		$this->join('cmms_assets', 'cmms_assets.id_asst = cmms_todo_jobs.tdjb_id_asst');
		$this->join('cmms_buildings', 'cmms_buildings.id_buil = cmms_todo_jobs.tdjb_id_buil');
		$this->join('cmms_co_intervals', 'cmms_co_intervals.id_coin = cmms_todo_jobs.tdjb_id_coin');
		$this->join('cmms_counters', 'cmms_counters.id_cont = cmms_todo_jobs.tdjb_id_cont');
		$this->join('cmms_sectors', 'cmms_sectors.id_sect = cmms_todo_jobs.tdjb_id_sect');
		$this->join('cmms_wd_intervals', 'cmms_wd_intervals.id_wdin = cmms_todo_jobs.tdjb_id_wdin');
		$this->where('scjb_id_tdjb', $id_tdjb);
		$this->orderBy('scjb_execute_at', 'desc');
		return $this->first();
	}
}