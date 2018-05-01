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
        $this->load->model(
            array(
                'api/usermodel',
                'api/loggermodel',
                'api/responsemodel'
            )
        );
        $ip = $this->input->ip_address();
        $api = $this->uri->uri_string;
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
        
        $request = array();
        foreach($this->input->post() as $key => $value){
            $request[$key] = $value;
        }
        
        LoggerModel::log(
            $this->uri->uri_string,
            $this->input->ip_address(),
            $request,
            LoggerModel::REQUEST_STATE_START,
            LoggerModel::LOG_REQUEST
        );
        
        if(empty($this->input->post('email')) || empty($this->input->post('password'))){
            $response = array(
                "status"=> ResponseModel::STATUS_FAILURE,
                "error"=> ResponseModel::BAD_REQUEST
            );            
            LoggerModel::log(
                    $this->uri->uri_string,
                    $this->input->ip_address() ,
                    $response,
                    LoggerModel::REQUEST_STATE_ENDED,
                    LoggerModel::LOG_RESPONSE
            );
            ResponseModel::sendErrorJSONResponse($response);
        } else {
            $name  = $this->input->post('name');
            $email  = $this->input->post('email');
            $password  = $this->input->post('password');
            $phone  = $this->input->post('phone');
            $sex  = $this->input->post('sex');
            $age  = $this->input->post('age');
            $city  = $this->input->post('city');
            $state  = $this->input->post('state');
            $country  = $this->input->post('country');
            $dp  = $this->input->post('dp');
            
            if($this->usermodel->check_existing('email',$email) > 0){
                $response = array(
                    "status"=> ResponseModel::STATUS_FAILURE,
                    "error"=> ResponseModel::EMAIL_EXISTS
                );            
                LoggerModel::log(
                        $this->uri->uri_string,
                        $this->input->ip_address() ,
                        $response,
                        LoggerModel::REQUEST_STATE_ENDED,
                        LoggerModel::LOG_RESPONSE
                );
                ResponseModel::sendErrorJSONResponse($response);
                
            }
            
            if($this->usermodel->check_existing('phone',$phone) > 0){
                $response = array(
                    "status"=> ResponseModel::STATUS_FAILURE,
                    "error"=> ResponseModel::PHONE_EXISTS
                );            
                LoggerModel::log(
                        $this->uri->uri_string,
                        $this->input->ip_address() ,
                        $response,
                        LoggerModel::REQUEST_STATE_ENDED,
                        LoggerModel::LOG_RESPONSE
                );
                ResponseModel::sendErrorJSONResponse($response);
                
            }
            
            $data = array(
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'phone' => $phone,
                'sex' => $sex,
                'age' => $age,
                'city' => $city,
                'state' => $state,
                'country' => $country,
                'dp' => $dp,
            );
            
            if($this->usermodel->create($data)>0){
                
                $response = array(
                    'status' => ResponseModel::STATUS_SUCCESS,
                    'message' => 'Welcome to Wassup!'
                );

                LoggerModel::log(
                        $this->uri->uri_string,
                        $this->input->ip_address() ,
                        $response,
                        LoggerModel::REQUEST_STATE_ENDED,
                        LoggerModel::LOG_RESPONSE
                );
                ResponseModel::sendSuccessJSONResponse(ResponseModel::MSG200, $response);
            }
        }
    }

    /**
     * Function to log user in the web application
     * 
     * @author Charlie
     * @version 1.0
     */
    public function login() {
        $request = array();
        foreach($this->input->post() as $key => $value){
            $request[$key] = $value;
        }
        
        LoggerModel::log(
            $this->uri->uri_string,
            $this->input->ip_address(),
            $request,
            LoggerModel::REQUEST_STATE_START,
            LoggerModel::LOG_REQUEST
        );
        
        if(empty($this->input->post('email')) || empty($this->input->post('password'))){
            $response = array(
                "status"=> ResponseModel::STATUS_FAILURE,
                "error"=> ResponseModel::BAD_REQUEST
            );            
            LoggerModel::log(
                    $this->uri->uri_string,
                    $this->input->ip_address() ,
                    $response,
                    LoggerModel::REQUEST_STATE_ENDED,
                    LoggerModel::LOG_RESPONSE
            );
            ResponseModel::sendErrorJSONResponse($response);
        } else {
            $data = $this->usermodel->login(
                $this->input->post('email'),
                $this->input->post('password')
            );
            
            print_r($data);
        }
    }
    
    /**
     * Function to terminate user login session
     * 
     * @author Charlie
     * @version 1.0
     */
    public function logout(){
        
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
