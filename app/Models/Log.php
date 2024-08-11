<?php

namespace App\Models;

use App\Models\User;
use App\Models\Workout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "workout_id",
        "exercise_id",
        "sets",
        "reps",
        "load",
        "workout_date"
    ];

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function workout() {
        return $this->belongsTo(Workout::class, "workout_id");
    }
}
