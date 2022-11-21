<?php

namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsSchedJobs extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cmms_sched_jobs';
    protected $primaryKey       = 'id_scjb';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'scjb_id_tdjb',
        'scjb_execute_by',
        'scjb_time_exec_minut',
        'scjb_comment',
        'scjb_note',
        'scjb_execute_at',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'scjb_created_at';
    protected $updatedField  = 'scjb_updated_at';
    protected $deletedField  = 'scjb_deleted_at';

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
