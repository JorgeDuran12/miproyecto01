<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Principal');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
 $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Usuarios::index');
$routes->get('/header', 'Principal::index');
$routes->get('eliminados_paises', 'paises::eliminados');
$routes->get('eliminados_municipios', 'municipios::eliminados');
$routes->get('eliminados_departamentos', 'departamentos::eliminados');
$routes->get('eliminados_cargos', 'cargos::eliminados');
$routes->get('eliminados_empleados', 'empleados::eliminados');
$routes->get('eliminados_salarios', 'salarios::eliminados');

$routes->post('buscar_departamentoxpais/(:num)', 'departamentos::buscar_DepartamentosPais/$1');
$routes->post('buscar_municipioxdepartamento/(:num)', 'municipios::buscar_MunicipiosPais/$1');
$routes->post('insertar_municipio', 'municipios::insertar');
$routes->post('eliminar_municipio/(:num)', 'municipios::eliminar/$1');


$routes->post('login', 'Usuarios::login');
$routes->get('cerrar_sesion', 'Usuarios::cerrar_sesion');
$routes->get('crear_cuenta', 'Usuarios::crear_cuenta');
$routes->post('guardar', 'Usuarios::guardar');

/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
