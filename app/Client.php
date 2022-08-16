<?php

namespace App;

use App\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    public function location()
    {
        return $this->hasMany(Location::class);
    }
}
