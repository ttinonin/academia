<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Log;
use App\Models\User;
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
            "exercises" => ["required", "array"]
        ]);

        $workout = Workout::create([
            "title" => $incomingFields["title"],
            "created_by" => auth()->id()
        ]);

        $workout->exercise()->attach($incomingFields["exercises"]);

        return response()->json([
            "workout_id" => $workout->id
        ]);
    }

    public function read() {
        $workouts = Workout::where("created_by", auth()->id())->get();

        return view("workouts", ["workouts" => $workouts]);
    }

    public function readSingle(Workout $workout) {
        $workout[0] = Workout::where("id", $workout->id)->get();

        return view("single-workout", ["workout" => $workout]);
    }

    public function showLogForm(Workout $workout) {
        $workout[0] = Workout::where("id", $workout->id)
        ->where("created_by", auth()->id())
        ->get();

        return view('log-workout', ["workout" => $workout]);
    }

    public function log(Request $request, Workout $workout) {
        $incomingFields = $request->all();

        $dados = array_filter($incomingFields, function($value) {
            return is_string($value) && $this->temParesNumericos($value);
        });

        $exercises_loads = $this->processaDados($dados);

        $exercises_ids = [];
        foreach($dados as $k=>$dado) {
            $exercises_ids[] = $k;
        }

        foreach($exercises_loads as $k=>$exercises) {
            foreach($exercises as $exercise) {
                $log = Log::create([
                    "user_id" => auth()->id(),
                    "workout_id" => $workout->id,
                    "exercise_id" => $k,
                    "sets" => count($exercises),
                    "reps" => $exercise['reps'],
                    "load" => $exercise['load'],
                    "workout_date" => date('Y-m-d')
                ]);

                $log->user()->attach(auth()->id());
            }
        }

        return view('logs')->with('success', 'Workout logged successfully');
    }

    public function getLogs() {
        $logs = User::find(auth()->id())->log;

        return view('logs', ["logs" => $logs]);
    }
}
