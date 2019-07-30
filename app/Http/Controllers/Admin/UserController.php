<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index() {
        $users = $this->userService->getALlUser();
        
        return view('admin.user.index', compact('users'));
    }

    public function create() {
        return view('admin.user.submit');
    }

    public function store(UserRequest $userRequest) {
        $this->userService->store($userRequest->input());

        return redirect('admin/user');
    }

    public function destroy($id) {
        $this->userService->destroy($id);
        
        return redirect('admin/user');
    }
}
