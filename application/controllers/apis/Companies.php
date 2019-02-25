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
	public function index_get(){
		return 'success';
	}
}
