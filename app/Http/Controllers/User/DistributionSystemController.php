<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class DistributionSystemController extends Controller
{
    protected $userInfo = [];
    protected $level = 0;
    public function index(Request $request)
    {
        $id = $request->get('id', 1);
        $users = [];
        $userModel = new Users();
        $user = Users::find($id);
        $userInfo = [];
        if ($user) {
            $users  = $this->getUserInfo($id, $userModel);
            $userInfo[] = [
                'id' => $user->id,
                'name' => $user->name,
                'integral_amount' => $user->integral_amount,
                'parent_id' => $user->parent_id,
                'level' => 0,
                'next_user' => $users
            ];
        }
        $userInfo = json_encode($userInfo);

        return view('user.distribution_system.index', compact('userInfo'));
    }

    public function getUserInfo($id, $userModel, $level = 0)
    {
        $arr = [];
        $users = $userModel::select('id','name','integral_amount', 'parent_id')->where('parent_id', $id)->get()->toArray();
        if ($users) {
            $level = $level + 1;
            foreach ($users as $key => &$value) {
                $value['next_user'] = $this->getUserInfo($value['id'], $userModel, $level);
                $value['level'] = $level;
            }
        }

        return $users;

    }
}
