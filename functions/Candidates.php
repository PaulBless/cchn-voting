<?php 
require_once ("../functions/databaseController.php");

class Candidates {
    private $db_handle;
    
    //constructor of the database controller class
    function __construct() {
        $this->db_handle = new databaseController();
    }
    
    //this function to add new candidate record
    function addCandidate($name, $gender, $phone, $position,  $createdby, $picture) {
        $query = "INSERT INTO `candidates` (`name`,gender,phoneno,position,createdby,picture) VALUES (?, ?, ?, ?, ?, ?)";
        $paramType = "ssssss";
        $paramValue = array(
            ucwords($name),
            $gender,
            $phone,
            ucwords($position),
            $createdby,
			$picture
         );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    //this function triggers to edit candidate record
    function editCandidate($name, $gender, $phone, $position, $picture, $candidate_id) {
        $query = "UPDATE candidates SET name = ?,gender = ?,phoneno = ?,position = ?, picture = ? WHERE candidateid = ?";
        $paramType = "sssssi";
        $paramValue = array(
            ucwords($name),
            $gender,
            $phone,
            ucwords($position),
			$picture,
            $candidate_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    //function delete canidate by id{primary key}
    function deleteCandidate($candidate_id) {
        $query = "DELETE FROM `candidates` WHERE candidateid = ?";
        $paramType = "i";
        $paramValue = array(
            $candidate_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
        
    //get candidate by id:primary_key
    function getCandidateByID($candidate_id) {    
        $query = "SELECT * FROM `candidates` WHERE candidateid = ?";
        $paramType = "i";
        $paramValue = array(
            $candidate_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
      
		return $result;
    }
    
    //fetch all candidates records
    function getAllCandidates() {
        $sql = "SELECT * FROM `candidates` ORDER BY `name` ASC";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
    }
    
    //check candidate exists
    function checkCandidate($name){
        $sql = "SELECT `name` FROM `candidates` WHERE name = ?";
        $paramType = "s";
        $paramValue = array($name);
        $result = $this->db_handle->runQuery($sql, $paramType, $paramValue);

        return $result;
    }
    
}
?>