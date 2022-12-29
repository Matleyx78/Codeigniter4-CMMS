<?php
namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsCountersModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cmms_counters';
	protected $primaryKey           = 'id_cont';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
							'cont_description',
						'cont_value'
							];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'cont_created_at';
	protected $updatedField         = 'cont_updated_at';
	protected $deletedField         = 'cont_deleted_at';

	// Validation
	protected $validationRules      = [
	'cont_description'=>'required',
	'cont_value'=>'required'
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