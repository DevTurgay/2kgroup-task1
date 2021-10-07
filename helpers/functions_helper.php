<?php
	
	if(!function_exists('validateBetData')){
		function validateBetData($data) {
			if(!isset($data['Header']) || !isset($data['Param']))
				return false;

			return true;
		}
	}