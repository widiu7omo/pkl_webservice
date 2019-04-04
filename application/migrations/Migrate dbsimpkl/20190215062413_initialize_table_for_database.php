<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Initialize_Table_For_Database extends CI_Migration
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
				'null' => false
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
				'type' => 'DATETIME',
				'null' => false,
			),
			'updated_at' => array(
				'type' => 'DATETIME',
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
				'type' => 'VARCHAR(64)'
			),
			'birthdata' =>array(
				'type' => 'TEXT'
			),
			'id_class' => array(
				'type' => 'VARCHAR(16)'
			),
			'semester' => array(
				'type' => 'INT(2)'
			),
			'id_study_program' => array(
				'type' => 'INT(2)'
			),
			'created_at' => array(
				'type' => 'DATETIME',
				'null' => false,
			),
			'updated_at' => array(
				'type' => 'DATETIME',
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
				'type' => 'VARCHAR(16)',
			),
			'alias' => array(
				'type' => 'VARCHAR(16)',
				'null' => false,
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
				'null' => true,
				'unique' => true
			),
			'nik' => array(
				'type' => 'VARCHAR(16)',
				'null' => false,
				'unique' => true
			),
			'name' => array(
				'type' => 'VARCHAR(24)',
				'null' => false,
			),
			'id_study_program' => array(
				'type' => 'VARCHAR(24)',
				'null' => false,
			)

		));
		$this->dbforge->add_key('nik', true);
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
			'name'=>array(
				'type'=> 'VARCHAR(24)'
			),
			'id_department'=>array(
				'type'=>'INT(2)'
			)
		));
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('study_program');

//		Create table department
		$this->dbforge->drop_table('department', true);

		// Table structure for table 'table_name'
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
	}
}
