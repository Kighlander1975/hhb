<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBuchungen extends Migration
{
    public function up()
    {
        $table = 'buchungen';
        $fields = [
            'id' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto-increment'    => true,
            ],
            'user_id' => [
                'type'              => 'INT',
                'constraint'        => '11',
                'unsigned'          => true,
            ],
            'e_a' => [
                'type'              => 'ENUM',
                'constraint'        => ['e','a'],
                'default'           => 'e',
            ],
            'cat' => [
                'type'              => 'VARCHAR',
                'constraint'        => 4,
                'null'              => true,
                'default'           => null,
            ],
            'subcat' => [
                'type'              => 'VARCHAR',
                'constraint'        => 4,
                'null'              => true,
                'default'           => null,
            ],
            'ammount' => [
                'type'              => 'FLOAT',
                'constraint'        => '15',
                'default'           => 0,
            ],
            'text' => [
                'type'              => 'VARCHAR',
                'constraint'        => '150',
                'null'              => true,
            ],
            'zeit' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id');
        $this->forge->addForeignKey('cat', 'category', 'cat_id');
        $this->forge->addForeignKey('subcat', 'subcategory', 'subcat');
        $this->forge->addForeignKey('user_id','users', 'id', 'CASCADE', 'CASCADE', 'my_user_buchungen');
        $this->forge->createTable($table);
    }

    public function down()
    {
        $table = 'buchungen';
        $this->forge->dropTable($table);
    }
}
