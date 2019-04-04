<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Table_Lecturer extends CI_Migration
{
    public function up()
    {
        // this up() migration is auto-generated, please modify it to your needs
        // Drop table 'table_name' if it exists
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
    }

    public function down()
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->dbforge->drop_table('lecturer', true);
    }
}
