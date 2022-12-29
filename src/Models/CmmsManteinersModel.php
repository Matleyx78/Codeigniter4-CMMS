<?php
namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsManteinersModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cmms_manteiners';
	protected $primaryKey           = 'id_mtnr';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
							'mtnr_username',
						'mtnr_email',
						'mtnr_id_shield'
							];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'mtnr_created_at';
	protected $updatedField         = 'mtnr_updated_at';
	protected $deletedField         = 'mtnr_deleted_at';

	// Validation
	protected $validationRules      = [
	'mtnr_username'=>'required',
	// 'mtnr_email'=>'required',
	// 'mtnr_id_shield'=>'required'
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