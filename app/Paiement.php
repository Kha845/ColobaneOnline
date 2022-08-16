<?php

namespace App;

use App\User;
use App\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
    public function location()
    {
        return $this->belongsTo(Location::class,"location_id","id");
    }
}
