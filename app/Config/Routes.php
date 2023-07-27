<?php
namespace Config;
$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->setAutoRoute(false);
$routes->set404Override(function(){
    header("Location:login");
    die();
});



/****************** Without Filter Routing **************/
$routes->add('/adminconfiguration', 'Adminconfiguration::adminconfiguration');

$routes->post('/api', 'Api::api');

$routes->get('/', 'Login::login');    

$routes->add('/login', 'Login::login');
/****************** Without Routing End *****************/


/******************* Filter start here *********************/

    $routes->group('',['filter' => 'isLoggedIn'], function ($routes) {
        // Generateapi
        $routes->add('/generateapi', 'Generateapi::generateapi');

        // others
        $routes->post('/confirmationadminpassword','BaseController::confirmationadminpassword');
        
        $routes->add('/profile', 'Profile::profile');

        $routes->add('/dashboard', 'Dashboard::dashboard');  

        $routes->add('/apisalt', 'Apisaltcontroller::apisalt');  

        $routes->get('/logout', 'Logout::logout');


    });

/******************* Filter End here ****************************/

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}