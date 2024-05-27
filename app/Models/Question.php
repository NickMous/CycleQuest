<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'location_id',
        'type',
        'order'
    ];

    public function checkpoint()
    {
        return $this->belongsTo(Checkpoint::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
