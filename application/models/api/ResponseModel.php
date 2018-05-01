<?php

/**
 * Response Model to deal with response related functionalities
 *
 * This is the Model for all the operations related to the Messages.
 *
 * @category	Controller
 * @author     Charlie
 */

class ResponseModel extends CI_Model {    
    
    const STATUS_SUCCESS = 'Success'; 
    const STATUS_FAILURE = 'Failure';
    const BAD_REQUEST = 'Bad Request';
    const EMAIL_EXISTS = 'Email already in use.';
    const PHONE_EXISTS = 'Phone already in use.';
    const MSG200 = 200;
    /*
     * This function send response to in json format if there is error
     * 
     * @author          Chetu
     * @lastUpdateDate  1212017
     * @params          $error error code and message
     * @return          JSON response
     */
    public static function sendErrorJSONResponse($response){        
        header("HTTP/1.1 200 OK");
        echo json_encode(
                $response
        );
        exit;
    }
    
    /*
     * This function send response to in json format if there is error
     * 
     * @author          Chetu
     * @lastUpdateDate  1212017
     * @params          $message message code and message
     * @params          $response response data
     * @return          JSON response
     */
    public static function sendSuccessJSONResponse($message,$response = NULL){
        header("HTTP/1.1 200 OK");
        
        if($response == NULL){
            $responseData = array(
                'status' => 'SUCCESS',
                'message' => $message
            );
        } else {
            $responseData = array(
                'status' => 'SUCCESS',
                'message' => $message,
                'response'=> $response
            );
        }
        echo json_encode($responseData);
        exit;
    }
    
}