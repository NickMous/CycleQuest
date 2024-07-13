<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    public function checkpoints()
    {
        return $this->hasMany(Checkpoint::class);
    }

    protected $fillable = [
        'name',
        'description',
        'difficulty',
        'length',
        'duration',
        'user_id',
        'available_at',
        'unavailable_at',
        'is_public',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
