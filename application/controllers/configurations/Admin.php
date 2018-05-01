<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User controller created intentionally to deal with user related operations
 * 
 * @author Charlie
 * @version 1.0
 */
class Admin extends CI_Controller {

    /**
     * Default constructor of the class called at the time when class is called
     * 
     * @author Charlie
     * @version 1.0
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('parser');
        $this->load->helper('url');
    }

    /**
     * Default function to view admin dashboard
     * 
     * @author Charlie. 
     * @version 1.0
     */
    public function index() {
        echo "This is admin dash board";
    }

    /**
     * Function to log admin in configurations
     * 
     * @author Charlie
     * @version 1.0
     */
    public function login() {
        
    }

    /**
     * Function to log admin out of configurations
     * 
     * @author Charlie
     * @version 1.0
     */
    public function logout(){
        
    }
    
    /**
     * Function to reset admin password of configurations
     * 
     * @author Charlie
     * @version 1.0
     */
    public function reset_password(){
        
    }
    
    /**
     * Function to change admin password of configurations
     * 
     * @author Charlie
     * @version 1.0
     */
    public function change_password(){
        
    }
    
}
