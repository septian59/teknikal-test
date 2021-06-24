<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team_id1');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team_id2');
    }


    public function homeaway()
    {
        return $this->belongsTo(Homeaway::class, 'homeaway_id1', 'homeaway_id2');
    }
}
