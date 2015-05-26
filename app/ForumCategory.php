<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ForumCategory
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Forum[] $forums 
 */
class ForumCategory extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forums_categories';

    public $timestamps = false;

    /**
     * Gets the forums from a category.
     *
     * @return object
     */
    public function forums() {
        return $this->hasMany('App\Forum', 'category_id', 'id')->orderBy('position');
    }

}
