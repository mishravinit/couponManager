<?php

/**
 * Model to deal with functionality related to user controller
 * 
 * @author Charlie
 * @version 1.0
 */
class UserModel extends CI_Model {

    /**
     * Default constructor for the model class
     * 
     * @author Charlie
     * @version 1.0
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Function to create new user
     * 
     * @param array $data
     * @author Charlie
     * @version 1.0
     */
    public function create($data){
        $this->db->insert('wassup_users', $data);        
        return $this->db->insert_id();
    }
    
    /**
     * Function to login user
     * 
     * @author Charlie
     * @version 1.0
     */
    public function login( $email, $password ){
        $this->db->select('*');
        $this->db->from('wassup_users');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get();
        $data = $query->result();
        return $query;
    }
    
    /**
     * Function to check existing email
     * 
     * @author Charlie
     * @version 1.0
     */
    public function check_existing($fieldName,$value){
        $this->db->select('count(*) as `exists`');
        $this->db->from('wassup_users');
        $this->db->where($fieldName, $value);
        $query = $this->db->get();
        $data = $query->result();
        return $data[0]->exists;
    }

}
