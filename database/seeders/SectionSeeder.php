<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Section::truncate();
        Schema::enableForeignKeyConstraints();
        Section::create([
            'id' => 1,
            'value' => 'Technological Skills',
            'description'=> 'Technological Skills refer to the level of proficiency and competence in using digital tools and technologies necessary for participating in e-learning activities. This factor assesses the learners ability to navigate online platforms, use communication tools, access learning materials, and troubleshoot technical issues. Individuals with higher technological skills are more likely to have a smoother and productive e-learning experience'
        ]);

        Section::create([
            'id' => 2,
            'value' => 'Study Habits & Skills',
            'description' => 'Study Habits & Skills focus on the learners ability to manage their time effectively, set goals, and maintain discipline in an online learning environment. This factor examines how well learners can organize their study materials, engage in self-directed learning, and adopt effective study strategies. Strong study habits and skills contribute to better learning outcomes in e-learning settings'
        ]);

        Section::create([
            'id' => 3,
            'value' => 'Cognitive Presence',
            'description' => 'Cognitive Presence refers to the level of critical thinking, reflection, and active participation demonstrated by learners in online discussions and collaborative activities. This factor examines how well learners engage in meaningful interactions, analyze information, and contribute to intellectual discourse. A strong cognitive presence fosters a deeper understanding of the course content and promotes knowledge construction'
        ]);

        Section::create([
            'id' => 4,
            'value' => 'Teaching Presence',
            'description' => 'Teaching Presence assesses the role of instructors or facilitators in creating a supportive and interactive online learning environment. This factor includes the design and organization of online courses, instructional strategies, timely feedback, and guidance provided by instructors to enhance learners engagement and motivation. A strong teaching presence positively influences learners satisfaction and learning outcomes'
        ]);

        Section::create([
            'id' => 5,
            'value' => 'Social Presence',
            'description' => 'Social Presence relates to the learners sense of connection, belonging, and interaction with others in the online learning community. This factor explores how learners engage in social interactions, collaborate with peers, and build a supportive learning network. A strong social presence contributes to a positive learning experience and reduces feelings of isolation in the virtual learning environment'
        ]);
    }
}
