<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'budgetcontroller/get_token';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'budgetcontroller/home';

//ALLOTMENT
$route['allotment'] = 'budgetcontroller/allotment';
$route['allotment/create'] = 'budgetcontroller/allotment_create';
$route['allotment/delete/(:num)'] = 'budgetcontroller/allotment_delete/$1';
$route['allotment/edit/(:num)'] = 'budgetcontroller/allotment_edit/$1';
$route['allotment/update'] = 'budgetcontroller/allotment_update';
//END ALLOTMENT

//OBLIGATION
$route['obligation'] = 'obligationcontroller/obligation';
$route['obligation/(:num)'] = 'obligationcontroller/obligation_month/$1';
$route['obligation/update'] = 'obligationcontroller/obligation_update';
//END OBLIGATION

//DISBURSEMENTS
$route['disbursements'] = 'disbursementscontroller/disbursements';
$route['disbursements/(:num)'] = 'disbursementscontroller/disbursements_month/$1';
$route['disbursements/update'] = 'disbursementscontroller/disbursements_update';
//END DISBURSEMENTS

//MAIN PAP
$route['mp'] = 'budgetcontroller/main_pap_viewall';
$route['mp/create'] = 'budgetcontroller/main_pap_create';
$route['mp/edit/(:num)'] = 'budgetcontroller/main_pap_edit/$1';
$route['mp/update'] = 'budgetcontroller/main_pap_update';
$route['mp/delete/(:num)'] = 'budgetcontroller/main_pap_delete/$1';
//END MAIN PAP

//SUB PAP
$route['sp'] = 'budgetcontroller/sub_pap_viewall';
$route['sp/create'] = 'budgetcontroller/sub_pap_create';
$route['sp/edit/(:num)'] = 'budgetcontroller/sub_pap_edit/$1';
$route['sp/update'] = 'budgetcontroller/sub_pap_update';
$route['sp/delete/(:num)'] = 'budgetcontroller/sub_pap_delete/$1';
//END SUB PAP

//REPORTS
$route['reports'] = 'reportscontroller/reports_view';
//END REPORTS

//LOGS
$route['logs'] = 'reportscontroller/logs_view';
//END LOGS