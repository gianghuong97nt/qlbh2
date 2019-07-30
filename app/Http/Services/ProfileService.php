<?php
namespace App\Http\Services;

use App\Model\User;
use Illuminate\Support\Facades\Auth;

class ProfileService {
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function upload($inputs, $name)
    {
        if (!is_null($inputs)) {
            $nameFile = str_slug($name) . '-' . rand();
            $inputs->move('uploads', $nameFile);

            return $nameFile;
        }
    }
    
    public function update($inputs) {
        $id = Auth::user()->id;
        $oldUser = $this->user->findOrFail($id);
        
        if (isset($inputs['avatar'])) {
            $user = $this->upload($inputs['avatar'], $inputs['name']);
        } else {
            $user = $oldUser->image;
        }
        $oldUser->name = $inputs['name'];
        $oldUser->email = $inputs['email'];
        $oldUser->birthday = $inputs['birthday'];
        $oldUser->address = $inputs['address'];
        $oldUser->phone_number = $inputs['phone_number'];
        $oldUser->gender = $inputs['gender'];
        $oldUser->avatar = $user;
        
        return $oldUser->save();
    }
}
