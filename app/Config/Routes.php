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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/hello', 'Hello::index');
$routes->get('/login', 'Login::index');
$routes->post('/login/check_login', 'Login::check_login');
$routes->get('/login/logout', 'Login::logout');
$routes->get('/forum_main', 'Forum_Main::index');
$routes->get('/forgot_password_verify', 'Forgot_Password_Verify::index');
$routes->post('forgot_password_verify/check_user_exist', 'Forgot_Password_Verify::check_user_exist');
$routes->get('/create_account', 'Create_Account::index');
$routes->post('/create_account/create_account', 'Create_Account::create_account');
$routes->get('/account_created_successfully', 'Account_Created_Successfully::index');
$routes->post('/upload/upload_file', 'Upload::upload_file');
$routes->get('/upload', 'Upload::index');
$routes->get('/create_post', 'Create_Post::index');
$routes->post('/create_post/insert_post', 'Create_Post::insert_post');
$routes->get('/display_post', 'Display_Post::index');
$routes->get('user_profile', 'User_Profile::index');
$routes->post('user_profile/update_user', 'User_Profile::update_user');
$routes->get('/autosearch','Autocomplete_Search::index');
$routes->get('/forgot_password_reset', 'Forgot_Password_Reset::index');
$routes->post('/forgot_password_reset/updatePassword', 'Forgot_Password_Reset::updatePassword');
$routes->get('/user_images', 'User_Images::index');
$routes->get('/post_comment', 'Post_Comment::index');
$routes->post('/post_comment/insert_comment', 'Post_Comment::insert_comment');




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
