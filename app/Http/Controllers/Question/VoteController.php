<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\{Question};
use Illuminate\Http\RedirectResponse;

class VoteController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {
        user()->like($question);

        //        dd($question->toArray());
        return back();
    }
}
