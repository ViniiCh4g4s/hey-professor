<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, assertDatabaseHas, post};

it('should be able to like a question', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user)->post(route('questions.vote', $question), ['vote' => 'upvote'])->assertRedirect();

    // SELECT * FROM votes WHERE user_id = 1 AND question_id = 1 AND vote = 'upvote';
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

    post(route('questions.vote', $question), ['vote' => 'upvote']);
    post(route('questions.vote', $question), ['vote' => 'upvote']);
    post(route('questions.vote', $question), ['vote' => 'upvote']);
    post(route('questions.vote', $question), ['vote' => 'upvote']);

    expect($user->votes()->where('question_id', '=', $question->id)->get())
        ->toHaveCount(1);
});

it('should be able to dislike a question', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user)->post(route('questions.vote', $question), ['vote' => 'downvote'])->assertRedirect();

    // SELECT * FROM votes WHERE user_id = 1 AND question_id = 1 AND vote = 'downvote';
    assertDatabaseHas('votes', [
        'user_id'     => $user->id,
        'question_id' => $question->id,
        'vote'        => 'downvote',
    ]);
});

it('should not be able to dislike more than one time', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create();

    actingAs($user);

    post(route('questions.vote', $question), ['vote' => 'downvote']);
    post(route('questions.vote', $question), ['vote' => 'downvote']);
    post(route('questions.vote', $question), ['vote' => 'downvote']);
    post(route('questions.vote', $question), ['vote' => 'downvote']);

    expect($user->votes()->where('question_id', '=', $question->id)->get())
        ->toHaveCount(1);
});
