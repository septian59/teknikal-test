<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
