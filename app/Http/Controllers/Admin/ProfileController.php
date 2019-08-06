<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Services\ProfileService;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected $user;
    
    public function __construct(ProfileService $profileService)
    {
        $this->user = $profileService;
    }

    public function index() {
        return view('admin.profile.index');
    }

    public function update(ProfileRequest $profileRequest)
    {
        $this->user->update($profileRequest->all());

        return redirect('admin/profile');
    }

    public function password() {
        return view('admin.profile.password');
    }

    public function updatePassword(ChangePasswordRequest $changePasswordRequest) {
        $current_password = $this->user->getPassword();

        if (Hash::check($changePasswordRequest->input('current'), $current_password)) {
            $inputs = $changePasswordRequest->input();
            $this->user->savePassword($inputs);
            $result = trans('admin.password.success');

            return redirect()->back()->with('success', $result);
        }else{
            $result = trans('admin.password.fail');

            return redirect()->back()->with('error', $result);
        }
    }
}
