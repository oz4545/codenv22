<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Question;
use App\Models\Answer;

class QuizController extends Controller
{
    // Método para mostrar la primera pregunta
    public function showQuestion($formId, $questionId)
    {
        $form = Form::findOrFail($formId);
        $question = Question::where('id', $questionId)
                            ->where('formulario', $formId)
                            ->firstOrFail();
        $answers = Answer::where('pregunta', $question->id)->get();

        return view('quiz.question', compact('form', 'question', 'answers'));
    }

    // Método para validar la respuesta del usuario
    public function validateAnswer(Request $request, $formId, $questionId)
    {
        $question = Question::findOrFail($questionId);
        $userAnswer = $request->input('answer');

        $correctAnswers = Answer::where('pregunta', $questionId)
                                ->where('respuesta', true)
                                ->pluck('id')->toArray();

        $isCorrect = false;

        if ($question->type == 'unica_respuesta') {
            $isCorrect = in_array($userAnswer, $correctAnswers);
        } elseif ($question->type == 'multiple_respuestas') {
            $userAnswers = is_array($userAnswer) ? $userAnswer : [];
            $isCorrect = empty(array_diff($correctAnswers, $userAnswers));
        } elseif ($question->type == 'texto') {
            $correctAnswer = Answer::where('pregunta', $questionId)
                                   ->where('respuesta', true)
                                   ->first();
            $isCorrect = $correctAnswer && strtolower($userAnswer) == strtolower($correctAnswer->nombre);
        }

        if ($isCorrect) {
            // Marcar la pregunta como completada
            $question->completado = true;
            $question->save();

            // Buscar la siguiente pregunta
            $nextQuestion = Question::where('formulario', $formId)
                                    ->where('id', '>', $questionId)
                                    ->orderBy('id')
                                    ->first();

            if ($nextQuestion) {
                return redirect()->route('quiz.question', ['formId' => $formId, 'questionId' => $nextQuestion->id]);
            } else {
                // Si no hay más preguntas, marcar el formulario como completado
                $form = Form::findOrFail($formId);
                $form->completado = true;
                $form->save();

                return redirect()->route('quiz.completed', ['formId' => $formId]);
            }
        } else {
            return redirect()->route('quiz.question', ['formId' => $formId, 'questionId' => $questionId])
                             ->with('error', 'Respuesta incorrecta. Inténtalo de nuevo.');
        }
    }

    // Método para mostrar mensaje de formulario completado
    public function showCompleted($formId)
    {
        $form = Form::findOrFail($formId);
        return view('quiz.completed', compact('form'));
    }
}
