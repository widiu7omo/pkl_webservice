<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Move_to_new_database extends CI_Migration
{
	public function up()
	{
		if ($this->db->database == 'apiprakerin' || $this->db->database == 'dioinsta_apiprakerin') {
//			//alter table negara, change pk to auto_increment
//			$this->db->query('set foreign_key_checks = 0');
//			$newFields = array('id_negara' => array(
//				'name'=>'id_negara',
//				'type' => 'INT(10)',
//				'auto_increment' => true
//			));
//			$this->dbforge->modify_column('tb_negara',$newFields);
//			//alter table provinsi, change pk to auto_increment
//			$newFields = array('id_provinsi' => array(
//				'name'=>'id_provinsi',
//				'type' => 'INT(10)',
//				'auto_increment' => true
//			));
//			$this->dbforge->modify_column('tb_provinsi',$newFields);
//			//alter tabel kota, change to pk auto_increment
//			$newFields = array('id_kab_kota' => array(
//				'name'=>'id_kab_kota',
//				'type'=>'INT(10)',
//				'auto_increment' =>true
//			));
//			$this->dbforge->modify_column('tb_kabupaten_kota',$newFields);
//			$newFields = array('id_kecamatan' =>array(
//				'name'=>'id_kecamatan',
//				'type'=>'INT(20)',
//				'auto_increment' =>true
//			));
//			$this->dbforge->modify_column('tb_kecamatan',$newFields);//Create table rest keys
			$this->config->load('rest');
			$table = config_item('rest_keys_table');
			$this->dbforge->drop_table($table, true);

			$fields = array(
				'id' => array(
					'type' => 'INT(11)',
					'auto_increment' => true,
					'unsigned' => true,
				),
				'user_id' => array(
					'type' => 'INT(11)',
					'unsigned' => true,
				),
				config_item('rest_key_column') => array(
					'type' => 'VARCHAR(' . config_item('rest_key_length') . ')',
					'unique' => true,
				),
				'level' => array(
					'type' => 'INT(2)',
				),
				'ignore_limits' => array(
					'type' => 'TINYINT(1)',
					'default' => 0,
				),
				'is_private_key' => array(
					'type' => 'TINYINT(1)',
					'default' => 0,
				),
				'ip_addresses' => array(
					'type' => 'TEXT',
					'null' => true,
				),
				'date_created' => array(
					'type' => 'INT(11)',
				),
			);
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key('id', true);
			$this->dbforge->create_table($table);
//		$this->db->query(add_foreign_key($table, 'user_id', 'users(id)', 'CASCADE', 'CASCADE'));

//		Create table rest logs
			$this->config->load('rest');
			$table = config_item('rest_logs_table');
			$this->dbforge->drop_table($table, true);

			$fields = array(
				'id' => array(
					'type' => 'INT(11)',
					'auto_increment' => true,
					'unsigned' => true,
				),
				'api_key' => array(
					'type' => 'VARCHAR(' . config_item('rest_key_length') . ')',
				),
				'uri' => array(
					'type' => 'VARCHAR(255)',
				),
				'method' => array(
					'type' => 'ENUM("get","post","options","put","patch","delete")',
				),
				'params' => array(
					'type' => 'TEXT',
					'null' => true,
				),
				'ip_address' => array(
					'type' => 'VARCHAR(45)',
				),
				'time' => array(
					'type' => 'INT(11)',
				),
				'rtime' => array(
					'type' => 'FLOAT',
					'null' => true,
				),
				'authorized' => array(
					'type' => 'VARCHAR(1)',
				),
				'response_code' => array(
					'type' => 'SMALLINT(3)',
					'null' => true,
					'default' => 0,
				),
			);
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key('id', true);
			$this->dbforge->create_table($table);
//		$this->db->query(add_foreign_key($table, 'api_key',
//			config_item('rest_keys_table') . '(' . config_item('rest_key_column') . ')', 'CASCADE', 'CASCADE'));

//  create table rest access

			$this->config->load('rest');
			$table = config_item('rest_access_table');
			$this->dbforge->drop_table($table, true);
			$fields = array(
				'id' => array(
					'type' => 'INT(11)',
					'auto_increment' => true,
					'unsigned' => true,
				),
				'key' => array(
					'type' => 'VARCHAR(' . config_item('rest_key_length') . ')',
				),
				'all_access' => array(
					'type' => 'TINYINT(1)',
					'default' => 0,
				),
				'controller' => array(
					'type' => 'VARCHAR(50)',
				),
				'date_created' => array(
					'type' => 'DATETIME',
					'null' => true,
				),
				'date_modified' => array(
					'type' => 'TIMESTAMP',
				),
			);
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key('id', true);
			$this->dbforge->add_key('controller');
			$this->dbforge->create_table($table);
//		$this->db->query(add_foreign_key($table, 'key',
//			config_item('rest_keys_table') . '(' . config_item('rest_key_column') . ')', 'CASCADE', 'CASCADE'));
		} else {
			show_error('ganti nama database, sesuaikan di config');
		}
	}


	public function down()
	{

	}
}
