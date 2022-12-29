<?php
namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsSparePartsModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cmms_spare_parts';
	protected $primaryKey           = 'id_sppa';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
							'sppa_id_asst',
						'sppa_description',
						'sppa_brand',
						'sppa_model',
						'sppa_useful_info',
						'sppa_comment',
						'sppa_note'
							];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'sppa_created_at';
	protected $updatedField         = 'sppa_updated_at';
	protected $deletedField         = 'sppa_deleted_at';

	// Validation
	protected $validationRules      = [
	'sppa_id_asst'=>'required',
	'sppa_description'=>'required',
	'sppa_brand'=>'required',
	'sppa_model'=>'required',
	'sppa_useful_info'=>'required',
	'sppa_comment'=>'required',
	'sppa_note'=>'required'
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
		$this->join('cmms_assets', 'cmms_assets.id_asst = cmms_spare_parts.sppa_id_asst');
		return $this->findAll();
	}
	
	public function j_find($id){
		$this->select('*');
		$this->join('cmms_assets', 'cmms_assets.id_asst = cmms_spare_parts.sppa_id_asst');
		return $this->find($id);
	}
	

}