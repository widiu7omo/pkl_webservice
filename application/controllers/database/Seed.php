<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 15/02/19
 * Time: 18:33
 */

class Seed extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function index(){
		for ($i = 1; $i <= 50; $i++) {
			$this->db->insert('account', array(
				'account_identifier' => "A13160{$i}",
				'password' => password_hash('codeigniter', PASSWORD_DEFAULT),
				'username' => "User{$i}",
				'created_at' => date('Y-' . rand(1, 12) . '-' . rand(1, 28) . ' H:i:s'),
			));
			echo "Loading ...{$i}";
		}
		echo 'Success Seeding';
	}
}
