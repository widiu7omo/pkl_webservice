<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 20/02/19
 * Time: 9:11
 */
use Restserver\Libraries\REST_Controller;
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Companies extends REST_Controller
{
	protected $status = 'success';
	protected $message = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Companies_model');
		$this->load->helper('simple_helper');
	}

	public function index_get(){
		$id = $this->get('id');
		if(isset($id) && $id != NULL){
			$result = $this->Companies_mode->read_company($id);
		}
		else{
			$result = $this->Companies_model->read_company(NULL);
		}
		return $this->response($result,REST_Controller::HTTP_OK);
	}
	public function index_post(){
		$jsonCompany = $this->post('companies');
		$modeInsert = $this->post('mode');
		//TODO:add modeinsert to single, for insert once
		$importCompanyDecode = json_decode($jsonCompany);
//		var_dump($importCompanyDecode);

		$responsedata = array();
		if ($modeInsert == 'import') {
//			TODO:pick column that want to import from excel
			foreach ($importCompanyDecode->data as $comp) {
				$company = array('name' => $comp->{'nama perusahaan'},
					'address' => isset($comp->alamat)?$comp->alamat:null,
					'quota'=> $importCompanyDecode->quota);
//				add data to table student first
//				array_push($responsedata, $company);

				if ($this->Companies_model->insert_company($company)) {
//					Do insert to account when data successfully insert to student table
					$this->status = 'success';
					array_push($responsedata, $company);
				} else {
					$this->status = 'errors';
					$this->message[] = $this->db->_error_message();
				}
			}
		}
		$this->response(array('data' => $responsedata, 'status' => $this->status, 'message' => $this->message), REST_Controller::HTTP_CREATED);

	}

}
