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
    public function getForums() {
        return $this->hasMany('Forum');
    }

}
