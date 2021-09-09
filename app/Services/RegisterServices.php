<?php

namespace App\Services;

use DB;
use App\Models\Users;
use App\Models\IntegralConfig;
use App\Models\IntegralAmountRecoed;

class RegisterServices
{
    private static $instance = null;

    public static function instance()
    {
        if (self::$instance !== null) {
            return self::$instance;
        }
        $instance = new self();
        self::$instance = $instance;
        return $instance;
    }

    public function __construct()
    {
    }

    public function register($data)
    {

        DB::beginTransaction();
        try {
            $config = IntegralConfig::get()->toArray();
            $configArr = [];
            foreach ($config as $key => $value) {
                $configArr[$value['level']] = $value['amount'];
            }
            // 上级
            $parentUserInfo = Users::find($data['parent_id']);
            if (!empty($parentUserInfo)) {
                Users::where('id', $data['parent_id'])->update(['integral_amount' => ($parentUserInfo->integral_amount + ($configArr[1] ?? 0))]);
                IntegralAmountRecoed::create([
                    'user_id' => $data['parent_id'],
                    'integral_amount' => $configArr[1] ?? 0,
                    'date' => date('Y-m-d')
                ]);
                $perParentUserInfo = Users::find($parentUserInfo->parent_id);
                // 上上级
                if (!empty($perParentUserInfo)) {
                    Users::where('id', $parentUserInfo->parent_id)->update(['integral_amount' => ($perParentUserInfo->integral_amount + ($configArr[2] ?? 0))]);
                    IntegralAmountRecoed::create([
                        'user_id' => $parentUserInfo->parent_id,
                        'integral_amount' => $configArr[2] ?? 0,
                        'date' => date('Y-m-d')
                    ]);
                }

                Users::create($data);
            } else {
                $data['parent_id'] = 0;
                Users::create($data);
            }
            DB::commit();
            $status = 1;
        } catch (\Exception $e) {
            DB::rollback();
            $status = 0;
        }

        return $status;

    }


}
