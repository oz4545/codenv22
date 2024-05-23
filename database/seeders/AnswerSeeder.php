<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;
use App\Models\Question;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Recupera la pregunta creada por QuestionSeeder
        $question1 = Question::find(1);

        if ($question1) {
            $answers = [
                ['nombre' => '</html>', 'respuesta' => false, 'pregunta' => $question1->id],
                ['nombre' => '<style>', 'respuesta' => false, 'pregunta' => $question1->id],
                ['nombre' => '<html>', 'respuesta' => true, 'pregunta' => $question1->id],
                ['nombre' => '<p>', 'respuesta' => false, 'pregunta' => $question1->id],
            ];

            foreach ($answers as $answer) {
                Answer::firstOrCreate($answer);
            }
        }
    }
}
