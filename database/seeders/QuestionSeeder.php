<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Question::truncate();

        Question::create([
            'value' => 'I know the basic functions of computer hardware (CPU and monitor) and its peripherals like the printer, speaker, keyboard, mouse, etc. ',
            'section_id' => 1
        ]);
        
        Question::create([
            'value' => 'I know how to save/open documents to/from a hard disk or other removable storage device.',
            'section_id' => 1
        ]);
        
        Question::create([
            'value' => 'I know how to open/send email with file attachments.',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I know how to log on to an Internet Service Provider (ISP). ',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I know how to navigate web pages (go to next or previous page). ',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I know how to download files using browers (Chrome, Firefox, Internet Explorer, etc.). ',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I know how to access an online library or database.',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I have previously joined online discussions/forums.',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I know what PDF files are and I can download and view them.',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I am familiar with word processing and can use it comfortably.',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I am able to have several applications opened at the same time and move easily in between them.',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I know how to use spreadsheet applications (e.g. Excel).',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I have to attend seminars/workshops related to online learning activities.',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I use/have used social networking (e.g. Facebook, Instagram, etc.). ',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I use/have used social networking (e.g. Facebook, Instagram, etc.). ',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I participate in online gaming networks.',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'I think the technological skills factor is important. ',
            'section_id' => 1
        ]);

        Question::create([
            'value' => 'When I have an important assignment, I get it done ahead of time.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'I prefer to work alone.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'I prefer to figure out instructions for assignments by myself.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'As a learner, I am highly independent.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'I am able to refrain from distractions while working or studying.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'I am able to stay to task while working or studying.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'When ask to learn new technologies, I do not put it off or avoid it.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'I can analyse class materials.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'I can formulate opinions of what I have learned.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'I am determined to stick to studies despite challening situations.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'I do not need direct lecturers to understand materials.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'I am able to express my thoughts and ideas in writing.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'I would describe myself as a self-starter.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'I am able to communicate effectively with others using online technology.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'I take responsibility for my own learning.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'Taking responsibility for staying in contact with my instructor would be easy for me.',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'I think the Study Habits & Skills factor is important. ',
            'section_id' => 2
        ]);

        Question::create([
            'value' => 'When participations in an online course I would feel motivated to explore content related questions.',
            'section_id' => 3
        ]);
        
        Question::create([
            'value' => 'I would be able to utilise a variety of information sources to explore problems posed in an online course.',
            'section_id' => 3
        ]);

        Question::create([
            'value' => 'Brainstorming with other online participants would help me resolve content related questions.',
            'section_id' => 3
        ]);

        Question::create([
            'value' => 'Online discussions would be valuable in helping me appreciate different perspectives of course content.',
            'section_id' => 3
        ]);

        Question::create([
            'value' => 'Learning activities in an online course would help me construct explanations/solutions.',
            'section_id' => 3
        ]);

        Question::create([
            'value' => 'Reflection on course content would help me understand fundamental concepts in an online class.',
            'section_id' => 3
        ]);

        Question::create([
            'value' => 'Reflection on course discussions would help me understand fundamental concepts in an online class.',
            'section_id' => 3
        ]);

        Question::create([
            'value' => 'I can describe ways to test the knowledge created in an online course.',
            'section_id' => 3
        ]);

        Question::create([
            'value' => 'I can describe ways to apply the knowledge created in online course.',
            'section_id' => 3
        ]);

        Question::create([
            'value' => 'When participating in an online course I can develop solutions to course problems that can be applied in practice.',
            'section_id' => 3
        ]);

        Question::create([
            'value' => 'I would have difficulty in applying the knowledge created in an online course to my work.',
            'section_id' => 3
        ]);

        Question::create([
            'value' => 'I would have difficulty in applying the knowledge created in an online course to other non-class related activities.',
            'section_id' => 3
        ]);

        Question::create([
            'value' => 'I think the Cognitive Preseence factor is important. ',
            'section_id' => 3
        ]);
      
        Question::create([
            'value' => 'I believe the instructor should clearly communicate important course topics in an online course.',
            'section_id' => 4
        ]);

        Question::create([
            'value' => 'I believe the instructor should clearly communicate important course goals in an online course.',
            'section_id' => 4
        ]);

        Question::create([
            'value' => 'I believe in an online course, the instructor should provide clear instructions on how to participate in course learning activities.',
            'section_id' => 4
        ]);

        Question::create([
            'value' => 'I believe in an online course, the instructor should clearly communicate important due date/times for learning activities.',
            'section_id' => 4
        ]);

        Question::create([
            'value' => 'The instructor should help in identifying areas of agreement and disagreement on course topics that would help me to learn.',
            'section_id' => 4
        ]);

        Question::create([
            'value' => 'The instructor should help in guiding the class towards understanding course topics in a way that would help me clarify my thinking.',
            'section_id' => 4
        ]);

        Question::create([
            'value' => 'The instructor should help to keep course participants engaged and participating in productive dialogue.',
            'section_id' => 4
        ]);

        Question::create([
            'value' => 'The instructor should help keep the course participants on a task in a way that would help me to learn.',
            'section_id' => 4
        ]);

        Question::create([
            'value' => 'The instructor should help to focus discussion on relevant issues in a way that would help me to learn.',
            'section_id' => 4
        ]);

        Question::create([
            'value' => 'The instructor should provide feedback that would help me understand my strengths and weaknesses.',
            'section_id' => 4
        ]);

        Question::create([
            'value' => 'The instructor should provide feedback in timely fashion.',
            'section_id' => 4
        ]);

        Question::create([
            'value' => 'I think Teaching Preseence factor is important. ',
            'section_id' => 4
        ]);

        Question::create([
            'value' => 'Getting to know other course participants online would give me a sense of belonging in the course.',
            'section_id' => 5
        ]);

        Question::create([
            'value' => 'I would be able to form distinct impressions of some course participants through online communication.',
            'section_id' => 5
        ]);

        Question::create([
            'value' => 'Online or web-based communication is an excellent medium for social interaction.',
            'section_id' => 5
        ]);

        Question::create([
            'value' => 'I value face to face over online learning.',
            'section_id' => 5
        ]);

        Question::create([
            'value' => 'I would feel comfortable conversing throught the online medium.',
            'section_id' => 5
        ]);

        Question::create([
            'value' => 'I would feel comfortable participating in online course discussions.',
            'section_id' => 5
        ]);

        Question::create([
            'value' => 'I would feel comfortable interacting online with other course participants.',
            'section_id' => 5
        ]);

        Question::create([
            'value' => 'I would feel comfortable disagreeing with other course participants online while still maintaining a sense of trust.',
            'section_id' => 5
        ]);

        Question::create([
            'value' => 'I feel that my point of view would be acknowledged by other course participants online.',
            'section_id' => 5
        ]);

        Question::create([
            'value' => 'Online discussions would help me to develop a sense of collaboration.',
            'section_id' => 5
        ]);

        Question::create([
            'value' => 'I think Social Preseence factor is important. ',
            'section_id' => 5
        ]);
        
    }
}
