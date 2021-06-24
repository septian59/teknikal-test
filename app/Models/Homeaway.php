<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homeaway extends Model
{
    use HasFactory;

    public function competitions()
    {
        return $this->hasMany(Competition::class, 'homeaway_id1', 'homeaway_id2');
    }
}
