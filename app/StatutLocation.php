<?php

namespace App;

use App\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatutLocation extends Model
{
    use HasFactory;
    public function statutLocation()
    {
        return $this->hasMany(Location::class);
    }
}
