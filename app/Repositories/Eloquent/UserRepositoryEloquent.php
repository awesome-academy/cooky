<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepositoryEloquent;
use App\Constracts\Eloquent\UserRepository;

use App\User;

class UserRepositoryEloquent extends BaseRepositoryEloquent implements UserRepository
{
    public $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getFeatureMember($with = [], $select = ['*'])
    {
        $user = $this->model
        ->with($with)
        ->where('permission', config('manual.permission.user'))
        ->orderBy('id', 'DESC')
        ->firstOrFail();
        
        return $user;
    }
}
