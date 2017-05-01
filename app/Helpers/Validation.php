<?php
	namespace App\Helpers;
	use App\Helpers\Utils as Utils;

	class Validation {

		//category
    	public static function _require_input_category($inputs){
    		$flag = true;
    		if($inputs['title'] == ""){
    			$flag = false;
    		}
    		return $flag;
	    }
	    //group category
	    public static function _require_input_group_category($inputs){
    		if($inputs['title'] == "")return false;
    		if($inputs['idCategory'] == "")return false;
    		return true;
	    }
	    //sub category
	    public static function _require_input_sub_category($inputs){
	    	if($inputs['title'] == "")return false;
    		if($inputs['idCategory'] == "")return false;
    		if($inputs['idGroupCate'] == "")return false;
	    	return true;
	    }

	    public static function validate_image_type($file) {

	        $allowedExts = array("jpeg", "jpg", "png","PNG","JPEG");
	        $allowedType = array("image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png");
	        $temp = explode(".", $file["name"]);
	        $extension = end($temp);

	        if (in_array($file["type"], $allowedType) && ($file["size"] < 4400000) && in_array($extension, $allowedExts)) {
	            return TRUE;
	        }
	        return FALSE;
	    }

	    //code statue    
	    public static function error_missing_params(){
	    	return array(
    					"code" => 410,
		        		"description" => "Missing parameter condition"
    				);
	    }
	    public static function error_invalide_file(){
	    	return array(
    					"code" => 420,
		        		"description" => "Invalide file"
    				);
	    }
	    public static function error_add_category(){
	    	return array(
	        			"code" => 440,
        				"description" => "Unable to add category"
	        		);
	    }
	    public static function error_with_message($smg){
	    	return array(
	        			"code" => 450,
        				"description" => $smg
	        		);
	    }

	    //advertise
    	public static function _require_input_advertise($inputs){
    		$flag = true;
    		if($inputs['url'] == ""){
    			$flag = false;
    		}
    		return $flag;
	    }

	}