<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_Table_Class extends CI_Migration
{
    public function up()
    {
        // this up() migration is auto-generated, please modify it to your needs
        // Drop table 'table_name' if it exists
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
    }

    public function down()
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->dbforge->drop_table('class', true);
    }
}
