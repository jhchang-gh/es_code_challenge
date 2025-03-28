<?php

require_once( dirname(__FILE__) . '/../shared/EmployeeModel.php');

class EmployeeApi {

    public function employeeDataGet( $id ) {

        $model = new EmployeeModel();
        return $model->getById($id);

    }

    public function employeeDataSet( $id, $first_name, $last_name, $phone, $office_number ) {

        $model = new EmployeeModel();
        $model->setFirstNameById($id, $first_name);   
        $model->setLastNameById($id, $last_name);  
        $model->setPhoneById($id, $phone);
        $model->setOfficeNumberById($id, $office_number);
        return true;
    }


}