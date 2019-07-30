<?php
namespace App\Http\Services;

use App\Model\User;

class UserService {
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getALlUser(){
        return $this->user->all();
    }

    public function store($input) {
        return $this->user->create($input);
    }
    
    public function destroy($id) {
        return $this->user->where('id',$id)->delete();
    }
}
