<?php
namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsSectorsModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cmms_sectors';
	protected $primaryKey           = 'id_sect';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
							'sect_description',
						'sect_id_buil'
							];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'sect_created_at';
	protected $updatedField         = 'sect_updated_at';
	protected $deletedField         = 'sect_deleted_at';

	// Validation
	protected $validationRules      = [
	'sect_description'=>'required',
	'sect_id_buil'=>'required'
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
		$this->join('cmms_buildings', 'cmms_buildings.id_buil = cmms_sectors.sect_id_buil');
		return $this->findAll();
	}
	
	public function j_find($id){
		$this->select('*');
		$this->join('cmms_buildings', 'cmms_buildings.id_buil = cmms_sectors.sect_id_buil');
		return $this->find($id);
	}
	
	public function sec_by_bui($id_b){
		$this->select('*');
		$this->join('cmms_buildings', 'cmms_buildings.id_buil = cmms_sectors.sect_id_buil');
		$this->where('sect_id_buil', $id_b);
		return $this->findAll();
	}
}