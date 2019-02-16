<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 15/02/19
 * Time: 11:15
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_student extends CI_Migration
{
	protected $table = 'student';

	public function up()
	{
		$this->dbforge->drop_table($this->table, true);

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
			)
		);
		$this->dbforge->add_field($field);
		$this->dbforge->add_key('nim',TRUE);
		$this->dbforge->create_table($this->table,TRUE);

	}

	public function down()
	{
		if ($this->db->table_exists($this->table))
		{
			$this->dbforge->drop_table($this->table);
		}
	}

}

/* End of file .php */
