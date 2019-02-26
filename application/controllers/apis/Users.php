<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 15/02/19
 * Time: 19:28
 */

use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends REST_Controller
{
	protected $status = 'success';
	protected $message = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
		$this->load->helper('simple_helper');
	}
//	public function index_get(){
//		$this->response(null,REST_Controller::HTTP_BAD_REQUEST);
//	}
// ================================GET====================================
	public function accounts_get()
	{
		$id = $this->get('id');
		$user = $this->get('user');
		if (isset($id) && $id != NULL) {
			$r = $this->Users_model->read_account($id, $user);
		} else {
			$r = $this->Users_model->read_account(NULL, $user);
		}
		$this->response($r, REST_Controller::HTTP_OK);
	}

	public function users_get()
	{
		$id = $this->get('id');
		$user = $this->get('user');
		$status = $this->get('status');
		$prody = $this->get('prody');
		$schedule = $this->get('schedule');
		$count = $this->get('count');
		//get data by id
//		if(isset($id) && $id != NULL){
//			if(isset($status) && $status != NULL){
//				//get user sidang by id
//				$r = $this->Users_model->read_users($id,$user,$status);
//			}
//			else{
////				get user intern by id
//				$r = $this->Users_model->read_users($id,$user,NULL);
//			}
//		}
//		//get all data
//		else {
		if ($count == 'true') {
			$r = get_count_data('student', array('id_company is NULL',null,false));
		} else {
			if ($prody == 'All') {
				$prody = NULL;
			}
			if ($schedule == 'semua') {
				$schedule = NULL;
			}
			$r = $this->Users_model->read_users($id, $user, $status, $prody, $schedule);
		}


//		}
		$this->response($r, REST_Controller::HTTP_OK);
	}

// ================================PUT====================================
	public function accounts_put()
	{
//		$id = $this->uri->segment(3);
//
//		$data = array('name' => $this->input->get('name'),
//			'pass' => $this->input->get('pass'),
//			'type' => $this->input->get('type')
//		);
//
//		$r = $this->user_model->update($id, $data);
//		$this->response($r);
	}

// ================================POST====================================

	public function accounts_post()
	{
		$jsonAccount = $this->post('accounts');
		$modeInsert = $this->post('mode');
//		var_dump($modeInsert);
		$importAccountDecode = json_decode($jsonAccount);
		if ($modeInsert == 'import') {
//			var_dump($importAccountDecode);
//			TODO:pick column that want to import from excel
			foreach ($importAccountDecode as $account) {
				$student = array('nim' => $account[1],
					'name' => $account[2]);
//				add data to table student first
				if ($this->Users_model->insert('student', $student)) {
					$data = array('account_identifier' => $account[1],
						'username' => $account[1],
						'password' => $account[1]);
//					after student, will insert into account table
					if ($this->Users_model->insert('account', $data)) {
						$this->status = 'success';
					} else {
						$this->status = 'errors';
						$this->message[] = $this->db->_error_message();
					}
				} else {
					$this->status = 'errors';
					$this->message[] = $this->db->_error_message();
				}
			}
		}
		$this->response(array('data' => $importAccountDecode, 'status' => $this->status, 'message' => $this->message), REST_Controller::HTTP_CREATED);

//		$this->response($importAccountDecode,REST_Controller::HTTP_CREATED);
//		$data = array('name' => $this->input->post('name'),
//			'pass' => $this->input->post('pass'),
//			'type' => $this->input->post('type')
//		);
//		$r = $this->user_model->insert($data);
//		$this->response($r);
	}

	public function users_post()
	{
		$jsonUsers = $this->post('users');
		$modeInsert = $this->post('mode');
		$decodeJsonUsers = json_decode($jsonUsers);
		$responsedata = array();
		if ($modeInsert == 'import') {
//			var_dump($decodeJsonUsers);

//			TODO:pick column that want to import from excel
//			var_dump(get_single_data('id','study_program',array('alias'=>$decodeJsonUsers->prody)));
			$program_study = get_single_data(array('id', 'name'), 'study_program', array('alias' => $decodeJsonUsers->prody));
			foreach ($decodeJsonUsers->data as $user) {
				$student = array('nim' => $user->NIM,
					'name' => $user->Nama,
					'semester' => $decodeJsonUsers->semester,
					'id_study_program' => $program_study[0]->id);
//				add data to table student first
				if ($this->Users_model->insert_users('student', $student)) {
//					Do insert to account when data successfully insert to student table

					$data = array('account_identifier' => $user->NIM,
						'username' => $user->NIM,
						'password' => $user->NIM);
////					after student, will insert into account table
					if ($this->Users_model->insert_account('account', $data)) {
						$this->status = 'success';
					} else {
						$this->status = 'errors';
						$this->message[] = $this->db->_error_message();
					}
					//push result to front end
					$student['department'] = $program_study[0]->name;
					array_push($responsedata, $student);
				} else {
					$this->status = 'errors';
					$this->message[] = $this->db->_error_message();
				}
			}
		}

		$this->response(array('data' => $responsedata, 'status' => $this->status, 'message' => $this->message), REST_Controller::HTTP_CREATED);

//		$this->response($importAccountDecode,REST_Controller::HTTP_CREATED);
//		$data = array('name' => $this->input->post('name'),
//			'pass' => $this->input->post('pass'),
//			'type' => $this->input->post('type')
//		);
//		$r = $this->user_model->insert($data);
//		$this->response($r);
	}

// ================================DELETE====================================

	public function accounts_delete()
	{
//		$id = $this->uri->segment(3);
//		$r = $this->user_model->delete($id);
//		$this->response($r);
	}
}
