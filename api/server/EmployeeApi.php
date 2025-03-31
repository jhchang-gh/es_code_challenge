<?php
// Prevent direct access to php file
// Updated require_once instead of hardcoding slashes - best practice format
require_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'shared' . DIRECTORY_SEPARATOR . 'EmployeeModel.php');

class EmployeeApi {

/*
This function is getting ALL of the fields from the database and sending it out
Including the username and password!
Huge security risk to be sending out sensitive information out as a general response
Data should be trimmed down to only include fields relevant to the employee_edit.html form
*/
    public function employeeDataGet( $id ) {

        $model = new EmployeeModel();
        return $model->getById($id);

    }

/*
Shotgun function that sets all values everytime
A better function would be able to cope with having values missing
And the javascript only passes the values that have changed
So we would only update the fields that need to be updated
Should do input validation here
*/

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