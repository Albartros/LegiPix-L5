<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'videos';

    /**
     * Lists the videos shown on index page.
     *
     * @return object
     */
    public function listIndexVideos()
    {
        $shown_on_index = 4;

        return $this->orderBy('created_at', 'desc')
                    ->take($shown_on_index)
                    ->get();
    }

}
