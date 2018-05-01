<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User controller created intentionally to deal with user related operations
 * 
 * @author Charlie
 * @version 1.0
 */
class Settings extends CI_Controller {

    /**
     * Default constructor of the class called at the time when class is called
     * 
     * @author Charlie
     * @version 1.0
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->model('configurations/settingsmodel');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    /**
     * Default function for the settings dashboard
     * 
     * @author Chetu Inc.
     * @version 1.0
     */
    public function index() {
        
    }

    /**
     * Function to add edit and delete states user in the web application
     * 
     * @author Charlie
     * @version 1.0
     */
    public function city_states() {
        
        $config = array();
        
        $config["base_url"] = base_url() . "index.php/configurations/settings/city_states/";
        $config["total_rows"] = $this->settingsmodel->get_total_count_of_states();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;        
        
        $data["results"] = $this->settingsmodel->get_states($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        
        $this->load->view('configurations/states', $data);
    }

    /**
     * Function to add edit and delete streams
     * 
     * @author Charlie
     * @version 1.0
     */
    public function streams() {
        
    }

    /**
     * Function to update terms and conditions visible on CMS
     * 
     * @author Charlie
     * @version 1.0
     */
    public function edit_terms() {
        $terms = $this->settingsmodel->get_terms();
        $this->load->view('configurations/edit-terms', $terms[0]);
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('content', 'Content', 'required');
            if ($this->form_validation->run() == FALSE) {
                die("EMPTY CONTENT!");
            } else {
                $this->settingsmodel->save_terms($this->input->post('content'));
                redirect(base_url() . 'index.php/configurations/settings/edit_terms');
            }
        }
    }

    /**
     * Function to update about us text visible on CMS
     * 
     * @author Charlie
     * @version 1.0
     */
    public function edit_about() {
        $about_us = $this->settingsmodel->get_about_us();
        $this->load->view('configurations/edit-about-us', $about_us[0]);

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('content', 'Content', 'required');
            if ($this->form_validation->run() == FALSE) {
                die("EMPTY CONTENT!");
            } else {
                $this->settingsmodel->save_about_us($this->input->post('content'));
                redirect(base_url() . 'index.php/configurations/settings/edit_about');
            }
        }
    }

}
