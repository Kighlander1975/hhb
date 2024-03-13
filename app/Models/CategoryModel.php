<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'category';
    protected $primaryKey       = 'cat_id';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = '\App\Entities\Category';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'cat_id',
        'cat_text',
        'confirmed',
        'user_id',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'cat_id' => 'regex_match[/[0-9]{2}[0]{2}/]|is_unique[category.cat_id]',
        'cat_text' => 'required|is_unique[category.cat_text]',
    ];
    protected $validationMessages   = [
        'cat_id' => 'Fehlerhaftes ID-Format',
        'cat_text' => [
            'is_unique' => 'Diese Kategorie existiert bereits.'
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Method

    public function getCategories($all = false)
    {
        if($all === false) {
            $this->where('confirmed',true);
        }
        $this->orderBy('cat_id','asc');
        return $this->findAll();
    }

    public function getFullCats()
    {
        $this->where('confirmed',true);
        $this->orderBy('cat_id','asc');
        return $this->paginate(15);
    }

    public function getUnconfirmedCategories()
    {
        $this->where('confirmed', false);
        return $this->findAll();
    }

    public function findCategoryByCatID($cat_id)
    {
        $this->where('cat_id',$cat_id);
        return $this->first();
    }

    public function getCategoriesByUserId($user_id) 
    {
        $this->where('user_id', $user_id);
        return $this->findAll();
    }
}
