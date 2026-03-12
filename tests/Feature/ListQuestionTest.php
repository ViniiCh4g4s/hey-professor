<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, get};

it('should list all the questions', function () {
    // Arrange :: preparar ---------------------------------------------------------------------
    $user      = User::factory()->create(); // criar usuário
    $questions = Question::factory(5)->create(); // criar 5 questões

    actingAs($user); // logar com esse usuário

    // Act :: executar --------------------------------------------------------------------------
    $response = get(route('dashboard')); // acessar a rota

    // Assert :: verificar ---------------------------------------------------------------------
    foreach ($questions as $question) {
        $response->assertSee($question->question); // verificar se a questão está na resposta
    }

});
