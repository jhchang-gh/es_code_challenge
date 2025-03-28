<?php

require_once( dirname(__FILE__) . '/../shared/EmployeeModel.php');

class EmployeeApi {

    public function employeeDataGet( $id ) {

        $model = new EmployeeModel();
        return $model->getById($id);

    }

    public function employeeDataSet( $id, $first_name, $last_name, $phone, $office_number, $employment_status ) {

        $model = new EmployeeModel();
        if(!$model->setFirstNameById($id, $first_name)) return 'First Name failed to set.';
        if(!$model->setLastNameById($id, $last_name)) return 'Last Name failed to set.';
        if(!$model->setPhoneById($id, $phone)) return 'Phone failed to set.';
        if(!$model->setOfficeNumberById($id, $office_number)) return 'Office Number failed to set';
        if(!$model->setEmploymentStatusById($id, $employment_status)) return 'Employment Status failed to set';
        return 'All fields successfully set';
    }


}