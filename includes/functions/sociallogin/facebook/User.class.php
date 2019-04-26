<?php




/*
 * User Class
 * This class is used for database related (connect, insert, and update) operations
 * @author    CodexWorld.com
 * @url        http://www.codexworld.com
 * @license    http://www.codexworld.com/license
 */
class User {
    private $dbHost     = DB_HOST;
    private $dbUsername = DB_USERNAME;
    private $dbPassword = DB_PASSWORD;
    private $dbName     = DB_NAME;
    private $userTbl    = DB_USER_TBL;
    
    function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
    function checkUser($userData = array()){
        if(!empty($userData)){
            
            // Check whether user data already exists in database
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $prevResult = $this->db->query($prevQuery);
            if($prevResult->num_rows > 0){
                
               
               
               
                
            }else{
                
                $vari = $userData['first_name']. $userData['last_name'].'ox';
                $userii = preg_replace("/[^A-Za-z0-9]/", "", $vari);
                
                $aali = $userData['first_name'].'ch';
                // Insert user data
                $query = "INSERT INTO users (username, oauth_provider, oauth_uid,fullname,coins) VALUES ('".$userii."', '".$userData['oauth_provider']."', '".$userData['oauth_uid']."', '".$userData['first_name']." ".$userData['last_name']."','500')";
                $insert = $this->db->query($query);
            }
            
            // Get user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }
        
        // Return user data
        return $userData;
    }
}