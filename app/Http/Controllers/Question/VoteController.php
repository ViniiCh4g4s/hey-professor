<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\{Question, Vote};
use Illuminate\Http\RedirectResponse;

class VoteController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {
        Vote::query()->create([
            'question_id' => $question->id,
            'user_id'     => auth()->id(),
            'vote'        => 'upvote',
            //            'vote'        => request()->has('like') ? 'upvote' : 'downvote',
        ]);

        //        dd($question->toArray());
        return back();
    }
}
