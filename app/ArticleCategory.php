<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ArticleCategory
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $articles 
 */
class ArticleCategory extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles_categories';

    public $timestamps = false;

    public function articles()
    {
        return $this->hasMany('App\Article', 'category_id');
    }

    public function paginatedArticles()
    {
        return $this->articles()->orderBy('created_at', 'desc')->take(5);
    }

}
