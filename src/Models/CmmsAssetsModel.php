<?php
namespace Matleyx\CI4CMMS\Models;

use CodeIgniter\Model;

class CmmsAssetsModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cmms_assets';
	protected $primaryKey           = 'id_asst';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = false;
	protected $allowedFields        = [
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
						'asst_revision'
							];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'asst_created_at';
	protected $updatedField         = 'asst_updated_at';
	protected $deletedField         = 'asst_deleted_at';

	// Validation
	protected $validationRules      = [
	'asst_title'=>'required',
	'asst_description'=>'required',
	'asst_id_sect'=>'required',
	'asst_id_buil'=>'required',
	'asst_brand'=>'required',
	'asst_model'=>'required',
	'asst_targa'=>'required',
	'asst_frame_number'=>'required',
	'asst_serial_number'=>'required',
	'asst_tech_char'=>'required',
	'asst_fabbrication'=>'required',
	'asst_note'=>'required',
	'asst_revision'=>'required'
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

	//protected $builder = $db->table($table);
	public function j_findAll(){
		$this->select('*');
		$this->join('cmms_buildings', 'cmms_buildings.id_buil = cmms_assets.asst_id_buil');
		$this->join('cmms_sectors', 'cmms_sectors.id_sect = cmms_assets.asst_id_sect');
		return $this->findAll();
	}
	public function get_all_cmms_assets($perPage = null, $offset = null)
    {	
		$builder = $this->db->table("cmms_assets");
		return $builder
			->select()
			->join('cmms_buildings', 'cmms_buildings.id_buil = cmms_assets.asst_id_buil')
			->join('cmms_sectors', 'cmms_sectors.id_sect = cmms_assets.asst_id_sect')
			->limit($perPage, $offset)
			->get()
			->getResultArray();
    }
	public function j_find($id){
		$this->select('*');
		$this->join('cmms_buildings', 'cmms_buildings.id_buil = cmms_assets.asst_id_buil');
		$this->join('cmms_sectors', 'cmms_sectors.id_sect = cmms_assets.asst_id_sect');
		return $this->find($id);
	}

	public function ass_by_sec($id_s){
		$this->select('*');
		$this->join('cmms_buildings', 'cmms_buildings.id_buil = cmms_assets.asst_id_buil');
		$this->join('cmms_sectors', 'cmms_sectors.id_sect = cmms_assets.asst_id_sect');
		$this->where('asst_id_sect', $id_s);
		return $this->findAll();
	}

}