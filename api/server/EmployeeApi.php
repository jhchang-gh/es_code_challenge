<?php

require_once( dirname(__FILE__) . '/../shared/EmployeeModel.php');

class EmployeeApi {

    public function employeeDataGet( $id ) {

        $model = new EmployeeModel();
        return $model->getById($id);

    }

    public function employeeDataSet( $id, $first_name, $last_name, $phone, $office_number, $employment_status ) {

        $model = new EmployeeModel();
        if(!$model->setFirstNameById($id, $first_name)) return ['success' => false, 'msg' => 'First Name failed to set'];
        if(!$model->setLastNameById($id, $last_name)) return ['success' => false, 'msg' => 'Last Name failed to set'];
        if(!$model->setPhoneById($id, $phone)) return ['success' => false, 'msg' => 'Phone failed to set'];
        if(!$model->setOfficeNumberById($id, $office_number)) return ['success' => false, 'msg' => 'Office Number failed to set'];
        if(!$model->setEmploymentStatusById($id, $employment_status)) return ['success' => false, 'msg' => 'Employment Status failed to set'];
        return ['success' => true, 'msg' => 'All fields successfully set'];
    }


}