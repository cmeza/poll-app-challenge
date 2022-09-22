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
        $pollQuestions = [];
        $pollIdNBA = Poll::firstWhere('title', 'like', '%NBA%')->id;
        $pollIdNFL = Poll::firstWhere('title', 'like', '%NFL%')->id;
        $pollIdMLB = Poll::firstWhere('title', 'like', '%MLB%')->id;

        $data = [
            'MLB' => [
                'Angels',
                'Astros',
                'Athletics',
                'Blue Jays',
                'Braves',
                'Brewers',
                'Cardinals',
                'Cubs',
                'Diamondbacks',
                'Dodgers',
                'Giants',
                'Indians',
                'Marlins',
                'Mets',
                'Nationals',
                'Orioles',
                'Padres',
                'Phillies',
                'Pirates',
                'Rangers',
                'Rays',
                'Reds',
                'Red Sox',
                'Rockies',
                'Royals',
                'Tigers',
                'Twins',
                'White Sox',
            ],
            'NFL' => [
                '49ers',
                'Bears',
                'Bengals',
                'Bills',
                'Broncos',
                'Browns',
                'Buccaneers',
                'Cardinals',
                'Colts',
                'Cowboys',
                'Chiefs',
                'Chargers',
                'Dolphins',
                'Eagles',
                'Falcons',
                'Giants',
                'Jaguars',
                'Jets',
                'Lions',
                'Packers',
                'Panthers',
                'Patriots',
                'Raiders',
                'Rams',
                'Ravens',
                'Redskins',
                'Saints',
                'Seahawks',
                'Steelers',
                'Texans',
                'Titans',
                'Vikings',
            ],
            'NBA' => [
                '76ers',
                'Bucks',
                'Bulls',
                'Cavaliers',
                'Celtics',
                'Clippers',
                'Grizzlies',
                'Hawks',
                'Heat',
                'Heat',
                'Hornets',
                'Jazz',
                'Kings',
                'Knicks',
                'Lakers',
                'Magic',
                'Mavericks',
                'Nets',
                'Nuggets',
                'Pacers',
                'Pelicans',
                'Pistons',
                'Raptors',
                'Rockets',
                'Spurs',
                'Suns',
                'Thunder',
                'Timberwolves',
                'Trail Blazers',
                'Warriors',
                'Wizards',
            ],
        ];
        
        foreach ($data as $league => $teams) {
            switch ($league) {
                case 'MLB': 
                    $pollId = $pollIdMLB;
                    break;
                
                case 'NFL': 
                    $pollId = $pollIdNFL;
                    break;
                
                case 'NBA': 
                    $pollId = $pollIdNBA;
                    break;
                
            }
            
            foreach ($teams as $team) {
                $pollQuestions[] = [
                    'poll_id' => $pollId,
                    'question' => $team,
                    'created_at' => date('Y-m-d H:i:s'),
                    'in_int' => true,
                ];
            }
        }

        DB::transaction(function () use ($pollQuestions) {
            DB::table('poll_questions')->insert($pollQuestions);
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
                'value' => rand(1,99),
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        DB::transaction(function () use ($resultsValues) {
            DB::table('poll_results')->insert($resultsValues);
        });
    }
}
