<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

/**
 * App\Countdown
 *
 */
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
    public function listIndexCountdown()
    {

        return $this->orderBy('released_at', 'asc')
                    ->where('released_at', '>', Carbon::now())
                    ->first();
    }

}
