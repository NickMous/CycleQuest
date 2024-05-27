<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'route_id',
        'order',
        'latitude',
        'longitude',
        'address'
    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
