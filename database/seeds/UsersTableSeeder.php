<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // //获取faker实例
        // $faker = app(Faker\Generator::class);
        $users = factory(User::class)
                      ->times(3)
                      ->make();

        //让隐藏字段可见，并转化为数组
        $user_array = $users->makeVisible(['password'])->toArray();

        //插入数据库
        User::insert($user_array);

        //改变第一个数据
        $user = User::find(1);
        $user->uuid = '123';
        $user->save();
    }
}
