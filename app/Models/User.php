<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    private $data = [
        [
            "user_id" => 1,
            "email" => "alex@mail.com",
            "age" => 67,
            "name" => "Alex Norton"
        ],
        [
            "user_id" => 2,
            "email" => "mary@gmail.com",
            "age" => 18,
            "name" => "Marry Shawn"
        ],
        [
            "user_id" => 3,
            "email" => "dan@ya.ru",
            "age" => 34,
            "name" => "Dan Hoff"
        ],

    ];


    public function getUsers(): array
    {
        return $this->data;
    }

    public function findUser(string $email):? array
    {
        $result = null;

        foreach ($this->data as $data) {
            if ($data['email'] === $email)
                $result = $data;
        }

        return $result;
    }

    public function getAdminUser(): array
    {
        return [
            "user_id" => 4,
            "email" => "admin@admin.ru",
            "age" => 45,
            "name" => "Super User"
        ];
    }
}
