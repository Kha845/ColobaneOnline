<?php

namespace App;

use App\Article;
use App\DureeLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarification extends Model
{
    use HasFactory;
    public function dureeLocation()
    {
        return $this->belongsTo(DureeLocation::class,"duree_location_id","id");
    }
    public function article()
    {
        return $this->belongsTo(Article::class,"article_id","id");
    }
}
