<?php


namespace App\Http\Repository;


use App\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function model()
    {
        return $this->user;
    }

    public function all($paginate=null)
    {
        if ($paginate) {
            return $this->user->paginate($paginate);
        }
        return $this->user->all();
    }

    public function getById($id)
    {
        return $this->user->findOrFail($id);
    }

    public function delete($user)
    {
        $user->delete();
    }

    public function update($user)
    {
        $user->save();
    }

    public function store($user)
    {
        return $user->save();
    }
}
