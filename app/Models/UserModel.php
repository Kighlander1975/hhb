<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    protected function initialize(): void
    {
        $this->table = 'users';
        $this->allowedFields = [
            ...$this->allowedFields,
            'firstname',
            'lastname',
            'street',
            'zipcode',
            'city',
            'country',
            'biography',
            'dateofbirth',
            'gender'

            // 'first_name',
        ];
    }
}
