<!DOCTYPE html>
<html>
<head>
    <title>Create Form</title>
</head>
<body>
    <h1>Create Form</h1>
    <form action="{{ route('forms.store') }}" method="POST">
        @csrf
        <label for="nombre">Form Name:</label>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="nivel">Level ID:</label>
        <input type="number" id="nivel" name="nivel"><br><br>

        <label for="descripcion">Description:</label>
        <input type="text" id="descripcion" name="descripcion"><br><br>

        <label for="tipo">Type:</label>
        <select id="tipo" name="tipo">
            <option value="unica_respuesta">Single Response</option>
            <option value="multiple_respuestas">Multiple Responses</option>
            <option value="texto">Text</option>
        </select><br><br>

        <div id="questions-container">
            <h2>Questions</h2>
            <div class="question">
                <label for="preguntas[0][nombre]">Question Name:</label>
                <input type="text" id="preguntas[0][nombre]" name="preguntas[0][nombre]"><br><br>

                <label for="preguntas[0][descripcion]">Description:</label>
                <input type="text" id="preguntas[0][descripcion]" name="preguntas[0][descripcion]"><br><br>

                <label for="preguntas[0][tipo]">Type:</label>
                <select id="preguntas[0][tipo]" name="preguntas[0][tipo]">
                    <option value="unica_respuesta">Single Response</option>
                    <option value="multiple_respuestas">Multiple Responses</option>
                    <option value="texto">Text</option>
                </select><br><br>

                <div class="answers-container">
                    <h3>Answers</h3>
                    <div class="answer">
                        <label for="preguntas[0][respuestas][0][nombre]">Answer Name:</label>
                        <input type="text" id="preguntas[0][respuestas][0][nombre]" name="preguntas[0][respuestas][0][nombre]"><br><br>

                        <label for="preguntas[0][respuestas][0][respuesta]">Correct Answer:</label>
                        <input type="checkbox" id="preguntas[0][respuestas][0][respuesta]" name="preguntas[0][respuestas][0][respuesta]"><br><br>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" onclick="addQuestion()">Add Question</button>
        <button type="submit">Submit</button>
    </form>

    <script>
        let questionIndex = 1;
        let answerIndex = 1;

        function addQuestion() {
            const questionContainer = document.createElement('div');
            questionContainer.className = 'question';
            questionContainer.innerHTML = `
                <h2>Questions</h2>
                <label for="preguntas[${questionIndex}][nombre]">Question Name:</label>
                <input type="text" id="preguntas[${questionIndex}][nombre]" name="preguntas[${questionIndex}][nombre]"><br><br>
                <label for="preguntas[${questionIndex}][descripcion]">Description:</label>
                <input type="text" id="preguntas[${questionIndex}][descripcion]" name="preguntas[${questionIndex}][descripcion]"><br><br>
                <label for="preguntas[${questionIndex}][tipo]">Type:</label>
                <select id="preguntas[${questionIndex}][tipo]" name="preguntas[${questionIndex}][tipo]">
                    <option value="unica_respuesta">Single Response</option>
                    <option value="multiple_respuestas">Multiple Responses</option>
                    <option value="texto">Text</option>
                </select><br><br>
                <div class="answers-container">
                    <h3>Answers</h3>
                    <div class="answer">
                        <label for="preguntas[${questionIndex}][respuestas][0][nombre]">Answer Name:</label>
                        <input type="text" id="preguntas[${questionIndex}][respuestas][0][nombre]" name="preguntas[${questionIndex}][respuestas][0][nombre]"><br><br>
                        <label for="preguntas[${questionIndex}][respuestas][0][respuesta]">Correct Answer:</label>
                        <input type="checkbox" id="preguntas[${questionIndex}][respuestas][0][respuesta]" name="preguntas[${questionIndex}][respuestas][0][respuesta]"><br><br>
                    </div>
                </div>
            `;
            document.getElementById('questions-container').appendChild(questionContainer);
            questionIndex++;
        }
    </script>
</body>
</html>
