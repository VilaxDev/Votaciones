<?php

namespace App\Imports;

use App\Models\User;

use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    public function model(array $row)
    {
        return new User([
            'id' => $row[0],
            'rol' => $row[1],
            'dni' => $row[2],
            'code' => $row[3],
        ]);
    }
}
