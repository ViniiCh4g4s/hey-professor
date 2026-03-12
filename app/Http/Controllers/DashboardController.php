<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Inertia\{Inertia, Response};

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('dashboard', [
            'questions' => Question::all(),
        ]);
    }

}
