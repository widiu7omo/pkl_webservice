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
	public function read($id = NULL,$user = NULL){
		$where = NULL;
		if($user == 'student'){
			$this->db->select(array('a.account_identifier','a.username','s.name as name'))
				->from('account a')
				->join('student s','a.account_identifier = s.nim','LEFT OUTER');
//				->join('')
		}
		elseif ($user == 'lecturer') {
			$this->db->select(array('a.account_identifier', 'a.username', 'l.name','l.'))
				->from('account a')
				->join('lecturer l', 'a.account_identifier = l.nik', 'LEFT OUTER');
		}
		if($id != NULL){
			$where = array('id' => $id);
			$this->db->where($where);
		}
		return $this->db->get()->result_array();
	}
	public function insert($table,$data){
		return $this->db->insert($table,$data);
	}

}

/* End of file .php */
