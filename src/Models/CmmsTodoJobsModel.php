<?php
namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsTodoJobsModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cmms_todo_jobs';
	protected $primaryKey           = 'id_tdjb';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
							'tdjb_type',
						'tdjb_description',
						'tdjb_tools',
						'tdjb_id_mtnr_creator',
						'tdjb_id_mtnr_reference',
						'tdjb_id_mtnr_supervisor',
						'tdjb_id_buil',
						'tdjb_id_sect',
						'tdjb_id_asst',
						'tdjb_id_cont',
						'tdjb_id_coin',
						'tdjb_id_wdin',
						'tdjb_job_active'
							];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'tdjb_created_at';
	protected $updatedField         = 'tdjb_updated_at';
	protected $deletedField         = 'tdjb_deleted_at';

	// Validation
	protected $validationRules      = [
	'tdjb_type'=>'required',
	'tdjb_description'=>'required',
	'tdjb_tools'=>'required',
	'tdjb_id_mtnr_creator'=>'required',
	'tdjb_id_mtnr_reference'=>'required',
	'tdjb_id_mtnr_supervisor'=>'required',
	'tdjb_id_buil'=>'required',
	'tdjb_id_sect'=>'required',
	'tdjb_id_asst'=>'required',
	// 'tdjb_id_cont'=>'required',
	// 'tdjb_id_coin'=>'required',
	// 'tdjb_id_wdin'=>'required',
	// 'tdjb_job_active'=>'required'
	];
	protected $validationMessages   = [];
	protected $skipValidation       = true;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function j_findAll()
    {	
		$this->select('*, ref.mtnr_username ref_name, cre.mtnr_username cre_name, sup.mtnr_username sup_name,');
		$this->join('cmms_manteiners cre', 'cre.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_creator', 'left');
		$this->join('cmms_manteiners ref', 'ref.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_reference', 'left');
		$this->join('cmms_manteiners sup', 'sup.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_supervisor', 'left');		
		$this->join('cmms_assets', 'cmms_assets.id_asst = cmms_todo_jobs.tdjb_id_asst');
		$this->join('cmms_buildings', 'cmms_buildings.id_buil = cmms_todo_jobs.tdjb_id_buil');
		$this->join('cmms_co_intervals', 'cmms_co_intervals.id_coin = cmms_todo_jobs.tdjb_id_coin');
		$this->join('cmms_counters', 'cmms_counters.id_cont = cmms_todo_jobs.tdjb_id_cont');
		$this->join('cmms_sectors', 'cmms_sectors.id_sect = cmms_todo_jobs.tdjb_id_sect');
		$this->join('cmms_wd_intervals', 'cmms_wd_intervals.id_wdin = cmms_todo_jobs.tdjb_id_wdin');
		return $this->findAll();
    }
	public function get_all_cmms_todojobs($perPage = null, $offset = null)
    {	
		$builder = $this->db->table("cmms_todo_jobs");
		return $builder
		->select('*, ref.mtnr_username ref_name, cre.mtnr_username cre_name, sup.mtnr_username sup_name,')
		->join('cmms_manteiners cre', 'cre.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_creator', 'left')
		->join('cmms_manteiners ref', 'ref.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_reference', 'left')
		->join('cmms_manteiners sup', 'sup.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_supervisor', 'left')		
		->join('cmms_assets', 'cmms_assets.id_asst = cmms_todo_jobs.tdjb_id_asst')
		->join('cmms_buildings', 'cmms_buildings.id_buil = cmms_todo_jobs.tdjb_id_buil')
		->join('cmms_co_intervals', 'cmms_co_intervals.id_coin = cmms_todo_jobs.tdjb_id_coin')
		->join('cmms_counters', 'cmms_counters.id_cont = cmms_todo_jobs.tdjb_id_cont')
		->join('cmms_sectors', 'cmms_sectors.id_sect = cmms_todo_jobs.tdjb_id_sect')
		->join('cmms_wd_intervals', 'cmms_wd_intervals.id_wdin = cmms_todo_jobs.tdjb_id_wdin')
			->limit($perPage, $offset)
			->get()
			->getResultArray();
    }
	public function j_find($id){
		$this->select('*, ref.mtnr_username ref_name, cre.mtnr_username cre_name, sup.mtnr_username sup_name,');
		$this->join('cmms_manteiners cre', 'cre.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_creator', 'left');
		$this->join('cmms_manteiners ref', 'ref.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_reference', 'left');
		$this->join('cmms_manteiners sup', 'sup.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_supervisor', 'left');		
		$this->join('cmms_assets', 'cmms_assets.id_asst = cmms_todo_jobs.tdjb_id_asst');
		$this->join('cmms_buildings', 'cmms_buildings.id_buil = cmms_todo_jobs.tdjb_id_buil');
		$this->join('cmms_co_intervals', 'cmms_co_intervals.id_coin = cmms_todo_jobs.tdjb_id_coin');
		$this->join('cmms_counters', 'cmms_counters.id_cont = cmms_todo_jobs.tdjb_id_cont');
		$this->join('cmms_sectors', 'cmms_sectors.id_sect = cmms_todo_jobs.tdjb_id_sect');
		$this->join('cmms_wd_intervals', 'cmms_wd_intervals.id_wdin = cmms_todo_jobs.tdjb_id_wdin');
		return $this->find($id);
	}
	
	public function testquery(){
		$id = 281;
		$this->select('*, ref.mtnr_username ref_name, cre.mtnr_username cre_name, sup.mtnr_username sup_name,');
		$this->join('cmms_manteiners cre', 'cre.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_creator', 'left');
		$this->join('cmms_manteiners ref', 'ref.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_reference', 'left');
		$this->join('cmms_manteiners sup', 'sup.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_supervisor', 'left');			
		return $this->find($id);
					  
	   } 
	   public function tdj_by_ass($id_as){
		$this->select('*, ref.mtnr_username ref_name, cre.mtnr_username cre_name, sup.mtnr_username sup_name,');
		$this->join('cmms_manteiners cre', 'cre.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_creator', 'left');
		$this->join('cmms_manteiners ref', 'ref.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_reference', 'left');
		$this->join('cmms_manteiners sup', 'sup.id_mtnr = cmms_todo_jobs.tdjb_id_mtnr_supervisor', 'left');		
		$this->join('cmms_assets', 'cmms_assets.id_asst = cmms_todo_jobs.tdjb_id_asst');
		$this->join('cmms_buildings', 'cmms_buildings.id_buil = cmms_todo_jobs.tdjb_id_buil');
		$this->join('cmms_co_intervals', 'cmms_co_intervals.id_coin = cmms_todo_jobs.tdjb_id_coin');
		$this->join('cmms_counters', 'cmms_counters.id_cont = cmms_todo_jobs.tdjb_id_cont');
		$this->join('cmms_sectors', 'cmms_sectors.id_sect = cmms_todo_jobs.tdjb_id_sect');
		$this->join('cmms_wd_intervals', 'cmms_wd_intervals.id_wdin = cmms_todo_jobs.tdjb_id_wdin');
		$this->where('tdjb_id_asst', $id_as);
		return $this->findAll();
	}
}