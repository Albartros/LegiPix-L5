<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryForum extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forum_categories';

    /**
     * Gets the forums from a category.
     *
     * @return object
     */
    public function get_forums() {
        return $this->hasMany('Forum');
    }

}
