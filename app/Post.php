<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Post extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Gets the category containing the forum.
     *
     * @return object
     */
    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
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
