<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author rasmus
 */
class User {
    function User($userID) {
        if(!$userID) {
            return;
        }

        global $dbObj;
        $resultObj = $dbObj->query('SELECT * FROM users WHERE userID = "' . $dbObj->clean($userID) . '"');
        $userArr = $resultObj->fetch_assoc();
        
        $this->makeUserFromArray($userArr);        
    }
    
    function makeUserFromArray($userArr) {
        
        
        $this->setUserID($userArr['userID']);
        $this->setFirstName($userArr['firstname']);
        $this->setLastName($userArr['lastname']);
        $this->setEmail($userArr['email']);
        $this->setPasswordHash($userArr['password']);
    }
    
    function save() {
        global $dbObj;
        
        $dbObj->query('REPLACE INTO users (
                        userID,
                        firstname,
                        lastname,
                        email,
                        password)
                        
                        VALUES(
                        "' . $dbObj->clean($this->getUserID()) . '",
                        "' . $dbObj->clean($this->getFirstname()) . '",
                        "' . $dbObj->clean($this->getLastname()) . '",
                        "' . $dbObj->clean($this->getEmail()) . '",
                        "' . $dbObj->clean($this->getPasswordHash()) . '")');
        
        return $dbObj->getID();
    }
    
    function setUserID($userID) {
        
        $this->userID = $userID;
    }
    
    function getUserID() {
        return $this->userID;
    }
        
    
    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }
    
    function getFirstname() {
        return $this->firstname;
    }
    
    function setLastname($lastname) {
        $this->lastname = $lastname;
    }
    
    function getLastname() {
        return $this->lastname;
    }
    
    function setEmail($email) {
        $this->email = $email;
    }
    
    function getEmail() {
        return $this->email;
    }
    
    function setPasswordHash($passwordHash) {
        $this->passwordHash = $passwordHash;
    }
    
    function getPasswordHash() {
        return $this->passwordHash;
    }
    
    function getUsersJSON() {
        global $dbObj;
        
        $resultObj = $dbObj->query('SELECT * FROM users');
        
        $usersArr = array();
        
        while($userArr = $resultObj->fetch_assoc()) {
            $usersArr[] = $userArr;
        }
        
        return JSON_encode($usersArr);
        
    }
}


