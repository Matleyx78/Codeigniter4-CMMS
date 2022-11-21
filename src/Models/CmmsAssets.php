<?php

namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsAssets extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cmms_assets';
    protected $primaryKey       = 'id_asst';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'asst_title',
        'asst_description',
        'asst_id_sect', 
        'asst_id_buil', 
        'asst_brand', 
        'asst_model', 
        'asst_targa', 
        'asst_frame_number', 
        'asst_serial_number', 
        'asst_tech_char', 
        'asst_fabbrication', 
        'asst_note',
        'asst_revision',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'asst_created_at';
    protected $updatedField  = 'asst_updated_at';
    protected $deletedField  = 'asst_deleted_at';

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
