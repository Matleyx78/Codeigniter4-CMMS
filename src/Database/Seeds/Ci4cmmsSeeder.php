<?php

namespace Matleyx\CI4CMMS\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Matleyx\CI4CMMS\Models\CmmsWorksite;

class Ci4cmmsSeeder extends Seeder
{
    protected $wsite = array(
        array('val' => 'Miniera16'),
        array('val' => 'Lora23'),
        array('val' => 'Lora27'),
        array('val' => 'Cairo50'),
    );
    public function run()
    {
        $worksite = new CmmsWorksite;
        foreach ($this->wsite as $ws) {
            $worksite->save([
                'wosi_description'  => $ws['val'],
            ]);
        }
    }
}
