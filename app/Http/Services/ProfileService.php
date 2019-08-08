<?php
namespace App\Http\Services;

use App\Model\User;

class ProfileService {
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function upload($inputs)
    {
        if (!is_null($inputs)) {
            $nameFile =time() . '_' . $inputs->getClientOriginalName();
            $inputs->storeAs('public/avatars',$nameFile);
            
            return $nameFile;
        }
    }
    
    public function update($inputs) {
        $id = auth()->id();
        if (isset($inputs['avatar'])) {
            $image = $this->upload($inputs['avatar']);
            $inputs['avatar'] = $image;
        }

        return $this->user->where('id', $id)->firstOrFail()->update($inputs);
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
