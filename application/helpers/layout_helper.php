<?php

/**
 * Layout manager file for dealing with layout related functionality
 * 
 * @author Charlie
 * @version 1.0
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function setview($view_file,$data){
    $CI = &get_instance();
    if(substr_count($_SERVER['REQUEST_URI'],"/user")==1){ 
        $CI->load->view('admin/include/layout/backend',array('view_page'=>$view_file,'data' => $data));     
    } else {        
        $CI->losd->view('include/layout/backend', array('view_page' => $view_file, 'data' => $data));
    }
}