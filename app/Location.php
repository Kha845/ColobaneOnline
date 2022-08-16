<?php

namespace App;

use App\User;
use App\Client;
use App\Article;
use App\Paiement;
use App\StatutLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }
    public function Client(){
        return $this->belongsTo(Client::class,"client_id","id");
    }
    public function statutLocation()
    {
        return $this->belongsTo(StatutLocation::class,"statut_location_id","id");
    }
    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
    public function article()
    {
        return $this->belongsToMany(Article::class,"article_location","location_id","article_id");
    }
}
