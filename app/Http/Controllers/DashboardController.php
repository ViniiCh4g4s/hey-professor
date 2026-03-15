<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Inertia\{Inertia, Response};

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('dashboard', [
            'questions' => Question::withCount([
                'votes as likes_count'    => fn ($q) => $q->where('vote', 'upvote'),
                'votes as dislikes_count' => fn ($q) => $q->where('vote', 'downvote'),
            ])->get(),
        ]);
    }

}
