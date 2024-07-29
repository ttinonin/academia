<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function showForm() {
        $exercises = Exercise::all();

        return view('create-workout', ["exercises" => $exercises]);
    }

    public function create(Request $request) {
        $incomingFields = $request->validate([
            "title" => ["required", "min:1"],
            "exercises" => ["required", "min:1"]
        ]);

        $exerciseIds = explode(',', $incomingFields['exercises']);

        $workout = Workout::create([
            "title" => $incomingFields["title"],
            "created_by" => auth()->id()
        ]);
        $exercises = Exercise::find($exerciseIds);

        foreach($exercises as $exercise) {
            $exercise->workout()->attach($workout->id);
        }

        return redirect("/workouts")->with("success", "Exercise successfully created!");
    }

    public function read() {
        $workouts = Workout::where("created_by", auth()->id())->get();

        return view("workouts", ["workouts" => $workouts]);
    }
}
