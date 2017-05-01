<?php
	namespace App\Helpers;
	use App\Helpers\Validation as Validation;
	use DB;

	class Utils {

		//reponse error structure
		public static function response_error($data){
			return array(
					"code" => 0,
					"data" => "",
					"message" => $data
				);
		}

		//response successs structure
		public static function response_success($data){
			return array(
					"code" => 1,
				    "data" => $data,
				    "message" => array(
				        "code" => 1,
				        "description" => "success"
				    )
				);
		}

    	public static function covertArrayStdClassToArray($arrayStdClass){
	    	$array = array_map(function($item){
			    return (array) $item;
			},$arrayStdClass);
			return $array;
	    }

	    //upload single image
	    public static function upload_single_image($path,$file){
  
	        try {

	            $image_name = $file['name']; 
	            $check_extension = explode('.', $image_name); 
	            $exp = end($check_extension);
	            if (!Validation::validate_image_type($file)) {
	                return Utils::response_error(Validation::error_invalide_file());
	            }
	            
	            $full_name = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).round(microtime(true)) . basename($file['name']);
	            $full_name = str_replace(" ","_",$full_name);
	            $full_name =  preg_replace("/( |\+|\|\,|\(|\)|')/", "", $full_name);
	            $full_name =strip_tags($full_name);
	            $full_path = $path .'/'. $full_name;

	            //upload image
	            $upload = move_uploaded_file($file["tmp_name"], $full_path);
	            
	            chmod($full_path, 0777);
	            if ($upload == true) {
	            	//return image path
	            	return Utils::response_success($full_path);
	            }
	            return Utils::response_error(Validation::error_add_category());
	        } catch (Exception $exc) {
	            return Utils::response_error(Validation::error_add_category());
	        }
	    }

	}