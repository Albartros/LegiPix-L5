<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

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
    protected $touches = array('forum');

    /**
     * Gets the author of the topic.
     *
     * @return object
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Gets the forum containing the topic.
     *
     * @return object
     */
    public function forum()
    {
        return $this->belongsTo('App\Forum');
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
        return $this->hasMany('App\Post');
    }

    public function lastPost()
    {
        return $this->hasOne('App\Post', 'id', 'last_post_id');
    }

    /**
     * Gets the posts from a topic and paginate them.
     *
     * @return object
     */
    public function getPosts()
    {
        $pagination = 15;

        return $this->posts()->paginate($pagination);
    }

    /**
     * Gets the last post from a topic.
     *
     * @return object
     */
    public function last()
    {
        return $this->posts()->find($this->last_post_id);
    }

    public function parsedDate()
    {
        if ($this->created_at->diffInHours(Carbon::now()) <= 5) {
            return Date::parse($this->created_at)->diffForHumans();
        } elseif ($this->created_at->isToday()) {
            return 'Aujourd\'hui à ' . $this->created_at->format('H:i');
        } elseif ($this->created_at->isYesterday()) {
            return 'Hier à ' . $this->created_at->format('H:i');
        }
        return 'Le ' . Date::parse($this->created_at)->format('j F Y à H:i');
    }
}
