<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Form;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        // Busca el formulario creado por FormSeeder
        $form1 = Form::find(1);

        if ($form1) {
            Question::firstOrCreate(
                ['id' => 1],
                [
                    'formulario' => $form1->id,
                    'nombre_pregunta' => '¿Cuál de estas etiquetas es la que encabeza una página web?',
                    'descripcion' => 'Selecciona la respuesta correcta.',
                    'type' => 'unica_respuesta',
                    'completado' => false,
                ]
            );
        }
    }
}
