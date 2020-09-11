<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	https://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There are three reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router which controller/method to use if those

| provided in the URL cannot be matched to a valid route.

|

|	$route['translate_uri_dashes'] = FALSE;

|

| This is not exactly a route, but allows you to automatically route

| controller and method names that contain dashes. '-' isn't a valid

| class or method name character, so it requires translation.

| When you set this option to TRUE, it will replace ALL dashes with

| underscores in the controller and method URI segments.

|

| Examples:	my-controller/index	-> my_controller/index

|		my-controller/my-method	-> my_controller/my_method

*/

//$route['default_controller'] = 'welcome';



$route['default_controller'] = 'home_controller/index';

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;

$route['settings'] = 'welcome/settings';

$route['profile'] = 'welcome/settings';

$route['dashboard'] = 'dashboard/blankPage';



/** pages */

$route['home'] = 'home_controller/index';

$route['lang'] = 'home_controller/changeLang';

$route['flashdata'] = 'FlashData_Controller'; 

$route['^(en|ar|it)/rent'] = 'home_controller/rent';
$route['rent'] = 'home_controller/rent';

$route['rent/(:num)'] = 'home_controller/rent';

$route['buy'] = 'home_controller/buy';

$route['buy/(:num)'] = 'home_controller/buy';

$route['commercial'] = 'home_controller/commercial';

$route['commercial/(:num)'] = 'home_controller/commercial';

$route['agent'] = 'home_controller/find_agent';

$route['project'] = 'home_controller/new_project';

$route['project/(:num)'] = 'home_controller/view_single_new_project';

$route['search/(:num)'] = 'home_controller/search';

$route['search'] = 'home_controller/search';

$route['overview/(:any)'] = 'home_controller/view_single_property';

$route['agentOverview/(:num)/(:num)'] = 'home_controller/view_single_agent';

$route['agentOverview/(:num)'] = 'home_controller/view_single_agent';

$route['companyOverview/(:num)/(:num)'] = 'home_controller/view_single_company';

$route['companyOverview/(:num)'] = 'home_controller/view_single_company';

$route['partner_login'] = 'home_controller/broker_login';



$route['find-space'] = 'home_controller/space';                              //***********************space

$route['list-space'] = 'home_controller/list_space';                            //***********************space

$route['spaceOverview/(:num)'] = 'home_controller/view_single_space';   //***********************space

$route['terms_and_conditions'] = 'home_controller/terms_and_conditions';

$route['privacy_policy'] = 'home_controller/privacy_policy';

$route['about_us'] = 'home_controller/about_us';

$route['new_projects_details'] = 'home_controller/new_projects_details';

$route['blog'] = 'home_controller/blog';

$route['blog_view/(:num)'] = 'home_controller/blog_view';

$route['404'] = 'home_controller/page_not_found';

$route['500'] = 'home_controller/internal_server_error';

//$route['subjects/(:num)/(:any)'] = 'subjects/view/$1/$2';



/** Admin Login  */



$route['admin_login'] = 'Login/index';

$route['users'] = 'Dashboard/manage_user_controller';

$route['category'] = 'Dashboard/manage_category_controller';

$route['property_type'] = 'Dashboard/manage_property_type_controller';

$route['furniture'] = 'Dashboard/manage_furniture_controller';

$route['bed-type'] = 'Dashboard/manage_bed_type_controller';

$route['room-type'] = 'Dashboard/manage_room_type_controller';

$route['bathroom-types'] = 'Dashboard/manage_bathroom_type_controller';

$route['room-amenities'] = 'Dashboard/manage_room_amenities_controller';

$route['country'] = 'Dashboard/manage_country_controller';

$route['social-media'] = 'Dashboard/social_media_links';

//$route['article_manager'] = 'Dashboard/manage_article_controller';

$route['article_manager'] = 'Article/manage_article_controller';

$route['advertisement_manager'] = 'Advertisement/manage_advertisement_controller';



$route['new_project_section'] = 'NewProjects/new_project_section';

$route['new_project_section/(:num)'] = 'NewProjects/new_project_section';

$route['newprojects/get_new_project_by_id'] = 'NewProjects/get_new_project_by_id';



$route['property'] = 'Property/manage_property_controller';

$route['pending_property'] = 'Property/manage_pending_property';

$route['company_users'] = 'Property/manage_company_users';



$route['aboutus'] = 'Property/manage_about_us';

$route['review_manager'] = 'Article/manage_review_controller';

<<<<<<< HEAD
$route['verify_user']='Property/user_verify';
=======


//////////////////////////////////////////////////
$route['verification_user'] = 'home_controller/user_verification';
>>>>>>> dev
