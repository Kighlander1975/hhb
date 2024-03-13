<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToCategory extends Migration
{
    public function up()
    {
        $this->forge->addColumn('category', [
            'user_id' => [
                'type'          => 'INT',
                'constraint'    => 5,
                'unsigned'      => true,
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('category', 'user_id');
    }
}
