<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Table_Account extends CI_Migration
{
    public function up()
    {
        // this up() migration is auto-generated, please modify it to your needs
        // Drop table 'table_name' if it exists
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
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => false,
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('account');
    }

    public function down()
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->dbforge->drop_table('account', true);
    }
}
