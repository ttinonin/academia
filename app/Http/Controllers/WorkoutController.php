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

    private function processaSerie($serie) {
        $pattern = '/\((\d+),\s*(\d+)\)/';
        $matches = [];
    
        if (preg_match_all($pattern, trim($serie), $matches, PREG_SET_ORDER)) {
            return $matches;
        }
    
        return [];
    }

    private function organizaDados($matches) {
        return array_map(function($match) {
            return [
                'reps' => (int)$match[1],
                'load' => (int)$match[2],
            ];
        }, $matches);
    }

    private function processaDados($dados) {
        $resultado = [];
    
        foreach ($dados as $chave => $valor) {
            if ($valor !== null) {
                $matches = $this->processaSerie($valor);
                $resultado[$chave] = $this->organizaDados($matches);
            } else {
                $resultado[$chave] = [];
            }
        }
    
        return $resultado;
    }

    private function temParesNumericos($valor) {
        $pattern = '/\(\d+,\s*\d+\)/';
        return preg_match_all($pattern, $valor) > 0;
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
