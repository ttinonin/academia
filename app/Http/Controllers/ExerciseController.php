<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Muscle;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ExerciseController extends Controller
{
    public function showCreateForm() {
        $muscles = Muscle::all();

        return view('create-exercise', ["muscles" => $muscles]);
    }

    public function create(Request $request) {
        $incomingFields = $request->validate([
            "name" => ["required", Rule::unique("exercises", "name"), "min:3"],
            "muscles" => ["required", "min:1"]
        ]);

        $muscleIds = explode(',', $incomingFields['muscles']);

        $exercise = Exercise::create(["name" => $incomingFields["name"]]);
        $muscles = Muscle::find($muscleIds);

        foreach($muscles as $muscle) {
            $muscle->exercise()->attach($exercise->id);
        }

        return redirect('/exercises')->with('success', 'Exercise successfully created!');
    }

    public function read() {
        $exercises = Exercise::all();

        return view('exercises', ["exercises" => $exercises]);
    }
}
