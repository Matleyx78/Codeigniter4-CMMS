<?php
namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsBuildingsModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cmms_buildings';
	protected $primaryKey           = 'id_buil';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
							'buil_description'
							];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'buil_created_at';
	protected $updatedField         = 'buil_updated_at';
	protected $deletedField         = 'buil_deleted_at';

	// Validation
	protected $validationRules      = [
	'buil_description'=>'required'
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


}