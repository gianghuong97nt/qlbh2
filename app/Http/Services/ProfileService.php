<?php
namespace App\Http\Services;

use App\Model\User;

class ProfileService {
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function upload($inputs, $name)
    {
        if (!is_null($inputs)) {
            $nameFile =time() . '_' . $inputs->getClientOriginalName();

            $inputs->storeAs('public/avatars',$nameFile);
            return $nameFile;
        }
    }
    
    public function update($inputs) {
        $id = auth()->id();
        $oldUser = $this->user->findOrFail($id);
        
        if (isset($inputs['avatar'])) {
            $avatar = $this->upload($inputs['avatar'], $inputs['name']);
        } else {
            $avatar = $inputs['image_old'];
        }
        $oldUser->name = $inputs['name'];
        $oldUser->email = $inputs['email'];
        $oldUser->birthday = $inputs['birthday'];
        $oldUser->address = $inputs['address'];
        $oldUser->phone_number = $inputs['phone_number'];
        $oldUser->gender = $inputs['gender'];
        $oldUser->avatar = $avatar;
        
        return $oldUser->save();
    }
    
    public function getPassword() {
        $id = auth()->id();
        $user = $this->user->where('id', $id)->first();
        
        return $user->password;
    }
    
    public function savePassword($inputs) {
        $id = auth()->id();
        $user = $this->user->findOrFail($id);
        $user->password = $inputs['new'];
        
        return $user->save();
    }
}
