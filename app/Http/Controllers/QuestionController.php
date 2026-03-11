<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{
    //
    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'question' => [
                'required',
                'min:10',
                function ($attribute, $value, $fail) {
                    if (!str_ends_with($value, '?')) {
                        $fail('Are you sure that is a question? It is missing the question mark at the end.');
                    }
                },
            ],
        ]);

        Question::query()->create($attributes);

        //        dd(request()->question);
        return to_route('dashboard');
    }
}
