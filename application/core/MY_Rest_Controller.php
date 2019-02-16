<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 16/02/19
 * Time: 16:53
 */
namespace Restserver\Core;
use Restserver\Libraries\REST_Controller;
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class MY_Rest_Controller extends REST_Controller
{
	public function __construct() {
//		header('Access-Control-Allow-Origin: *');
//		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
//		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
//		$method = $_SERVER['REQUEST_METHOD'];
//		if($method == "OPTIONS") {
//			die();
//		}
		parent::__construct();
	}

}
