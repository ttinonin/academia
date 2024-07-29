<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "created_by"
    ];

    public function user() {
        return $this->belongsTo(User::class, "created_by");
    }

    public function exercise() {
        return $this->belongsToMany(Exercise::class, "workout_exercises", "workout_id", "exercise_id");
    }
}
