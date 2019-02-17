<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 17/02/19
 * Time: 13:39
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('Users_helper')) {
	/**
	 * @param null $mode
	 *
	 */
	function check_insert_method($mode = NULL)
	{

		if($mode == 'import'){
			return 'import';
		}
		else{
			return 'single';
		}

		//Do your magic here
	}
}
