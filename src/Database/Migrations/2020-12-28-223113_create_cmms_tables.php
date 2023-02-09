<?php

declare(strict_types=1);

namespace Matleyx\CI4CMMS\Controllers;

use CodeIgniter\Database\Migration;

class CreateCmmsTables extends Migration
{
    ///prova modifiche
    private $prefix_table = 'cmms_';
    private $tab_manteiners = array('tname' => 'manteiners', 'pr' => 'mtnr', ); // Pivot Table with Codeigniter Shield
    private $tab_buildings = array('tname' => 'buildings', 'pr' => 'buil', );
    private $tab_sectors = array('tname' => 'sectors', 'pr' => 'sect', );
    private $tab_assets = array('tname' => 'assets', 'pr' => 'asst', );
    private $tab_counters = array('tname' => 'counters', 'pr' => 'cont', );
    private $tab_co_intervals = array('tname' => 'co_intervals', 'pr' => 'coin', ); //Counter interval
    private $tab_wd_intervals = array('tname' => 'wd_intervals', 'pr' => 'wdin', ); //Working day interval
    private $tab_todo_jobs = array('tname' => 'todo_jobs', 'pr' => 'tdjb', );
    private $tab_spare_parts = array('tname' => 'spare_parts', 'pr' => 'sppa', );
    private $tab_sched_jobs = array('tname' => 'sched_jobs', 'pr' => 'scjb', );
    private $tab_activity = array('tname' => 'activity', 'pr' => 'acti', );
    private $tab_tj_act = array('tname' => 'tj_act', 'pr' => 'tjac', );

    public function up(): void
    {
        // Manteiners
        $this->forge->addField([
            'id_' . $this->tab_manteiners['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_manteiners['pr'] . '_username' => ['type' => 'varchar', 'constraint' => 150],
            $this->tab_manteiners['pr'] . '_email' => ['type' => 'varchar', 'constraint' => 150],
            $this->tab_manteiners['pr'] . '_id_shield' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_manteiners['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_manteiners['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_manteiners['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_manteiners['pr']);
        $this->forge->createTable($this->prefix_table . '' . $this->tab_manteiners['tname']);


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
            $this->tab_assets['pr'] . '_title' => ['type' => 'varchar', 'constraint' => 10, 'null' => true],
            $this->tab_assets['pr'] . '_description' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_assets['pr'] . '_id_' . $this->tab_sectors['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_assets['pr'] . '_id_' . $this->tab_buildings['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_assets['pr'] . '_brand' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_assets['pr'] . '_model' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_assets['pr'] . '_targa' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_assets['pr'] . '_frame_number' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_assets['pr'] . '_serial_number' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_assets['pr'] . '_tech_char' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_assets['pr'] . '_fabbrication' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_assets['pr'] . '_note' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_assets['pr'] . '_revision' => ['type' => 'boolean', 'default' => false],
            $this->tab_assets['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_assets['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_assets['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_assets['pr']);
        $this->forge->addKey($this->tab_assets['pr'] . '_id_' . $this->tab_sectors['pr']);
        $this->forge->addKey($this->tab_assets['pr'] . '_id_' . $this->tab_buildings['pr']);
        $this->forge->addForeignKey($this->tab_assets['pr'] . '_id_' . $this->tab_sectors['pr'], $this->prefix_table . '' . $this->tab_sectors['tname'], 'id_' . $this->tab_sectors['pr'], '', 'CASCADE');
        $this->forge->addForeignKey($this->tab_assets['pr'] . '_id_' . $this->tab_buildings['pr'], $this->prefix_table . '' . $this->tab_buildings['tname'], 'id_' . $this->tab_buildings['pr'], '', 'CASCADE');
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
            $this->tab_co_intervals['pr'] . '_id_' . $this->tab_counters['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_co_intervals['pr'] . '_first_ad' => ['type' => 'int', 'constraint' => 3, 'unsigned' => true],
            $this->tab_co_intervals['pr'] . '_second_ad' => ['type' => 'int', 'constraint' => 3, 'unsigned' => true],
            $this->tab_co_intervals['pr'] . '_last_ad' => ['type' => 'int', 'constraint' => 3, 'unsigned' => true],
            $this->tab_co_intervals['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_co_intervals['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_co_intervals['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_co_intervals['pr']);
        $this->forge->addKey($this->tab_co_intervals['pr'] . '_id_' . $this->tab_counters['pr']);
        $this->forge->addForeignKey($this->tab_co_intervals['pr'] . '_id_' . $this->tab_counters['pr'], $this->prefix_table . '' . $this->tab_counters['tname'], 'id_' . $this->tab_counters['pr'], '', 'CASCADE');
        $this->forge->createTable($this->prefix_table . '' . $this->tab_co_intervals['tname']);

        // Working Day Intervals
        $this->forge->addField([
            'id_' . $this->tab_wd_intervals['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_wd_intervals['pr'] . '_description' => ['type' => 'varchar', 'constraint' => 150],
            $this->tab_wd_intervals['pr'] . '_total_day_for_order' => ['type' => 'int', 'constraint' => 5, 'unsigned' => true, 'default' => 0],
            $this->tab_wd_intervals['pr'] . '_years' => ['type' => 'int', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
            $this->tab_wd_intervals['pr'] . '_months' => ['type' => 'int', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
            $this->tab_wd_intervals['pr'] . '_days' => ['type' => 'int', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
            $this->tab_wd_intervals['pr'] . '_work_days' => ['type' => 'int', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
            $this->tab_wd_intervals['pr'] . '_first_ad' => ['type' => 'int', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
            $this->tab_wd_intervals['pr'] . '_second_ad' => ['type' => 'int', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
            $this->tab_wd_intervals['pr'] . '_last_ad' => ['type' => 'int', 'constraint' => 3, 'unsigned' => true, 'default' => 0],
            $this->tab_wd_intervals['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_wd_intervals['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_wd_intervals['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_wd_intervals['pr']);
        $this->forge->createTable($this->prefix_table . '' . $this->tab_wd_intervals['tname']);

        // To Do jobs
        $this->forge->addField([
            'id_' . $this->tab_todo_jobs['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_todo_jobs['pr'] . '_type' => ['type' => 'boolean', 'default' => 0], //0 = Monit, 1 = Manut
            $this->tab_todo_jobs['pr'] . '_title' => ['type' => 'varchar', 'constraint' => 250],
            $this->tab_todo_jobs['pr'] . '_description' => ['type' => 'varchar', 'constraint' => 250],
            $this->tab_todo_jobs['pr'] . '_tools' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_todo_jobs['pr'] . '_id_' . $this->tab_manteiners['pr'] . '_creator' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_todo_jobs['pr'] . '_id_' . $this->tab_manteiners['pr'] . '_reference' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_todo_jobs['pr'] . '_id_' . $this->tab_manteiners['pr'] . '_supervisor' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_todo_jobs['pr'] . '_id_' . $this->tab_buildings['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_todo_jobs['pr'] . '_id_' . $this->tab_sectors['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_todo_jobs['pr'] . '_id_' . $this->tab_assets['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_todo_jobs['pr'] . '_id_' . $this->tab_counters['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            $this->tab_todo_jobs['pr'] . '_id_' . $this->tab_co_intervals['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            $this->tab_todo_jobs['pr'] . '_id_' . $this->tab_wd_intervals['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            $this->tab_todo_jobs['pr'] . '_job_active' => ['type' => 'boolean', 'default' => 1],
            $this->tab_todo_jobs['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_todo_jobs['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_todo_jobs['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_todo_jobs['pr']);
        $this->forge->addKey($this->tab_todo_jobs['pr'] . '_job_active');
        $this->forge->addKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_manteiners['pr'] . '_creator');
        $this->forge->addKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_manteiners['pr'] . '_reference');
        $this->forge->addKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_manteiners['pr'] . '_supervisor');
        $this->forge->addKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_buildings['pr']);
        $this->forge->addKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_sectors['pr']);
        $this->forge->addKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_assets['pr']);
        $this->forge->addKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_counters['pr']);
        $this->forge->addKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_co_intervals['pr']);
        $this->forge->addKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_wd_intervals['pr']);
        $this->forge->addForeignKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_manteiners['pr'] . '_creator', $this->prefix_table . '' . $this->tab_manteiners['tname'], 'id_' . $this->tab_manteiners['pr'], '', 'CASCADE');
        $this->forge->addForeignKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_manteiners['pr'] . '_reference', $this->prefix_table . '' . $this->tab_manteiners['tname'], 'id_' . $this->tab_manteiners['pr'], '', 'CASCADE');
        $this->forge->addForeignKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_manteiners['pr'] . '_supervisor', $this->prefix_table . '' . $this->tab_manteiners['tname'], 'id_' . $this->tab_manteiners['pr'], '', 'CASCADE');
        $this->forge->addForeignKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_buildings['pr'], $this->prefix_table . '' . $this->tab_buildings['tname'], 'id_' . $this->tab_buildings['pr'], '', 'CASCADE');
        $this->forge->addForeignKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_sectors['pr'], $this->prefix_table . '' . $this->tab_sectors['tname'], 'id_' . $this->tab_sectors['pr'], '', 'CASCADE');
        $this->forge->addForeignKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_assets['pr'], $this->prefix_table . '' . $this->tab_assets['tname'], 'id_' . $this->tab_assets['pr'], '', 'CASCADE');
        $this->forge->addForeignKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_counters['pr'], $this->prefix_table . '' . $this->tab_counters['tname'], 'id_' . $this->tab_counters['pr'], '', 'CASCADE');
        $this->forge->addForeignKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_co_intervals['pr'], $this->prefix_table . '' . $this->tab_co_intervals['tname'], 'id_' . $this->tab_co_intervals['pr'], '', 'CASCADE');
        $this->forge->addForeignKey($this->tab_todo_jobs['pr'] . '_id_' . $this->tab_wd_intervals['pr'], $this->prefix_table . '' . $this->tab_wd_intervals['tname'], 'id_' . $this->tab_wd_intervals['pr'], '', 'CASCADE');
        $this->forge->createTable($this->prefix_table . '' . $this->tab_todo_jobs['tname']);

        // Scheduled jobs
        $this->forge->addField([
            'id_' . $this->tab_sched_jobs['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_sched_jobs['pr'] . '_id_' . $this->tab_todo_jobs['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_sched_jobs['pr'] . '_status' => ['type' => 'int', 'constraint' => 2, 'unsigned' => true, 'default' => 0], //0=non iniziata, 1= incorso, 2=completata
            $this->tab_sched_jobs['pr'] . '_execute_by' => ['type' => 'varchar', 'constraint' => 250],
            $this->tab_sched_jobs['pr'] . '_time_exec_minut' => ['type' => 'int', 'constraint' => 4, 'unsigned' => true, 'default' => 0],
            $this->tab_sched_jobs['pr'] . '_comment' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_sched_jobs['pr'] . '_note' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_sched_jobs['pr'] . '_execute_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_sched_jobs['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_sched_jobs['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_sched_jobs['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_sched_jobs['pr']);
        $this->forge->addKey($this->tab_sched_jobs['pr'] . '_id_' . $this->tab_todo_jobs['pr']);
        $this->forge->addForeignKey($this->tab_sched_jobs['pr'] . '_id_' . $this->tab_todo_jobs['pr'], $this->prefix_table . '' . $this->tab_todo_jobs['tname'], 'id_' . $this->tab_todo_jobs['pr'], '', 'CASCADE');
        $this->forge->createTable($this->prefix_table . '' . $this->tab_sched_jobs['tname']);

        // Spare Parts
        $this->forge->addField([
            'id_' . $this->tab_spare_parts['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_spare_parts['pr'] . '_id_' . $this->tab_assets['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            $this->tab_spare_parts['pr'] . '_description' => ['type' => 'varchar', 'constraint' => 250],
            $this->tab_spare_parts['pr'] . '_brand' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_spare_parts['pr'] . '_model' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_spare_parts['pr'] . '_useful_info' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_spare_parts['pr'] . '_comment' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_spare_parts['pr'] . '_note' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_spare_parts['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_spare_parts['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_spare_parts['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_spare_parts['pr']);
        $this->forge->addKey($this->tab_spare_parts['pr'] . '_id_' . $this->tab_assets['pr']);
        $this->forge->addForeignKey($this->tab_spare_parts['pr'] . '_id_' . $this->tab_assets['pr'], $this->prefix_table . '' . $this->tab_assets['tname'], 'id_' . $this->tab_assets['pr'], '', 'CASCADE');
        $this->forge->createTable($this->prefix_table . '' . $this->tab_spare_parts['tname']);

        // Activity
        $this->forge->addField([
            'id_' . $this->tab_activity['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            $this->tab_activity['pr'] . '_description' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_activity['pr'] . '_work' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_activity['pr'] . '_note' => ['type' => 'varchar', 'constraint' => 250, 'null' => true],
            $this->tab_activity['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_activity['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
            $this->tab_activity['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_' . $this->tab_activity['pr']);
        $this->forge->createTable($this->prefix_table . '' . $this->tab_activity['tname']);

                // todojobs-activity
                $this->forge->addField([
                    'id_' . $this->tab_tj_act['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                    $this->tab_tj_act['pr'] . '_id_' . $this->tab_todo_jobs['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
                    $this->tab_tj_act['pr'] . '_id_' . $this->tab_activity['pr'] => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
                    $this->tab_tj_act['pr'] . '_created_at' => ['type' => 'datetime', 'null' => true],
                    $this->tab_tj_act['pr'] . '_updated_at' => ['type' => 'datetime', 'null' => true],
                    $this->tab_tj_act['pr'] . '_deleted_at' => ['type' => 'datetime', 'null' => true],
                ]);
                $this->forge->addPrimaryKey('id_' . $this->tab_tj_act['pr']);
                $this->forge->addKey($this->tab_tj_act['pr'] . '_id_' . $this->tab_todo_jobs['pr']);
                $this->forge->addKey($this->tab_tj_act['pr'] . '_id_' . $this->tab_activity['pr']);
                $this->forge->addForeignKey($this->tab_tj_act['pr'] . '_id_' . $this->tab_todo_jobs['pr'], $this->prefix_table . '' . $this->tab_todo_jobs['tname'], 'id_' . $this->tab_todo_jobs['pr'], '', 'CASCADE');
                $this->forge->addForeignKey($this->tab_tj_act['pr'] . '_id_' . $this->tab_activity['pr'], $this->prefix_table . '' . $this->tab_activity['tname'], 'id_' . $this->tab_activity['pr'], '', 'CASCADE');
                $this->forge->createTable($this->prefix_table . '' . $this->tab_tj_act['tname']);
    }



    // --------------------------------------------------------------------

    public function down(): void
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable($this->prefix_table . '' . $this->tab_manteiners['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_assets['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_buildings['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_sectors['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_counters['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_co_intervals['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_wd_intervals['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_todo_jobs['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_sched_jobs['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_spare_parts['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_activity['tname'], true);
        $this->forge->dropTable($this->prefix_table . '' . $this->tab_tj_act['tname'], true);

        $this->db->enableForeignKeyChecks();
    }
}