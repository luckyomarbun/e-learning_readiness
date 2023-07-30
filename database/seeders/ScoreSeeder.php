<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // DB::table('scores')->truncate();
        // Schema::enableForeignKeyConstraints();
    }

    public function initialSeed(){
        $data = [
            [
                'student_id_number' => 107726957,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [86, 92, 78, 95, 88]
            ],
            [
                'student_id_number' => 118279081,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [90, 85, 91, 87, 89]
            ],
            [
                'student_id_number' => 122621314,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [77, 82, 80, 75, 79]
            ],
            [
                'student_id_number' => 152753641,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [94, 88, 92, 89, 93]
            ],
            [
                'student_id_number' => 166563069,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [81, 84, 77, 83, 80]
            ],
            [
                'student_id_number' => 191559731,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [68, 73, 69, 75, 72]
            ],
            [
                'student_id_number' => 205004729,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [87, 91, 84, 89, 86]
            ],
            [
                'student_id_number' => 225776870,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [63, 68, 65, 70, 67]
            ],
            [
                'student_id_number' => 231208614,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [79, 82, 77, 84, 80]
            ],
            [
                'student_id_number' => 270116860,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [91, 96, 93, 97, 92]
            ],
            [
                'student_id_number' => 291122595,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [72, 78, 75, 80, 76]
            ],
            [
                'student_id_number' => 303290512,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [88, 85, 90, 86, 89]
            ],
            [
                'student_id_number' => 314421644,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [76, 73, 79, 75, 78]
            ],
            [
                'student_id_number' => 333517634,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [83, 89, 85, 90, 87]
            ],
            [
                'student_id_number' => 351064729,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [70, 75, 71, 77, 73]
            ],
            [
                'student_id_number' => 376946652,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [94, 99, 96, 92, 97]
            ],
            [
                'student_id_number' => 388938081,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [67, 72, 68, 74, 70]
            ],
            [
                'student_id_number' => 401700715,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [82, 79, 85, 81, 84]
            ],
            [
                'student_id_number' => 417054211,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [78, 82, 76, 83, 79]
            ],
            [
                'student_id_number' => 436220685,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [90, 95, 91, 96, 92]
            ],
            [
                'student_id_number' => 448833569,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [71, 77, 73, 78, 74]
            ],
            [
                'student_id_number' => 454942665,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [86, 89, 84, 90, 87]
            ],
            [
                'student_id_number' => 461343465,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [63, 68, 65, 70, 67]
            ],
            [
                'student_id_number' => 511927218,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [80, 83, 78, 84, 81]
            ],
            [
                'student_id_number' => 545005944,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [75, 72, 78, 74, 77]
            ],
            [
                'student_id_number' => 576659010,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [92, 97, 94, 90, 95]
            ],
            [
                'student_id_number' => 577548608,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [69, 75, 71, 76, 73]
            ],
            [
                'student_id_number' => 579032051,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [84, 88, 82, 89, 86]
            ],
            [
                'student_id_number' => 630897849,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [77, 82, 79, 83, 78]
            ],
            [
                'student_id_number' => 653083416,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [91, 96, 92, 97, 93]
            ],
            [
                'student_id_number' => 681697932,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [66, 71, 67, 72, 68]
            ],
            [
                'student_id_number' => 699943095,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [82, 87, 83, 88, 84]
            ],
            [
                'student_id_number' => 705334002,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [74, 79, 75, 80, 76]
            ],
            [
                'student_id_number' => 717986995,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [88, 92, 89, 93, 90]
            ],
            [
                'student_id_number' => 725388588,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [70, 75, 71, 76, 72]
            ],
            [
                'student_id_number' => 734805849,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [97, 93, 98, 94, 99]
            ],
            [
                'student_id_number' => 745178853,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [68, 72, 69, 73, 70]
            ],
            [
                'student_id_number' => 781938900,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [87, 91, 88, 92, 89]
            ],
            [
                'student_id_number' => 788533716,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [73, 77, 74, 78, 75]
            ],
            [
                'student_id_number' => 880159822,
                'section_id' => [1, 2, 3, 4, 5],
                'score' => [85, 89, 86, 90, 87]
            ]
        ];

        foreach ($data as $item) {
            $final_score = 0;
            for ($i = 0; $i < count($item['section_id']); $i++) {
                $sectionScore = number_format((($item['score'][$i]/100)*5),1);
                $score = [
                    'student_id_number' => $item['student_id_number'],
                    'section_id' => $item['section_id'][$i],
                    'score' =>  $sectionScore,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
                $final_score+=$sectionScore;
                DB::table('scores')->insert($score);
            }

            DB::table('users')
            ->where('student_id_number',$item['student_id_number'])
            ->update(['survey_clicked'=>1,'survey_completed'=>1,'survey_taken_date'=>now(),'final_score'=>($final_score/count($item['section_id']))]);
            $final_score = 0;
        }
    }
}
