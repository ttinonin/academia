<?php

namespace App\Http\Controllers;

use App\Models\Muscle;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function showCreateForm() {
        $muscles = Muscle::all();

        return view('create-exercise', ["muscles" => $muscles]);
    }
}
