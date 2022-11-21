<?php

namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsTodoJobs extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cmms_todo_jobs';
    protected $primaryKey       = 'id_tdjb';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
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
        'tdjb_job_active',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'tdjb_created_at';
    protected $updatedField  = 'tdjb_updated_at';
    protected $deletedField  = 'tdjb_deleted_at';

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
