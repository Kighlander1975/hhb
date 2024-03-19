<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    //--------------------------------------------------------------------
    // Rules For Registration
    //--------------------------------------------------------------------
    public $registration = [
        'username' => [
            'label' =>  'Auth.username',
            'rules' => 'required|max_length[30]|min_length[3]|regex_match[/\A[a-zA-Z0-9\.]+\z/]|is_unique[users.username]',
            'errors' => [
                'is_unique' => 'Dieser Benutzername ist bereits registriert.'
            ],
        ],
        'email' => [
            'label' =>  'Auth.email',
            'rules' => 'required|max_length[254]|valid_email|is_unique[auth_identities.secret]',
            'errors' => [
                'is_unique' => 'Diese Email-Adresse ist bereits registriert.'
            ],
        ],
        'password' => [
            'label' => 'Auth.password',
            'rules' => 'required|strong_password',
        ],
        'password_confirm' => [
            'label' => 'Auth.passwordConfirm',
            'rules' => 'required|matches[password]',
        ],
        'firstname' => [
            'label' => 'firstname',
            'rules' => 'permit_empty|max_length[30]',
        ],
        'lastname' => [
            'label' => 'lastname',
            'rules' => 'permit_empty|max_length[30]',
        ],
        'street' => [
            'label' => 'street',
            'rules' => 'permit_empty|max_length[60]',
        ],
        'zipcode' => [
            'label' => 'zipcode',
            'rules' => 'permit_empty|max_length[5]',
        ],
        'city' => [
            'label' => 'city',
            'rules' => 'permit_empty|max_length[50]',
        ],
        'country' => [
            'label' => 'country',
            'rules' => 'permit_empty|max_length[50]',
        ],
        'dateofbirth' => [
            'label' => 'dateofbirth',
            'rules' => 'permit_empty|max_length[10]',
        ],
        'gender' => [
            'label' => 'gender',
            'rules' => 'permit_empty|max_length[6]',
        ],
        'biography' => [
            'label' => 'biography',
            'rules' => 'permit_empty|max_length[5000]',
        ],
    ];
}
