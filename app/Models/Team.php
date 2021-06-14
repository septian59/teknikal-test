<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getLogo()
    {
        if (substr($this->logo_url, 0, 5) == "https") {
            return $this->logo_url;
        }


        return asset("storage/" . $this->logo_url);
    }
}
