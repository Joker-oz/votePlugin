<?php

use Illuminate\Database\Seeder;
use App\Models\Vote;
use App\Models\Candidate;

class CandidateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num = 1;
        //获取所有投票的编号
        $vote_ids = Vote::all()->pluck('id')->toArray();

        // 头像假数据
        $avatars = [
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200',
            'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png?imageView2/1/w/200/h/200',
        ];

        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        $candidates = factory(Candidate::class)
                        ->times(100)
                        ->make()
                        ->each(function ($candidate, $index) use ($vote_ids, $avatars,$faker) {
                            // 从用户 ID 数组中随机取出一个并赋值
                            $candidate->v_id = $faker->randomElement($vote_ids);
                            // 从头像数组中随机取出一个并赋值
                            $candidate->c_img = $faker->randomElement($avatars);
                        });
        foreach ($candidates as $key => $value) {
            $value->c_id = $num++;
        }
        // 让隐藏字段可见，并将数据集合转换为数组
        $candidate_array = $candidates->makeVisible(['v_id'])->toArray();


        Candidate::insert($candidate_array);
    }
}
