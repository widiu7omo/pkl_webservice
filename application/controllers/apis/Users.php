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
	}
//	public function index_get(){
//		$this->response(null,REST_Controller::HTTP_BAD_REQUEST);
//	}
	public function index_get()
	{
		$id = $this->get('id');
		if(isset($id) && $id != NULL){
			$r = $this->Users_model->read($id);
		}
		else {
			$r = $this->Users_model->read();
		}
		$this->response($r,REST_Controller::HTTP_OK);
	}

	public function index_put()
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

	public function index_post()
	{
		$jsonAccount = $this->post('accounts');
		$modeInsert = $this->post('mode');
//		var_dump($modeInsert);
		$importAccountDecode = json_decode($jsonAccount);
		if($modeInsert == 'import'){
//			var_dump($importAccountDecode);
//			TODO:pick column that want to import
			foreach ($importAccountDecode as $account){
				$student = array('nim'=>$account[1],
							     'name'=>$account[2]);
//				add data to table student first
				if($this->Users_model->insert('student',$student)) {
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
				}
				else{
					$this->status = 'errors';
					$this->message[] = $this->db->_error_message();
				}
			}
		}
		$this->response(array('data'=>$importAccountDecode,'status'=>$this->status,'message'=>$this->message),REST_Controller::HTTP_CREATED);

//		$this->response($importAccountDecode,REST_Controller::HTTP_CREATED);
//		$data = array('name' => $this->input->post('name'),
//			'pass' => $this->input->post('pass'),
//			'type' => $this->input->post('type')
//		);
//		$r = $this->user_model->insert($data);
//		$this->response($r);
	}

	public function index_delete()
	{
//		$id = $this->uri->segment(3);
//		$r = $this->user_model->delete($id);
//		$this->response($r);
	}
}
