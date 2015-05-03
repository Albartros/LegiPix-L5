<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news_categories';

    /**
     * Gets the news from a category.
     *
     * @return object
     */
    public function getForums() {
        return $this->hasMany('News');
    }

}
