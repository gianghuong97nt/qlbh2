<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Services\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

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

    public function reset(Request $request) {
        $data = [];
        $title = 'Test';
        $email =    $request->email;
        $data['reset_password_token']  = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            ceil(10/strlen($x)) )),1,10);
        $this->user->resetPasswordToken($email, $data['reset_password_token'] );
        if($email) {
            Mail ::send('auth.passwords.subject_mail', $data, function ($message) use ($title, $email) {
                $message->to($email)
                    ->subject($title);
            });
        }

        return redirect()->back();
    }
    
    public function resetPassword() {
        return view('auth.passwords.reset');
    }
    
    public function passwordUpdate(Request $request) {
        $inputs = $request->all();
        $this->user->passwordUpdate($inputs);
        
        return redirect('login');
    }
}
