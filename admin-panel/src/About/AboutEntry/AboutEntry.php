<?php
/**
 * Created by PhpStorm.
 * User: AH
 * Date: 1/28/2017
 * Time: 9:22 PM
 */

namespace App\About\AboutEntry;
use App\dbConnection;

class AboutEntry
{
    public $mySQLi;
    public $id = '';
    public $title = '';
    public $description = '';


    public function __construct()
    {
        $conn = new dbConnection();
        $this->mySQLi = $conn->connect();
    }

    public function prepare($data = '')
    {
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        if (array_key_exists('title', $data)) {
            $this->title = $data['title'];
        }
        if (array_key_exists('description', $data)) {
            $this->description = $data['description'];
        }
//        print_r($this);
//
//        die();


    }


    public function store(){
        date_default_timezone_set("Asia/Dhaka");
        if(isset($this->title) && !empty($this->title)){
            $this->description = $this->mySQLi->real_escape_string($this->description);
            $query="INSERT INTO `tbl_about` (`title`,`description`,`is_active`,`entry_date`) VALUES ('".$this->title."', '".$this->description."',0,'". date('Y-m-d H:i:s')."')";
//            echo $query;
//            die();
            if($this->mySQLi->query($query)){
                $_SESSION['successMessage']="Successfully Added";
            } else{
                $_SESSION['errorMessage']="Oops! Something wrong!!!";
            }
        }
        header('location:index.php');
    }

    public function index(){
        $mydata=array();
        $query="SELECT * FROM `tbl_employee` WHERE `tbl_employee`.`company_id`='".$this->companyId."' AND deleted_at IS NULL ORDER BY employee_id";
//        echo $query;
//        die();
        $result=  mysql_query($query);
        while ($row=  mysql_fetch_assoc($result)){
            $mydata[]=$row;
        }
        return $mydata;
        header('location:index.php');
    }

    public function show(){
        $query="SELECT * FROM `tbl_about` where `tbl_about`.`is_active`=1";
//        echo $query;
//        die();
        $result=  mysql_query($query);
        $row=  mysql_fetch_assoc($result);
        return $row;
    }

    public function update(){
        $query="UPDATE `tbl_employee` SET `employee_id` = '".$this->employeeId."',`first_name`='".$this->firstName."',`last_name`='".$this->lastName."',`card_id`='".$this->cardId."',`department`='".$this->department."',`designation`='".$this->designation."',`date_of_birth`='".$this->dateOfBirth."',`joining_date`='".$this->joiningDate."',`shift`='".$this->shift."',`contact_no`='".$this->contactNo."',`present_address`='".$this->presentAddress."',`permanent_address`='".$this->permanentAddress."',`status`='".$this->status."',`blood_group`='".$this->bloodGroup."',`remarks`='".$this->remarks."' WHERE `tbl_employee`.`id` =". $this->id;
//        echo $query;
//        die();
        mysql_query($query);
        $_SESSION['successMessage']="Data Updated Successfully";
        header('location:index.php');
    }

    public function trash()
    {

        $query = "UPDATE `tbl_employee` SET `deleted_at` = '" . date('Y-m-d') . "' WHERE `tbl_employee`.`id` =" . $this->id;
//        echo $query;
//        die();
        if (mysql_query($query)) {
            $_SESSION['successMessage'] = "Deleted Successfully";
        } else {
            $_SESSION['errorMessage'] = "Oops! Something wrong to delete data!";
        }

        header('location:index.php');
    }
    public function lastEntry(){
        $query="SELECT * FROM `tbl_employee` WHERE `tbl_employee`.`company_id` = '".$this->companyId."' ORDER BY id DESC LIMIT 1";
//        echo $query;
//        die();
        $result=  mysql_query($query);
        $row=  mysql_fetch_assoc($result);
        return $row;
    }

    public function shift(){
        $mydata=array();
        $query="SELECT * FROM `tbl_shift` WHERE `tbl_shift`.`company_id`='".$this->companyId."' AND deleted_at IS NULL";
//        echo $query;
//        die();
        $result=  mysql_query($query);
        while ($row=  mysql_fetch_assoc($result)){
            $mydata[]=$row;
        }
        return $mydata;
    }

    public function employee(){
        $mydata=array();
        $query="SELECT * FROM `tbl_employee` WHERE `tbl_employee`.`company_id`='".$this->companyId."' AND `tbl_employee`.`is_user`='0' AND deleted_at IS NULL";
//        echo $query;
//        die();
        $result=  mysql_query($query);
        while ($row=  mysql_fetch_assoc($result)){
            $mydata[]=$row;
        }
        return $mydata;
        header('location:index.php');
    }

}