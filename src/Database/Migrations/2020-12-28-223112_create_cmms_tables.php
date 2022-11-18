<?php

declare(strict_types=1);

namespace Matleyx\CI4CMMS\Controllers;

use CodeIgniter\Database\Migration;

class CreateCmmsTables extends Migration
{
    private $prefix_table = 'cmms_';
    private $tab_buildings = array('tname' => 'worksite', 'pr' => 'wosi', );
    private $tab_sectors = array('tname' => 'impianti', 'pr' => 'impi', );
    private $tab_assets = array('tname' => 'macchine', 'pr' => 'macc', );
    private $tab_counters = array('tname' => 'contatori', 'pr' => 'cont', );
    private $tab_co_intervals = array('tname' => 'intervalli_contatore', 'pr' => 'coin', );   //Counter interval
    private $tab_wd_intervals = array('tname' => 'intervalli_giorni', 'pr' => 'wdin', );   //Working day interval
    private $tab_works = array('tname' => 'lavori', 'pr' => 'jobs', );

    public function up(): void
    {

        // Buildings
        $this->forge->addField([
            'id_' . $this->tab_buildings['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_buildings['pr'] . '_description' => ['type' => 'varchar', 'constraint' => 150],
            $this->tab_buildings['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_buildings['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_buildings['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_buildings['pr']);
        $this->forge->createTable($this->prefix_table . '' . $this->tab_buildings['tname']);

        // Sectors
        $this->forge->addField([
            'id_' . $this->tab_sectors['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_sectors['pr'] . '_description' => ['type' => 'varchar', 'constraint' => 150],
            $this->tab_sectors['pr'] . '_id_' . $this->tab_buildings['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_sectors['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_sectors['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_sectors['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_sectors['pr']);
        $this->forge->addKey($this->tab_sectors['pr'] . '_id_' . $this->tab_buildings['pr']);
        $this->forge->addForeignKey($this->tab_sectors['pr'] . '_id_' . $this->tab_buildings['pr'], $this->prefix_table . '' . $this->tab_buildings['tname'], 'id_' . $this->tab_buildings['pr'], '', 'CASCADE');
        $this->forge->createTable($this->prefix_table . '' . $this->tab_sectors['tname']);

        // Assets
        $this->forge->addField([
            'id_' . $this->tab_assets['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_assets['pr'] . '_description' => ['type' => 'varchar', 'constraint' => 150],
            $this->tab_assets['pr'] . '_id_' . $this->tab_sectors['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_assets['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_assets['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_assets['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_assets['pr']);
        $this->forge->addKey($this->tab_assets['pr'] . '_id_' . $this->tab_sectors['pr']);
        $this->forge->addForeignKey($this->tab_assets['pr'] . '_id_' . $this->tab_sectors['pr'], $this->prefix_table . '' . $this->tab_sectors['tname'], 'id_' . $this->tab_sectors['pr'], '', 'CASCADE');
        $this->forge->createTable($this->prefix_table . '' . $this->tab_assets['tname']);

        // Counters
        $this->forge->addField([
            'id_' . $this->tab_counters['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_counters['pr'] . '_description' => ['type' => 'varchar', 'constraint' => 150],
            $this->tab_counters['pr'] . '_value' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            $this->tab_counters['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_counters['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_counters['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_counters['pr']);
        $this->forge->createTable($this->prefix_table . '' . $this->tab_counters['tname']);

        // Counter Intervals
        $this->forge->addField([
            'id_' . $this->tab_co_intervals['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_co_intervals['pr'] . '_description' => ['type' => 'varchar', 'constraint' => 150],
            $this->tab_co_intervals['pr'] . '_value' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            $this->tab_co_intervals['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_co_intervals['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_co_intervals['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_co_intervals['pr']);
        $this->forge->createTable($this->prefix_table . '' . $this->tab_co_intervals['tname']);

        // Working Day Intervals
        $this->forge->addField([
            'id_' . $this->tab_wd_intervals['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_wd_intervals['pr'] . '_description' => ['type' => 'varchar', 'constraint' => 150],
            $this->tab_wd_intervals['pr'] . '_value' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            $this->tab_wd_intervals['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_wd_intervals['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_wd_intervals['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_wd_intervals['pr']);
        $this->forge->createTable($this->prefix_table . '' . $this->tab_wd_intervals['tname']);

        // Works
        $this->forge->addField([
            'id_' . $this->tab_works['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_works['pr'] . '_description' => ['type' => 'varchar', 'constraint' => 250],
            $this->tab_works['pr'] . '_id_' . $this->tab_buildings['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_works['pr'] . '_id_' . $this->tab_sectors['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_works['pr'] . '_id_' . $this->tab_assets['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_works['pr'] . '_id_' . $this->tab_co_intervals['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            $this->tab_works['pr'] . '_id_' . $this->tab_wd_intervals['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            $this->tab_works['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_works['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_works['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_works['pr']);
        $this->forge->addKey($this->tab_works['pr'] . '_id_' . $this->tab_buildings['pr']);
        $this->forge->addKey($this->tab_works['pr'] . '_id_' . $this->tab_sectors['pr']);
        $this->forge->addKey($this->tab_works['pr'] . '_id_' . $this->tab_assets['pr']);
        $this->forge->addKey($this->tab_works['pr'] . '_id_' . $this->tab_co_intervals['pr']);
        $this->forge->addKey($this->tab_works['pr'] . '_id_' . $this->tab_wd_intervals['pr']);
        $this->forge->addForeignKey($this->tab_works['pr'] . '_id_' . $this->tab_buildings['pr'], $this->prefix_table . '' . $this->tab_buildings['tname'], 'id_' . $this->tab_buildings['pr'], '', 'CASCADE');
        $this->forge->addForeignKey($this->tab_works['pr'] . '_id_' . $this->tab_sectors['pr'], $this->prefix_table . '' . $this->tab_sectors['tname'], 'id_' . $this->tab_sectors['pr'], '', 'CASCADE');
        $this->forge->addForeignKey($this->tab_works['pr'] . '_id_' . $this->tab_assets['pr'], $this->prefix_table . '' . $this->tab_assets['tname'], 'id_' . $this->tab_assets['pr'], '', 'CASCADE');
        $this->forge->addForeignKey($this->tab_works['pr'] . '_id_' . $this->tab_co_intervals['pr'], $this->prefix_table . '' . $this->tab_co_intervals['tname'], 'id_' . $this->tab_co_intervals['pr'], '', 'CASCADE');
        $this->forge->addForeignKey($this->tab_works['pr'] . '_id_' . $this->tab_wd_intervals['pr'], $this->prefix_table . '' . $this->tab_wd_intervals['tname'], 'id_' . $this->tab_wd_intervals['pr'], '', 'CASCADE');
        $this->forge->createTable($this->prefix_table . '' . $this->tab_works['tname']);        
    }

    // --------------------------------------------------------------------

    public function down(): void
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable($this->prefix_table . '' . $this->tab_assets['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_buildings['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_sectors['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_counters['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_co_intervals['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_wd_intervals['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_works['tname'], true);

        $this->db->enableForeignKeyChecks();
    }

}