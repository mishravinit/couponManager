<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User controller created intentionally to deal with user related operations
 * 
 * @author Charlie
 * @version 1.0
 */
class User extends CI_Controller {

    /**
     * Default constructor of the class called at the time when class is called
     * 
     * @author Charlie
     * @version 1.0
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    /**
     * Default function for the User controller
     * 
     * @author Chetu Inc.
     * @version 1.0
     */
    public function index() {
        
    }
    
    /**
     * Function to create new user
     * 
     * @author Charlie
     * @version 1.0
     */
    public function create(){
        echo "This is the create user function for signing up";
    }

    /**
     * Function to log user in the web application
     * 
     * @author Charlie
     * @version 1.0
     */
    public function login() {
        $this->load->view('application/user/login');
    }
    
    /**
     * Function to terminate user login session
     * 
     * @author Charlie
     * @version 1.0
     */
    public function logout(){
        redirect(base_url().'user/login');
    }
    
    /**
     * Function to change user password
     * 
     * @author Charlie
     * @version 1.0
     */
    public function change_password(){
        
    }
    
    /**
     * Function to reset user password
     * 
     * @author Charlie
     * @version 1.0
     */
    public function reset_password(){
        
    }

}
