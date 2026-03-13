<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, assertDatabaseHas, post};

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

it('should not be able to like more than one time', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user);

    post(route('questions.vote', $question));
    post(route('questions.vote', $question));
    post(route('questions.vote', $question));
    post(route('questions.vote', $question));

    expect($user->votes()->where('question_id', '=', $question->id)->get())
        ->toHaveCount(1);
});
