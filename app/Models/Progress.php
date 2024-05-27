<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'route_id',
        'progress',
        'location_id',
        'question_id',
        'score',
        'started_at',
        'completed_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function checkpoint()
    {
        return $this->has(Checkpoint::class);
    }
}
