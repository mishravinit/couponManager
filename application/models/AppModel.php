<?php

/**
 * Model to deal with functionality related to settings controller
 * 
 * @author Charlie
 * @version 1.0
 */
class AppModel extends CI_Model {

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
     * Function to get about us data
     * 
     * @author Charlie
     * @version 1.0
     */
    public function get_about_us() {
        $sql = "SELECT `content` FROM `app_settings_about_us`";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    /**
     * Function to get terms and condition from database
     * 
     * @auhtor Charlie
     * @version 1.0
     */
    public function get_terms(){
        $sql = "SELECT `content` FROM `app_settings_terms_and_conditions`";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

}