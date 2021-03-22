<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('FeedbackController');
$routes->setDefaultMethod('GetfeedbackTemplate');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'FeedbackController::GetfeedbackTemplate');
//$routes->get('/GetfeedbackTemplateById', 'FeedbackController::GetfeedbackTemplate');
$routes->get('/', 'HomeController::index');
$routes->get('/login', 'UserController::login');
$routes->get('/forgot-password', 'UserController::forgotPassword');
$routes->get('/registration', 'UserController::registration'); 
$routes->get('/dashboard', 'UserController::dashboard'); 
$routes->get('/sendfeedback', 'FeedbackController::GetfeedbackTemplate'); 
$routes->get('/contactus', 'UserController::contactUs'); 
$routes->get('/findjob', 'JobController::findJob'); 
$routes->get('/about-contactUs', 'HomeController::AboutAndContactUS'); //
$routes->get('/getcandidatedetail', 'UserController::get_candidate_detail'); 

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
