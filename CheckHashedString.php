<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


/**
 * Description of CheckHashedString
 *
 * @author david
 */
class CheckHashedString {
    //put your code here
    
    public function __construct(){

        Validator::extend('check_hashed_string', function ($attribute, $value, $parameters, $validator) {
            
            if(class_exists($parameters[0]) === FALSE){
                throw new \Exception("Model Class, does not exist.", E_WARNING);
            }
            
            if(is_numeric($parameters[1]) === FALSE){
                throw new \Exception("Model id, must be numeric", E_WARNING);
            }
            
            if(is_string($parameters[2]) === FALSE){
                throw new \Exception("Modelfield name must be a string.", E_WARNING);
            }
            
            
            eval("\$aModel = {$parameters[0]}::where('id', '=', {$parameters[1]})->first();");
            
            if($aModel === NULL){
                throw new \Exception('Model Not Found', E_WARNING);
            }
            
            if (Hash::check($value, $aModel->{$parameters[2]}, $parameters[3] ?? []) === FALSE) {
                return FALSE;
            }
        });
        
    }
    
    
}
