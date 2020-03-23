<?php


namespace App\Http\Service;


use App\Contract\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function all($paginate=null)
    {
        return $this->userRepo->all($paginate);
    }

    public function create($request)
    {
        $user = $this->userRepo->model();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $this->userRepo->store($user);
    }

    public function getById($id)
    {
        return $this->userRepo->getById($id);
    }

    public function edit($request, $id)
    {
        $user = $this->userRepo->model();
        $user->fill($request->input());
        $this->userRepo->update($user);
    }

    public function delete($id)
    {
        $user = $this->userRepo->getById($id);
        $this->userRepo->delete($user);
    }
}
