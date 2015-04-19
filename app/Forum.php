<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forums';

    /**
     * Gets the category containing the forum.
     *
     * @return object
     */
    public function get_category()
    {
        return $this->belongsTo('CategoryForum');
    }

    /**
     * Gets the topics from a forum and paginates them.
     *
     * @return object
     */
    public function get_topics()
    {
        $pagination = 15;

        return $this->hasMany('Topic')
                    ->orderBy('pinned', 'desc')
                    ->orderBy('anwsered_at', 'desc')
                    ->orderBy('id', 'desc')
                    ->paginate($pagination);
    }

}
