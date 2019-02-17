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
		parent::__construct();
	}

}
