<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles_categories';

    public $timestamps = false;

}
