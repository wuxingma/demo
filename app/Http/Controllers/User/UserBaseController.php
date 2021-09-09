<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserBaseController extends Controller
{
    protected $guard = 'user';

    public $userInfo = [];

    public function __construct()
    {
        $this->authentication();
    }

    public function authentication()
    {
        $this->userInfo =  Auth::guard('user');
    }
}
