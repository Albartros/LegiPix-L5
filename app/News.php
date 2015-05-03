<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * Gets the category containing the forum.
     *
     * @return object
     */
    public function getCategory()
    {
        return $this->belongsTo('CategoryNews');
    }

    /**
     * Lists news shown on index page.
     *
     * @return object
     */
    public function listIndexTopics()
    {
        return $this->orderBy('created_at', 'desc')
                    ->orderBy('id', 'desc')
                    ->take(5)
                    ->get();
    }

}
