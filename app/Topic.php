<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'topics';

    /**
     * Touch the parent on change.
     *
     * @var array
     */
    protected $touches = array('get_forum');

    /**
     * Gets the author of the topic.
     *
     * @return object
     */
    public function get_author()
    {
        return $this->belongsTo('User');
    }

    /**
     * Gets the forum containing the topic.
     *
     * @return object
     */
    public function get_forum()
    {
        return $this->belongsTo('Forum');
    }

    /**
     * Lists topics shown on index page.
     *
     * @return object
     */
    public function list_index_topics()
    {
        $shown_on_index = 10;

        return $this->orderBy('anwsered_at', 'desc')
                    ->orderBy('id', 'desc')
                    ->take($shown_on_index)
                    ->get();
    }

    /**
     * Gets the posts from a topic and paginate them.
     *
     * @return object
     */
    public function get_posts()
    {
        $pagination = 15;

        return $this->hasMany('Post')
                    ->paginate($pagination);
    }

    /**
     * Gets the last post from a topic.
     *
     * @return object
     */
    public function get_last_post()
    {
        return $this->hasMany('Post')
                    ->find($this->last_post_id);
    }

    /**
     * Adds a view to the views counter.
     *
     * @return void
     */
    public function add_view()
    {
        $this->views = $this->views + 1;
        $this->save();
    }

}
