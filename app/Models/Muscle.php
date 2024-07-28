<?php

namespace App\Models;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Muscle extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    public function exercise() {
        return $this->belongsToMany(Exercise::class, "exercise_muscles", "muscle_id", "exercise_id");
    }
}
