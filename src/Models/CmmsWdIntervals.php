<?php

namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsWdIntervals extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cmms_wd_intervals';
    protected $primaryKey       = 'id_wdin';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['wdin_description', 'wdin_years', 'wdin_months', 'wdin_days', 'wdin_work_days', 'wdin_first_ad', 'wdin_second_ad', 'wdin_last_ad',];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'wdin_created_at';
    protected $updatedField  = 'wdin_updated_at';
    protected $deletedField  = 'wdin_deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
