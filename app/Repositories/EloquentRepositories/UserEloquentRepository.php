<?php

namespace App\Repositories\EloquentRepositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\UserRepository;

class UserEloquentRepository implements UserRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findByEmailAndFacebookId(string $email, string $facebookId)
    {
        return $this->model->where('email', $email)->where('facebook_id', $facebookId)->first();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

}