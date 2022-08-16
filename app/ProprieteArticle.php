<?php

namespace App;

use App\TypeArticle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProprieteArticle extends Model
{
    use HasFactory;
    public function Type(){
        return $this->belongsTo(TypeArticle::class,"type_article_id","id");
    }
    public function article()
    {
        return $this->belongsToMany(Article::class,"article_propriete","article_id","propriete_article_id");
    }
}
