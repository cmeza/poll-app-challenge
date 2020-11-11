<?php

namespace Database\Seeders;

use App\Models\Poll;
use App\Models\PollQuestion;
use App\Models\PollType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PollsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // poll types
        $pollTypeValues = [
            [
                'type' => 'single choice',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'type' => 'multi choice',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'type' => 'write-in',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];

        DB::transaction(function () use ($pollTypeValues) {
            DB::table('poll_types')->insert($pollTypeValues);
        });

        $pollTypeSingle = PollType::firstWhere('type', 'single choice')->id;

        // poll main
        $pollValues = [
            [
                'title' => 'What is your favorite NBA Team?',
                'poll_type_id' => $pollTypeSingle,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'What is your favorite NFL Team?',
                'poll_type_id' => $pollTypeSingle,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'What is your favorite MLB Team?',
                'poll_type_id' => $pollTypeSingle,
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];

        DB::transaction(function () use ($pollValues) {
            DB::table('polls')->insert($pollValues);
        });

        // poll questions
        $pollIdNBA = Poll::firstWhere('title', 'like', '%NBA%')->id;
        $pollIdNFL = Poll::firstWhere('title', 'like', '%NFL%')->id;
        $pollIdMLB = Poll::firstWhere('title', 'like', '%MLB%')->id;

        $pollQuestionsNBA = [
            [
                'poll_id' => $pollIdNBA,
                'question' => '76ers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Bucks',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Bulls',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Cavaliers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Celtics',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Clippers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Grizzlies',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Hawks',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Heat',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Hornets',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Jazz',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Kings',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Knicks',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Lakers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Magic',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Mavericks',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Nets',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Nuggets',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Pacers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Pelicans',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Pistons',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Raptors',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Rockets',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Spurs',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Suns',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Thunder',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Timberwolves',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Trail Blazers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Warriors',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNBA,
                'question' => 'Wizards',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
        ];

        $pollQuestionsNFL = [
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Cardinals',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Falcons',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Ravens',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Bills',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Panthers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Bears',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Bengals',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Browns',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Cowboys',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Broncos',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Lions',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Packers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Texans',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Colts',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Jaguars',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Chiefs',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Chargers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Rams',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Dolphins',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Vikings',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Patriots',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Saints',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Giants',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Jets',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Raiders',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Eagles',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Steelers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => '49ers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Seahawks',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Buccaneers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Titans',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdNFL,
                'question' => 'Redskins',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
        ];

        $pollQuestionsMLB = [
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Diamondbacks',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Braves',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Orioles',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Red Sox',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'White Sox',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Cubs',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Reds',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Indians',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Rockies',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Tigers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Astros',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Royals',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Angels',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Dodgers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Marlins',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Brewers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Twins',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Yankees',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Mets',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Athletics',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Phillies',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Pirates',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Padres',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Giants',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Mariners',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Cardinals',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Rays',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Rangers',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Blue Jays',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
            [
                'poll_id' => $pollIdMLB,
                'question' => 'Nationals',
                'created_at' => date('Y-m-d H:i:s'),
                'is_int' => true
            ],
        ];

        $pollQuestionsValues = array_merge(
            $pollQuestionsNBA,
            $pollQuestionsNFL,
            $pollQuestionsMLB
        );

        DB::transaction(function () use ($pollQuestionsValues) {
            DB::table('poll_questions')->insert($pollQuestionsValues);
        });

        $questionHoustonNBA = PollQuestion::firstWhere('question', '=','Rockets')->id;
        $questionHoustonNFL = PollQuestion::firstWhere('question', '=','Texans')->id;
        $questionHoustonMLB = PollQuestion::firstWhere('question', '=','Astros')->id;

        $resultsValues = [
            [
                'poll_id' => $pollIdNBA,
                'poll_question_id' => $questionHoustonNBA,
                'value' => rand(1,99),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'poll_id' => $pollIdNFL,
                'poll_question_id' => $questionHoustonNFL,
                'value' => rand(1,99),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'poll_id' => $pollIdMLB,
                'poll_question_id' => $questionHoustonMLB,
                'value' => 73,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        DB::transaction(function () use ($resultsValues) {
            DB::table('poll_results')->insert($resultsValues);
        });
    }
}
