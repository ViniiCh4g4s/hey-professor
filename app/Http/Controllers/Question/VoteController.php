<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\{RedirectResponse, Request};

class VoteController extends Controller
{
    public function __invoke(Request $request, Question $question): RedirectResponse
    {
        // Lê o tipo do voto ('upvote' ou 'downvote') enviado pelo form e delega ao model.
        user()->vote($question, $request->input('vote'));

        return back();
    }
}
