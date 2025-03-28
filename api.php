<?php

require_once('api/server/EmployeeApi.php');
require_once('api/server/Auth.php');

$auth = new Auth();

$req_obj = $_GET['obj'];
$req_type = $_GET['req'];

$data = [ 'success' => 'false', 'msg' => 'invalid request'];

switch( $req_obj ) {

    case 'employee':
        $auth->requireLogin();
        $api = new EmployeeApi();
        if( $req_type == 'get'){
            $data = $api->employeeDataGet( $_GET['id'] ) ;
        }else if( $req_type == 'set'){
            $data = $api->employeeDataSet( $_GET['id'] , $_GET['first_name'], $_GET['last_name'], $_GET['phone'], $_GET['office_number'], $_GET['employment_status'] ) ;
        }
        break;
    case 'auth':
        if ( $req_type == 'doLogin' ) {
            $data = $auth->doLogin( $_REQUEST['username'], $_REQUEST['password'] );
        }
        else if ( $req_type == 'requireLogin' ) {
            $data = $auth->requireLogin();
        }
        break;
}

if ( $data ) {
    echo json_encode($data);
    exit;
}