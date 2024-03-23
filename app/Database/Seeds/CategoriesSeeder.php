<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'cat_id'    => '0100',
                'cat_text'  => 'Gehalt',
                'confirmed' => 1,
                'user_id'   => null
            ],
            [
                'cat_id'    => '0200',
                'cat_text'  => 'Lohn',
                'confirmed' => 1,
                'user_id'   => null
            ],
            [
                'cat_id'    => '0300',
                'cat_text'  => 'Unterhalt',
                'confirmed' => 1,
                'user_id'   => null
            ],
            [
                'cat_id'    => '4900',
                'cat_text'  => 'Sonstige Einnahmen',
                'confirmed' => 1,
                'user_id'   => null
            ],
            [
                'cat_id'    => '5000',
                'cat_text'  => 'Miete',
                'confirmed' => 1,
                'user_id'   => null
            ],
            [
                'cat_id'    => '5100',
                'cat_text'  => 'Energieversorger',
                'confirmed' => 1,
                'user_id'   => null
            ],
            [
                'cat_id'    => '5200',
                'cat_text'  => 'Kommunikation',
                'confirmed' => 1,
                'user_id'   => null
            ],
            [
                'cat_id'    => '5300',
                'cat_text'  => 'Versicherungen',
                'confirmed' => 1,
                'user_id'   => null
            ],
        ];
        $this->db->table('category')->insertBatch($data);
    }
}
