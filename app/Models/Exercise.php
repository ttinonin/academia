<?php

namespace App\Models;

use App\Models\Muscle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    public function muscle() {
        return $this->belongsToMany(Muscle::class, "exercise_muscles", "exercise_id", "muscle_id");
    }
}
