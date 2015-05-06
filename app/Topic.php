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
    public function getAuthor()
    {
        return $this->belongsTo('User');
    }

    /**
     * Gets the forum containing the topic.
     *
     * @return object
     */
    public function getForum()
    {
        return $this->belongsTo('Forum');
    }

    /**
     * Lists topics shown on index page.
     *
     * @return object
     */
    public function listIndexTopics()
    {
        $shown_on_index = 5;

        return $this->orderBy('anwsered_at', 'desc')
                    ->orderBy('id', 'desc')
                    ->take($shown_on_index)
                    ->get();
    }

    /**
     * Gets the posts from a topic.
     *
     * @return object
     */
    public function posts()
    {
        return $this->hasMany('Post');
    }

    /**
     * Gets the posts from a topic and paginate them.
     *
     * @return object
     */
    public function getPosts()
    {
        $pagination = 15;

        return $this->posts()
                    ->paginate($pagination);
    }

    /**
     * Gets the last post from a topic.
     *
     * @return object
     */
    public function getLastPost()
    {
        return $this->posts()
                    ->find($this->last_post_id);
    }

    /**
     * Adds a view to the views counter.
     *
     * @return void
     */
    public function addView()
    {
        $this->views = $this->views + 1;
        $this->save();
    }

}
