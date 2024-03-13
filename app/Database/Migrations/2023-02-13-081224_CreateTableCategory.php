<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableCategory extends Migration
{
    public function up()
    {
        $table = 'category';
        $fields = [
            'cat_id' => [
                'type'              => 'VARCHAR',
                'constraint'        => 4,
                'unique'            => true,
            ],
            'cat_text' => [
                'type'              => 'VARCHAR',
                'constraint'        => '75',
                'null'              => true,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->createTable($table);
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}
