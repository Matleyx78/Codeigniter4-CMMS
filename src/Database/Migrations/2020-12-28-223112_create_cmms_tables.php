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

        // Counterss
        $this->forge->addField([
            'id_' . $this->tab_counters['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_counters['pr'] . '_description' => ['type' => 'varchar', 'constraint' => 150],
            $this->tab_counters['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_counters['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_counters['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_counters['pr']);
        $this->forge->createTable($this->prefix_table . '' . $this->tab_counters['tname']);
    }

    // --------------------------------------------------------------------

    public function down(): void
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable($this->prefix_table . '' . $this->tab_assets['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_buildings['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_sectors['tname'], true);
        // $this->forge->dropTable('auth_identities', true);
        // $this->forge->dropTable('auth_groups_users', true);
        // $this->forge->dropTable('auth_permissions_users', true);
        // $this->forge->dropTable('users', true);

        $this->db->enableForeignKeyChecks();
    }
}