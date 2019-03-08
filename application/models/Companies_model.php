<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 04/03/19
 * Time: 21:05
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Companies_model extends CI_Model
{
	public function read_company($id = NULL,$select = NULL){
		$where = array();
		if($select == NULL){
			$select = '*';
		}
		$this->db->select($select)->from('company c');
		if($id != NULL){
			$where = array_merge($where,array('id'=>$id));
		}
		return $this->db->get()->result_array();

	}
	public function insert_company($data){
		return $this->db->insert('company',$data);
	}

}

/* End of file .php */
