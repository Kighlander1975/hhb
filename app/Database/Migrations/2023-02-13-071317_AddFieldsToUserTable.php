<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToUserTable extends Migration
{
    public function up()
    {
        $fields = [
            'firstname' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'null'              => true,
            ],
            'lastname' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'null'              => true,
            ],
            'street' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'null'              => true,
            ],
            'zipcode' => [
                'type'              => 'VARCHAR',
                'constraint'        => '10',
                'null'              => true,
            ],
            'city' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'null'              => true,
            ],
            'country' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'null'              => true,
            ],
            'biography' => [
                'type'              => 'TEXT',
                'null'              => true,
            ],
            'dateofbirth' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'gender' => [
                'type'              => 'ENUM',
                'constraint'        => ['n/a', 'div', 'male', 'female'],
                'default'           => 'n/a',
            ],
        ];

        $this->forge->addColumn('users',$fields);

    }

    public function down()
    {
        $fields = [
            'firstname', 'lastname', 'street', 'zipcode',
            'city', 'country', 'biography', 'dateofbirth', 'gender'
        ];

        $this->forge->dropColumn('users',$fields);
    }
}
