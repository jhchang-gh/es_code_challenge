<?php

require_once( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'DB.php');

class EmployeeModel {

    public function getById($id) {
        
        $db = DB::connect();
        $result = $db->query('SELECT * FROM employees WHERE id=' . $id);
        
        if ( $result ) {
            $row = $result->fetchObject();
            return $row;
        }
    }
    public function setFirstNameById($id,$first_name) {
        
        $db = DB::connect();

        $stmt = $db->prepare('UPDATE employees SET first_name = :first_name WHERE id = :id');

        $result = $stmt->execute([
            ':first_name' => $first_name,
            ':id' => $id
        ]);
        return $result;
    }
    public function setLastNameById($id,$last_name) {
        
        $db = DB::connect();

        $stmt = $db->prepare('UPDATE employees SET last_name = :last_name WHERE id = :id');

        $result = $stmt->execute([
            ':last_name' => $last_name,
            ':id' => $id
        ]);
        return $result;
    }
    public function setPhoneById($id,$phone) {
        
        $db = DB::connect();

        $stmt = $db->prepare('UPDATE employees SET phone = :phone WHERE id = :id');

        $result = $stmt->execute([
            ':phone' => $phone,
            ':id' => $id
        ]);
        return $result;
    }
    public function setOfficeNumberById($id,$office_number) {
        
        $db = DB::connect();

        $stmt = $db->prepare('UPDATE employees SET office_number = :office_number WHERE id = :id');

        $result = $stmt->execute([
            ':office_number' => $office_number,
            ':id' => $id
        ]);
        return $result;
    }
    public function setEmploymentStatusById($id,$employment_status) {
        
        $db = DB::connect();

        $stmt = $db->prepare('UPDATE employees SET employment_status = :employment_status WHERE id = :id');

        $result = $stmt->execute([
            ':employment_status' => $employment_status,
            ':id' => $id
        ]);
        return $result;
    }

}