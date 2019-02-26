<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 17/02/19
 * Time: 13:39
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('simple_helper')) {

	function get_single_data($column = NULL,$table,$where = array()){
		$ci =& get_instance();
		return $ci->db->select($column)->from($table)->where($where)->get()->result();
	}
	function get_count_data($table,$where = array()){
		$ci =& get_instance();
		return $ci->db->from($table)->where($where[0],$where[1],$where[2])->count_all_results();
	}

}
