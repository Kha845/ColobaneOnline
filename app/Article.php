<?php

namespace App;



use App\Location;
use App\TypeArticle;
use App\Tarification;
use App\ProprieteArticle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    public function type(){
        //article a une clé etrangere de type article qui pointe  sur la table typeArticle plus précisément sur l'id
        return $this->belongsTo(TypeArticle::class,"type_article_id","id");
    }
    public function tarification()
    {
        return $this->hasMany(Tarification::class);
    }
    //Pour récupérer toute les relation effectué pour un article donne
    public function locations()
    {
        return $this->belongsToMany(Location::class,"article_location","article_id","location_id");
    }
    public function proprietes()
    {
        return $this->belongsToMany(ProprieteArticle::class,"article_propriete","propriete_article_id","article_id");
    }

}
