<?php

namespace App\Repositories;

interface UserRepository
{
    public function all();

    public function findByEmailAndFacebookId(string $email, string $facebookId);

    public function create(array $data);
}