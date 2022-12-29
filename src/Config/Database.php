<?php

declare(strict_types=1);

namespace Matleyx\CI4CMMS\Config;

//use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Database\Config as DBConfig;

class CmmsDatabase extends DBConfig
{

    public $dbcmms = [
        'DSN'      => '',
        'hostname' => 'localhost',
        'username' => '',
        'password' => '',
        'database' => '',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => (ENVIRONMENT !== 'production'),
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306,
    ];

}