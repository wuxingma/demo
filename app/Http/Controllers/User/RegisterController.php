<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\RegisterRequest;
use App\Services\RegisterServices;


class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $post = $request->except(['token']);
        $register = new RegisterServices();
        $res = $register->register($post);

        return $res ? redirect(route("user.home")) : redirect()->back();
    }

}
