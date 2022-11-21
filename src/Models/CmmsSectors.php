<?php

namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsSectors extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cmms_sectors';
    protected $primaryKey       = 'id_sect';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['sect_description', 'sect_id_buil'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'sect_created_at';
    protected $updatedField  = 'sect_updated_at';
    protected $deletedField  = 'sect_deleted_at';

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
