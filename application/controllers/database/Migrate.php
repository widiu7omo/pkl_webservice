<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 15/02/19
 * Time: 12:02
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller{

	public function index()
	{
		$this->load->library('migration');

		if ($this->migration->current() === FALSE)
		{
			show_error($this->migration->error_string());
		}
		else{
//			echo $this->migration;
			echo 'Migration Sukses';
		}
	}

}

/* End of file Controllername.php */
