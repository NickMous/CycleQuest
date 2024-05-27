<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_id',
        'location_id',
        'question_id',
        'answer_id',
        'url',
        'type',
        'alt'
    ];

    public function mediable()
    {
        return $this->morphTo();
    }
}
