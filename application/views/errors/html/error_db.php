<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo $heading;
$errors = array('message'=>$message,
				'status' =>$status_code);
echo json_encode($errors);
