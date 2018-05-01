<?php

/**
 * Model to deal with functionality related to settings controller
 * 
 * @author Charlie
 * @version 1.0
 */
class SettingsModel extends CI_Model {

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
     * @return Array
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
     * Function to update about us content
     * 
     * @return Boolean
     * @param text $content
     * @author Charlie
     * @version 1.0
     */
    public function save_about_us($content) {
        $sql = "UPDATE `app_settings_about_us` SET `content` = '{$content}', "
                . "`updated_at` = '" . date('Y-m-d h:i:s') . "'";
        $query = $this->db->query($sql);
        return $query;
    }

    /**
     * Function to get terms and condition from database
     * 
     * @return Array
     * @auhtor Charlie
     * @version 1.0
     */
    public function get_terms() {
        $sql = "SELECT `content` FROM `app_settings_terms_and_conditions`";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    /**
     * Function to update terms and conditions content
     * 
     * @param text $content
     * @return Boolean
     * @author Charlie
     * @version 1.0
     */
    public function save_terms($content) {
        $sql = "UPDATE `app_settings_terms_and_conditions`"
                . " SET `content` = '{$content}', "
                . "`updated_at` = '" . date('Y-m-d h:i:s') . "'";
        $query = $this->db->query($sql);
        return $query;
    }

    /**
     * Function to pull all the states and cities that are available for sign up
     * 
     * @param integer $limit
     * @param integer $start
     * @return Array
     * @author Charlie
     * @version 1.0
     */
    public function get_states($limit,$start) {
                
        $this->db->limit($limit, $start);
        $query = $this->db->get("app_settings_cities_and_states");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }
        return false;
    }
    
    public function get_total_count_of_states(){
        return $this->db->count_all("app_settings_cities_and_states");
    }

}
