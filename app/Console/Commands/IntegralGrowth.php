<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Users;
use App\Models\IntegralConfig;
use App\Models\IntegralAmountRecoed;
use Illuminate\Support\Facades\Log;

class IntegralGrowth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Integral_growth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Integral growth';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $minDay = date("Y-m-d",mktime(0, 0 , 0,date("m"),date("d")-date("w")+1-7,date("Y")));
        $maxDay = date("Y-m-d",mktime(23,59,59,date("m"),date("d")-date("w")+7-7,date("Y")));
        $data = IntegralAmountRecoed::select('user_id')->selectRaw('SUM(integral_amount) as amount')->where('date', ">=", $minDay)->where('date', '<=', $maxDay)->groupBy('user_id')->orderBy('amount', 'desc')->limit(10)->get()->toArray();
        $list = [];
        foreach ($data as $key => $value) {
            $user = Users::find($value['user_id']);
            $list[] = [
                'amount' => $value['amount'],
                'user_name' => $user->name
            ];
        }
        Log::debug('上周前十积分排名_'.date('Y-m-d')."\n".json_encode($list));
    }
}
