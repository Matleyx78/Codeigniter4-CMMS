<?php

namespace Matleyx\CI4CMMS\Config;

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->group('', ['namespace' => 'Matleyx\CI4CMMS\Controllers'], static function ($routes) {
	//Cmms Spare Parts Routes
	$routes->get('cmms_spare_parts','CmmsSparePartsController::index');
	$routes->get('cmms_spare_parts/add','CmmsSparePartsController::add');
	$routes->post('cmms_spare_parts/save','CmmsSparePartsController::save');
	$routes->get('cmms_spare_parts/edit/(:any)','CmmsSparePartsController::edit/$1');
	$routes->post('cmms_spare_parts/update','CmmsSparePartsController::update');
	$routes->get('cmms_spare_parts/delete/(:any)','CmmsSparePartsController::delete/$1');
	//Cmms Sched Jobs Routes
	$routes->get('cmms_sched_jobs','CmmsSchedJobsController::index');
	$routes->get('cmms_sched_jobs/add','CmmsSchedJobsController::add');
	$routes->post('cmms_sched_jobs/save','CmmsSchedJobsController::save');
	$routes->get('cmms_sched_jobs/edit/(:any)','CmmsSchedJobsController::edit/$1');
	$routes->post('cmms_sched_jobs/update','CmmsSchedJobsController::update');
	$routes->get('cmms_sched_jobs/delete/(:any)','CmmsSchedJobsController::delete/$1');
	//Cmms Counters Routes
	$routes->get('cmms_counters','CmmsCountersController::index');
	$routes->get('cmms_counters/add','CmmsCountersController::add');
	$routes->post('cmms_counters/save','CmmsCountersController::save');
	$routes->get('cmms_counters/edit/(:any)','CmmsCountersController::edit/$1');
	$routes->post('cmms_counters/update','CmmsCountersController::update');
	$routes->get('cmms_counters/delete/(:any)','CmmsCountersController::delete/$1');
	//Cmms Co Intervals Routes
	$routes->get('cmms_co_intervals','CmmsCoIntervalsController::index');
	$routes->get('cmms_co_intervals/add','CmmsCoIntervalsController::add');
	$routes->post('cmms_co_intervals/save','CmmsCoIntervalsController::save');
	$routes->get('cmms_co_intervals/edit/(:any)','CmmsCoIntervalsController::edit/$1');
	$routes->post('cmms_co_intervals/update','CmmsCoIntervalsController::update');
	$routes->get('cmms_co_intervals/delete/(:any)','CmmsCoIntervalsController::delete/$1');
	//Cmms Wd Intervals Routes
	$routes->get('cmms_wd_intervals','CmmsWdIntervalsController::index');
	$routes->get('cmms_wd_intervals/add','CmmsWdIntervalsController::add');
	$routes->post('cmms_wd_intervals/save','CmmsWdIntervalsController::save');
	$routes->get('cmms_wd_intervals/edit/(:any)','CmmsWdIntervalsController::edit/$1');
	$routes->post('cmms_wd_intervals/update','CmmsWdIntervalsController::update');
	$routes->get('cmms_wd_intervals/delete/(:any)','CmmsWdIntervalsController::delete/$1');
	//Cmms Assets Routes
	$routes->get('cmms_assets','CmmsAssetsController::index');
	$routes->get('cmms_assets/add','CmmsAssetsController::add');
	$routes->post('cmms_assets/aj_sel_sect','CmmsAssetsController::aj_sel_sect');
	$routes->post('cmms_assets/save','CmmsAssetsController::save');
	$routes->get('cmms_assets/edit/(:any)','CmmsAssetsController::edit/$1');
	$routes->get('cmms_assets/asse_by_sect/(:any)','CmmsAssetsController::asse_by_sect/$1');
	$routes->post('cmms_assets/update','CmmsAssetsController::update');
	$routes->get('cmms_assets/delete/(:any)','CmmsAssetsController::delete/$1');
	//Cmms Sectors Routes
	$routes->get('cmms_sectors','CmmsSectorsController::index');
	$routes->get('cmms_sectors/add','CmmsSectorsController::add');
	$routes->post('cmms_sectors/save','CmmsSectorsController::save');
	$routes->get('cmms_sectors/edit/(:any)','CmmsSectorsController::edit/$1');
	$routes->get('cmms_sectors/sect_by_build/(:any)','CmmsSectorsController::sect_by_build/$1');
	$routes->post('cmms_sectors/update','CmmsSectorsController::update');
	$routes->get('cmms_sectors/delete/(:any)','CmmsSectorsController::delete/$1');
	//Cmms Buildings Routes
	$routes->get('cmms_buildings','CmmsBuildingsController::index');
	$routes->get('cmms_buildings/add','CmmsBuildingsController::add');
	$routes->post('cmms_buildings/save','CmmsBuildingsController::save');
	$routes->get('cmms_buildings/edit/(:any)','CmmsBuildingsController::edit/$1');
	$routes->post('cmms_buildings/update','CmmsBuildingsController::update');
	$routes->get('cmms_buildings/delete/(:any)','CmmsBuildingsController::delete/$1');
	//Cmms Todo Jobs Routes
	$routes->get('cmms_todo_jobs','CmmsTodoJobsController::index');
	$routes->get('cmms_todo_jobs/add','CmmsTodoJobsController::add');
	$routes->post('cmms_todo_jobs/save','CmmsTodoJobsController::save');
	$routes->get('cmms_todo_jobs/edit/(:any)','CmmsTodoJobsController::edit/$1');
	$routes->get('cmms_todo_jobs/detail/(:any)','CmmsTodoJobsController::detail/$1');
	$routes->get('cmms_todo_jobs/jobs_by_ast/(:any)','CmmsTodoJobsController::jobs_by_ast/$1');
	$routes->get('cmms_todo_jobs/tdjb_by_asst/(:any)','CmmsTodoJobsController::tdjb_by_asst/$1');
	$routes->post('cmms_todo_jobs/update','CmmsTodoJobsController::update');
	$routes->get('cmms_todo_jobs/delete/(:any)','CmmsTodoJobsController::delete/$1');
	$routes->get('cmms_todo_jobs/testq','CmmsTodoJobsController::testq');
	//Cmms Manteiners Routes
	$routes->get('cmms_manteiners','CmmsManteinersController::index');
	$routes->get('cmms_manteiners/add','CmmsManteinersController::add');
	$routes->post('cmms_manteiners/save','CmmsManteinersController::save');
	$routes->get('cmms_manteiners/edit/(:any)','CmmsManteinersController::edit/$1');
	$routes->post('cmms_manteiners/update','CmmsManteinersController::update');
	$routes->get('cmms_manteiners/delete/(:any)','CmmsManteinersController::delete/$1');
	//Report Routes
	//$routes->get('cmms_report/tdjb_by_asst/(:any)','Cmms_report::tdjb_by_asst/$1');
	$routes->get('cmms_report/tdjb_by_asst/(:any)','CmmsReportController::tdjb_by_asst/$1');
	$routes->get('cmms_report/tdjb_by_sect/(:any)','CmmsReportController::tdjb_by_sect/$1');
	$routes->get('cmms_report/tdjb_by_sect_scad/(:any)','CmmsReportController::tdjb_by_sect_scad/$1');
	$routes->get('cmms_report/lav_con_mar','CmmsReportController::lav_con_mar');
    
});