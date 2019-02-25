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
//	ACCOUNT=======================================================
//	@TODO:add user parameter to controller, so it can be part which account for lecturer, which account for student and another
	public function read_account($id = NULL,$user = NULL){
		$where = NULL;
		if($user == 'student'){
			$this->db->select(array('a.account_identifier','a.username','s.name as name'))
				->from('account a')
				->join('student s','a.account_identifier = s.nim','LEFT OUTER');
//				->join('')
		}
		elseif ($user == 'lecturer') {
			$this->db->select(array('a.account_identifier', 'a.username', 'l.name'))
				->from('account a')
				->join('lecturer l', 'a.account_identifier = l.nik', 'LEFT OUTER');
		}
		if($id != NULL){
			$where = array('id' => $id);
			$this->db->where($where);
		}
		return $this->db->get()->result_array();
	}
	public function insert_account($table,$data){
		return $this->db->insert($table,$data);
	}
//  USERS========================================================
	public function read_users($id = NULL,$user = NULL){
		$where = NULL;
		if($user == 'student'){
			$this->db->select(array('s.nim', 's.name','s.semester','s.birthdata','sp.alias','sp.name as department'))
				->from('student s')
				->join('study_program sp','sp.id = s.id_study_program','LEFT OUTER');
			if($id != NULL){
				$where = array('nim' => $id);
				$this->db->where($where);
			}
		}
		elseif ($user == 'lecturer') {
			$this->db->select(array('l.nip','l.nik', 'l.name','sp.alias'.'sp.name as department'))
				->from('lecturer l')
				->join('study_program sp','sp.id = l.id_study_program','LEFT OUTER');
			if($id != NULL){
				$where = array('nik' => $id);
				$this->db->where($where);
			}
		}

		return $this->db->get()->result_array();
	}
	public function insert_users($table,$data){
		return $this->db->insert($table,$data);
	}
}

/* End of file .php */
