<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User controller created intentionally to deal with user related operations
 * 
 * @author Charlie
 * @version 1.0
 */
class App extends CI_Controller {

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
        $this->load->model('appmodel');
    }

    /**
     * Function to display home page contents and render its respective HTML
     * 
     * @author Charlie
     * @version 1.0
     */
    public function index() {
        $this->load->view('pages/home');
    }
    
    /**
     * Function to display about us page contents and render its respective HTML
     * 
     * @author Charlie
     * @version 1.0
     */
    public function about(){
        $about_us = $this->appmodel->get_about_us();
        $this->load->view('pages/about',$about_us[0]);
    }

    /**
     * Function to display services page contents and render its respective HTML
     * 
     * @author Charlie
     * @version 1.0
     */
    public function services(){
        $this->load->view('pages/services');
    }
    
    /**
     * Function to display contact us page contents and render its respective HTML
     * 
     * @author Charlie
     * @version 1.0
     */
    public function contact(){
        $this->load->view('pages/contact');
    }
    
    /**
     * Function to display carrier page contents and render its respective HTML
     * 
     * @author Charlie
     * @version 1.0
     */
    public function carrier(){
        $this->load->view('pages/carrier');
    }
    
    /**
     * Function to display carrier sign up form and its relative functionality
     * 
     * @author Charlie
     * @version 1.0
     */
    public function signup(){
        $this->load->view('pages/sign-up');
    }
    
    /**
     * Function to get terms and conditions
     * 
     * @author Charlie
     * @version 1.0
     */
    public function terms(){
        $about_us = $this->appmodel->get_terms();
        $this->load->view('pages/terms',$about_us[0]);
    }
}