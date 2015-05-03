<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Countdown extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countdowns';

    /**
     * Lists countdowns shown on index page.
     *
     * @return object
     */
    public function listIndexCountdowns()
    {
        $shown_on_index = 2;

        return $this->orderBy('released_at', 'asc')
                    ->where('released_at', '>', Date::now())
                    ->take($shown_on_index)
                    ->get();
    }

}
