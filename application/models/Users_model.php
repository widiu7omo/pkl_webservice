<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 15/02/19
 * Time: 19:32
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
	public function read($id = NULL){
		$where = NULL;
		$this->db->select('*')
			->from('account')
			->join('student','account.account_identifier = student.nim','LEFT OUTER')
			->join('lecturer','account.account_identifier = lecturer.nik','LEFT OUTER');
		if($id != NULL){
			$where = array('id' => $id);
			$this->db->where($where);
		}
		return $this->db->get()->result_array();
	}

}

/* End of file .php */
