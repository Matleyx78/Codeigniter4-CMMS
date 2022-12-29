<?php
namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsCoIntervalsModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cmms_co_intervals';
	protected $primaryKey           = 'id_coin';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
							'coin_description',
						'coin_value',
						'coin_id_cont',
						'coin_first_ad',
						'coin_second_ad',
						'coin_last_ad'
							];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'coin_created_at';
	protected $updatedField         = 'coin_updated_at';
	protected $deletedField         = 'coin_deleted_at';

	// Validation
	protected $validationRules      = [
	'coin_description'=>'required',
	'coin_value'=>'required',
	'coin_id_cont'=>'required',
	'coin_first_ad'=>'required',
	'coin_second_ad'=>'required',
	'coin_last_ad'=>'required'
	];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
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

	public function j_findAll(){
		$this->select('*');
		$this->join('cmms_counters', 'cmms_counters.id_cont = cmms_co_intervals.coin_id_cont');
		return $this->findAll();
	}
	
	public function j_find($id){
		$this->select('*');
		$this->join('cmms_counters', 'cmms_counters.id_cont = cmms_co_intervals.coin_id_cont');
		return $this->find($id);
	}
	

}