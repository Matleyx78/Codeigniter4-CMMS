<?php

namespace Matleyx\CI4CMMS\Libraries;

use CodeIgniter\I18n\Time;
use Matleyx\CI4CMMS\Models\CmmsTodoJobsModel;
use Matleyx\CI4CMMS\Models\CmmsSchedJobsModel;
use DateTime;


class Common_function
{
    function __construct()
    {
        
    }

    public function scjb_by_tdjb($id_tdjb = null)
    {
        if (!$id_tdjb){
            echo 'Sticazzi';
            exit;

        }        
        helper('date_helper');
        $oggi = new DateTime(now_to_datetime());
        $todojobs_model = new CmmsTodoJobsModel;
        $schedjobs_model = new CmmsSchedJobsModel;
        $si_todo_job = $todojobs_model->j_find($id_tdjb);        
        $last_sched = $schedjobs_model->last_scj_by_tdj($id_tdjb);
        if (!isset($last_sched['id_scjb'])) {
            $ultima_esecuzione = 'Nessuna';
            $prossima_scadenza = $oggi;
        } else {
            $ultima_esecuzione = new DateTime($last_sched['scjb_execute_at']);
            $prossima_scadenza = $ultima_esecuzione->modify('+ ' . $si_todo_job['wdin_total_day_for_order'] . ' days');
            $ultima_esecuzione = new DateTime($last_sched['scjb_execute_at']);
        }
        if ($oggi >= $prossima_scadenza) {
            $scaduta = true;
        } else {
            $scaduta = false;
        }
        $data['dati'] = [
            'job' => $si_todo_job['id_tdjb'],
            'intervallo' => $si_todo_job['wdin_description'],
            'ultima_esec' => $ultima_esecuzione,
            'prossima_scad' => $prossima_scadenza,
            'Scaduta' => $scaduta,
        ];

        return $data['dati'];
    }

}
