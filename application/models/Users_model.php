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
				->join('lecturer l', 'a.account_identifier = l.nip', 'LEFT OUTER');
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
	public function read_users($id = NULL,$user = NULL,$status = NULL,$prody = NULL,$schedule = NULL){
		$where = NULL;
		if($user == 'student'){
			if($status == 'sidang'){
				$select = array('s.nim', 's.name','s.birthdata','s.status','sp.alias','sp.name as department','ir.name as apptitle');
			}
			else{
				$select = array('s.nim', 's.name','s.semester','s.birthdata','sp.alias','sp.name as department','c.name as company');
			}
			$this->db->select($select)
				->from('student s')
				->join('study_program sp','sp.id = s.id_study_program','LEFT OUTER')
				->join('internshipreport ir','ir.id = s.id_internshipreport','LEFT OUTER')
				->join('company c','c.id = s.id_company','LEFT OUTER');
			$where = array();
//			var_dump($user,$status,$prody,$schedule);
			if($prody != NULL) {
				$where = array_merge($where,array('sp.alias' => $prody));
			}
			if($schedule != NULL) {
				$where = array_merge($where,array('s.status' => $schedule));
			}
			if($id != NULL){
				$where = array_merge(array('s.nim' => $id));
			}
//			var_dump($where);
			if(count($where) != 0){
				$this->db->where($where);
			}

		}
		elseif ($user == 'lecturer') {
			$this->db->select(array('l.nip', 'l.name','sp.alias','sp.name as department'))
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
	//PWA Single User
	public function read_user(){
		return $this->db->select('*')
			->from('student s')
			->join('study_program sp','sp.id = s.id_study_program','LEFT OUTER')
			->join('internshipreport ir','ir.id = s.id_internshipreport','LEFT OUTER')
			->join('company c','c.id = s.id_company','LEFT OUTER');
	}
}

/* End of file .php */
