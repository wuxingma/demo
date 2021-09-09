<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IntegralConfig;
use App\Http\Requests\User\IntegralConfigRequest;

class IntegralConfigController extends Controller
{
    public function index()
    {
        $integralConfig = IntegralConfig::get();
        return view('user.integral_config.index', compact('integralConfig'));
    }

    public function edit($id)
    {
        $integralConfig = IntegralConfig::findOrFail($id);

        return view('user.integral_config.edit', compact('integralConfig'));
    }

    public function update(IntegralConfigRequest $request)
    {
        $post = $request->all();
        $integralConfig = IntegralConfig::findOrFail($post['id']);
        $integralConfig->level = $post['level'];
        $integralConfig->amount = $post['amount'];
        $integralConfig->save();

        return redirect(route('user.integral_config.index'));
    }
}
