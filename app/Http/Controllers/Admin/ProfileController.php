<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Services\ProfileService;

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
}
