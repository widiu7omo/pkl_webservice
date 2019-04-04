<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Integrate_rest_table_requirement extends CI_Migration
{
	public function up()
	{
		// this up() migration is auto-generated, please modify it to your needs
		// Drop table 'table_name' if it exists
//		create table account
		$this->dbforge->drop_table('account', true);

		// Table structure for table 'table_name'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT(2)',
				'unsigned' => true,
				'auto_increment' => true
			),
			'account_identifier' => array(
				'type' => 'VARCHAR(16)',
				'null' => false,
			),
			'username' =>array(
				'type' =>'VARCHAR(16)',
				'null' =>false
			),
			'password' =>array(
				'type' =>'VARCHAR(60)',
				'null' =>false
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
				'null' => false,
			),
			'updated_at' => array(
				'type' => 'TIMESTAMP',
				'null' => true,
			)
		));
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('account');

//		Create table student
		$this->dbforge->drop_table('student', true);

		$field = array(
			'nim' => array(
				'type' => 'VARCHAR(16)',
				'unique' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR(64)',
				'NULL' => false
			),
			'birthdata' =>array(
				'type' => 'TEXT',
				'NULL' => true
			),
			'status' =>array(
				'type' => 'VARCHAR(15)',
				'NULL' => true
			),
			'id_class' => array(
				'type' => 'INT(2)',
				'NULL' => true
			),
			'semester' => array(
				'type' => 'INT(2)',
				'NULL' => true
			),
			'id_study_program' => array(
				'type' => 'INT(2)',
				'NULL' => true
			),
			'id_company' => array(
				'type' => 'INT(3)',
				'NULL' => true
			),
			'id_internshipreport' => array(
				'type' => 'INT(3)',
				'NULL' => true
			),
			'created_at' => array(
				'type' => 'TIMESTAMP',
				'null' => false,
			),
			'updated_at' => array(
				'type' => 'TIMESTAMP',
				'null' => true,
			)
		);
		$this->dbforge->add_field($field);
		$this->dbforge->add_key('nim',TRUE);
		$this->dbforge->create_table('student',TRUE);

//		Create table class
		$this->dbforge->drop_table('class', true);

		// Table structure for table 'table_name'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT(2)',
				'auto_increment' => true
			),
			'alias' => array(
				'type' => 'VARCHAR(16)',
				'null' => false,
			),
			'id_study_program' => array(
				'type' => 'INT(2)'
			)
		));
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('class');

//		Create table lecturer
		$this->dbforge->drop_table('lecturer', true);

		// Table structure for table 'table_name'
		$this->dbforge->add_field(array(
			'nip' => array(
				'type' => 'VARCHAR(16)',
				'null' => false,
			),
			'name' => array(
				'type' => 'VARCHAR(24)',
				'null' => false,
			),
			'id_study_program' => array(
				'type' => 'INT(2)',
				'null' => false,
			)

		));
		$this->dbforge->add_key('nip', true);
		$this->dbforge->create_table('lecturer');

//		Create table study program
		$this->dbforge->drop_table('study_program', true);

		// Table structure for table 'table_name'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT(2)',
				'unsigned' => true,
				'auto_increment' => true
			),
			'alias' =>array(
				'type' => 'VARCHAR(5)',
				'unique' => true
			),
			'name'=>array(
				'type'=> 'VARCHAR(24)',
				'null' => false,
			),
			'id_department'=>array(
				'type'=>'INT(2)',
				'NULL' => true
			)
		));
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('study_program');

//		Create table department
		$this->dbforge->drop_table('department', true);

		// Table structure for table 'department'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT(2)',
				'unsigned' => true,
				'auto_increment' => true
			),
			'name' => array(
				'type' => 'VARCHAR(24)',
				'null' => false,
			),
		));
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('department');

		//Create table company
		$this->dbforge->drop_table('company', true);

		// Table structure for table 'department'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT(3)',
				'unsigned' => true,
				'auto_increment' => true
			),
			'name' => array(
				'type' => 'VARCHAR(100)',
				'null' => false,
			),
			'address' => array(
				'type' => 'VARCHAR(255)',
				'null' => true,
			),
			'quota' => array(
				'type' => 'INT(3)',
				'null' => true,
			),
			'id_city' => array(
				'type' => 'INT(3)',
				'null' => true
			)
		));
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('company');

		//Create table internshipreport
		$this->dbforge->drop_table('internshipreport', true);

		// Table structure for table 'internshipreport'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT(3)',
				'unsigned' => true,
				'auto_increment' => true
			),
			'name' => array(
				'type' => 'VARCHAR(100)',
				'null' => false,
			),
			'implement' => array(
				'type' => 'VARCHAR(255)',
				'null' => true,
			),
		));
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('internshipreport');

		// create table city
		$this->dbforge->drop_table('city', true);

		// Table structure for table 'department'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT(3)',
				'unsigned' => true,
				'auto_increment' => true
			),
			'name' => array(
				'type' => 'VARCHAR(100)',
				'null' => false,
			),
		));
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('city');

//		Create table rest keys
		$this->config->load('rest');
		$table = config_item('rest_keys_table');
		$this->dbforge->drop_table($table, true);

		$fields = array(
			'id'                           => array(
				'type'           => 'INT(11)',
				'auto_increment' => TRUE,
				'unsigned'       => TRUE,
			),
			'user_id'                      => array(
				'type'     => 'INT(11)',
				'unsigned' => TRUE,
			),
			config_item('rest_key_column') => array(
				'type'   => 'VARCHAR(' . config_item('rest_key_length') . ')',
				'unique' => TRUE,
			),
			'level'                        => array(
				'type' => 'INT(2)',
			),
			'ignore_limits'                => array(
				'type'    => 'TINYINT(1)',
				'default' => 0,
			),
			'is_private_key'               => array(
				'type'    => 'TINYINT(1)',
				'default' => 0,
			),
			'ip_addresses'                 => array(
				'type' => 'TEXT',
				'null' => TRUE,
			),
			'date_created'                 => array(
				'type' => 'INT(11)',
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($table);
//		$this->db->query(add_foreign_key($table, 'user_id', 'users(id)', 'CASCADE', 'CASCADE'));

//		Create table rest logs
		$this->config->load('rest');
		$table = config_item('rest_logs_table');
		$this->dbforge->drop_table($table, true);

		$fields = array(
			'id'            => array(
				'type'           => 'INT(11)',
				'auto_increment' => TRUE,
				'unsigned'       => TRUE,
			),
			'api_key'       => array(
				'type' => 'VARCHAR(' . config_item('rest_key_length') . ')',
			),
			'uri'           => array(
				'type' => 'VARCHAR(255)',
			),
			'method'        => array(
				'type' => 'ENUM("get","post","options","put","patch","delete")',
			),
			'params'        => array(
				'type' => 'TEXT',
				'null' => TRUE,
			),
			'ip_address'    => array(
				'type' => 'VARCHAR(45)',
			),
			'time'          => array(
				'type' => 'INT(11)',
			),
			'rtime'         => array(
				'type' => 'FLOAT',
				'null' => TRUE,
			),
			'authorized'    => array(
				'type' => 'VARCHAR(1)',
			),
			'response_code' => array(
				'type'    => 'SMALLINT(3)',
				'null'    => TRUE,
				'default' => 0,
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($table);
//		$this->db->query(add_foreign_key($table, 'api_key',
//			config_item('rest_keys_table') . '(' . config_item('rest_key_column') . ')', 'CASCADE', 'CASCADE'));

//  create table rest access

		$this->config->load('rest');
		$table = config_item('rest_access_table');
		$this->dbforge->drop_table($table, true);
		$fields = array(
			'id'            => array(
				'type'           => 'INT(11)',
				'auto_increment' => TRUE,
				'unsigned'       => TRUE,
			),
			'key'           => array(
				'type' => 'VARCHAR(' . config_item('rest_key_length') . ')',
			),
			'all_access'    => array(
				'type'    => 'TINYINT(1)',
				'default' => 0,
			),
			'controller'    => array(
				'type' => 'VARCHAR(50)',
			),
			'date_created'  => array(
				'type' => 'DATETIME',
				'null' => TRUE,
			),
			'date_modified' => array(
				'type' => 'TIMESTAMP',
			),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('controller');
		$this->dbforge->create_table($table);
//		$this->db->query(add_foreign_key($table, 'key',
//			config_item('rest_keys_table') . '(' . config_item('rest_key_column') . ')', 'CASCADE', 'CASCADE'));
	}


	public function down()
	{
		// this down() migration is auto-generated, please modify it to your needs
		$this->dbforge->drop_table('account', true);
		$this->dbforge->drop_table('student', true);
		$this->dbforge->drop_table('class', true);
		$this->dbforge->drop_table('lecturer', true);
		$this->dbforge->drop_table('study_program', true);
		$this->dbforge->drop_table('department', true);

//		REST API
		$table = config_item('rest_key_column');
		if ($this->db->table_exists($table))
		{
//			$this->db->query(drop_foreign_key($table, 'user_id'));
			$this->dbforge->drop_table($table);
		}
		$table = config_item('rest_logs_table');
		if ($this->db->table_exists($table))
		{
			// $this->db->query(drop_foreign_key($table, 'api_key'));
			$this->dbforge->drop_table($table);
		}
		$table = config_item('rest_access_table');
		if ($this->db->table_exists($table))
		{
//			$this->db->query(drop_foreign_key($table, 'key'));
			$this->dbforge->drop_table($table);
		}
	}
}
