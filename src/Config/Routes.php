<?php

namespace Matleyx\CMMS\Config;

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Myth:Auth routes file.
$routes->group('', ['namespace' => 'Matleyx\CMMS\Controllers'], static function ($routes) {
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
	$routes->post('cmms_assets/save','CmmsAssetsController::save');
	$routes->get('cmms_assets/edit/(:any)','CmmsAssetsController::edit/$1');
	$routes->post('cmms_assets/update','CmmsAssetsController::update');
	$routes->get('cmms_assets/delete/(:any)','CmmsAssetsController::delete/$1');
	//Cmms Sectors Routes
	$routes->get('cmms_sectors','CmmsSectorsController::index');
	$routes->get('cmms_sectors/add','CmmsSectorsController::add');
	$routes->post('cmms_sectors/save','CmmsSectorsController::save');
	$routes->get('cmms_sectors/edit/(:any)','CmmsSectorsController::edit/$1');
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
	$routes->post('cmms_todo_jobs/update','CmmsTodoJobsController::update');
	$routes->get('cmms_todo_jobs/delete/(:any)','CmmsTodoJobsController::delete/$1');
	//Cmms Manteiners Routes
	$routes->get('cmms_manteiners','CmmsManteinersController::index');
	$routes->get('cmms_manteiners/add','CmmsManteinersController::add');
	$routes->post('cmms_manteiners/save','CmmsManteinersController::save');
	$routes->get('cmms_manteiners/edit/(:any)','CmmsManteinersController::edit/$1');
	$routes->post('cmms_manteiners/update','CmmsManteinersController::update');
	$routes->get('cmms_manteiners/delete/(:any)','CmmsManteinersController::delete/$1');
    
});