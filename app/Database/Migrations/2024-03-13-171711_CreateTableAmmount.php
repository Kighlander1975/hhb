<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableAmmount extends Migration
{
    public function up()
    {
        $table = 'ammount';
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
            'ammount' => [
                'type'              => 'FLOAT',
                'constraint'        => '15',
                'null'              => true,
                'default'           => 0,
            ],
            'zeit' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id');
        $this->forge->addForeignKey('user_id','users', 'id', 'CASCADE', 'CASCADE', 'my_user_ammount');
        $this->forge->createTable($table);
    }

    public function down()
    {
        $table = 'ammount';
        $this->forge->dropTable($table);
    }
}
