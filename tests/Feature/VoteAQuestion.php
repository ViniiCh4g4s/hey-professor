<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, assertDatabaseHas};

it('should be able to like a question', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user)->post(route('questions.vote', $question))->assertRedirect();

    // SELECT * FROM votes WHERE user_id = 1 AND question_id = 1 AND like = 1 AND dislike = 0;
    assertDatabaseHas('votes', [
        'user_id'     => $user->id,
        'question_id' => $question->id,
        'vote'        => 'upvote',
    ]);
});
