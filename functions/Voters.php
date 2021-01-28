<?php 
require_once ("../functions/databaseController.php");

class Voters {
    private $db_handle;
    
    //constructor of the database controller class
    function __construct() {
        $this->db_handle = new databaseController();
    }
    
    //this function to add new voter record
    function addVoter($name, $gender, $phone, $course, $createdby) {
        $query = "INSERT INTO `voters` (name,gender,phoneno,course,createdby) VALUES (?, ?, ?, ?, ?)";
        $paramType = "sssss";
        $paramValue = array(
            ucwords($name),
            $gender,
            $phone,
            ucwords($course),
            $createdby
         );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    //this function triggers to edit edit record
    function editVoter($name, $gender, $phone, $course, $voter_id) {
        $query = "UPDATE `voters` SET name = ?,gender = ?,phoneno = ?,course = ?, WHERE voterid = ?";
        $paramType = "ssssi";
        $paramValue = array(
            ucwords($name),
            $gender,
            $phone,
            ucwords($course),
            $voter_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
 
	
    //function delete application by id{primary key}
    function deleteVoter($voter_id) {
        $query = "DELETE FROM `voters` WHERE voterid = ?";
        $paramType = "i";
        $paramValue = array(
            $voter_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
        
    //get voter by id:primary_key
    function getVoterByID($voter_id) {    
        $query = "SELECT * FROM `voters` WHERE voterid = ?";
        $paramType = "i";
        $paramValue = array(
            $voter_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
      
		return $result;
    }
    
    //get voter by mobile number
    function getVoterByNumber($voter_mobile) {    
        $query = "SELECT * FROM `voters` WHERE phoneno = ?";
        $paramType = "s";
        $paramValue = array(
            $voter_mobile
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
      
		return $result;
    }
    

    //get all voters, 
    function getVoterList() {
        $sql = "SELECT * FROM `voters` ORDER BY `name` ASC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
    
    
}
?>