<?php
namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsWdIntervalsModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cmms_wd_intervals';
	protected $primaryKey           = 'id_wdin';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
							'wdin_description',
							'wdin_total_day_for_order',
						'wdin_years',
						'wdin_months',
						'wdin_days',
						'wdin_work_days',
						'wdin_first_ad',
						'wdin_second_ad',
						'wdin_last_ad'
							];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'wdin_created_at';
	protected $updatedField         = 'wdin_updated_at';
	protected $deletedField         = 'wdin_deleted_at';

	// Validation
	protected $validationRules      = [
	'wdin_description'=>'required',
	'wdin_total_day_for_order'=>'required',
	'wdin_years'=>'required',
	'wdin_months'=>'required',
	'wdin_days'=>'required',
	'wdin_work_days'=>'required',
	'wdin_first_ad'=>'required',
	'wdin_second_ad'=>'required',
	'wdin_last_ad'=>'required'
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