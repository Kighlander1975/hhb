<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableSubcategory extends Migration
{
    public function up()
    {
        $table = 'subcategory';
        $fields = [
            'id' => [
                'type'              => 'INT',
                'constraint'        => 7,
                'unsigned'          => true,
                'auto-increment'    => true,
            ],
            'user_id' => [
                'type'              => 'INT',
                'constraint'        => '11',
                'unsigned'          => true,
            ],
            'subcat' => [
                'type'              => 'VARCHAR',
                'constraint'        => 4,
            ],
            'subcat_text' => [
                'type'              => 'VARCHAR',
                'constraint'        => '75',
                'null'              => true,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id',true);
        $this->forge->addKey('subcat');
        $this->forge->addForeignKey('user_id','users', 'id', 'CASCADE', 'CASCADE', 'my_user_subcat');
        $this->forge->createTable($table);
    }

    public function down()
    {
        $this->forge->dropTable('subcategory');
    }
}
