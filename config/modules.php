<?php

	$modules = getModules(app_path().'/Modules/RESTfulAPI');
	$modules = array_merge($modules, getModules(app_path().'/Modules/BackEnd'));
	
	return ['enable' => $modules];

	/**
	 * Get list modules by path
	 * @param  string $path
	 * @param  string $delimiter
	 * @return array
	 * 
	 * @author  BBN-TECH
	 */
	function getModules($path, $delimiter = '/')
	{
		$result = array();
	  	$path = rtrim($path, $delimiter).$delimiter;
	  	// check dir exist
	  	if(!is_dir($path)) return $result;

	  	$d = dir($path);
	  	while($entry = $d->read()){

	    	if(is_dir($path.$entry) && $entry != '.' && $entry != '..'){

	      		$result[] = basename($path).$delimiter.$entry;
	    	}
	  	}
	  	$d->close();

	  	return $result;
	}
