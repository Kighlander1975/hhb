<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddConfirmedToCategory extends Migration
{
    public function up()
    {
        $this->forge->addColumn('category', [
            'confirmed' => [
                'type'          => 'BOOLEAN',
                'null'          => false,
                'default'       => false,
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('category', 'confirmed');
    }
}
