<?php namespace App;

use App\Rank;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword, EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the rank of an user.
     *
     * @return string
     */
    public function getUserRank()
    {
        $number_of_posts = $this->nbr_posts + $this->nbr_comments;

        $rank_names = Rank::all()->toArray();
        $size_of_rank_names = sizeof($rank_names);

        for ($i = 0; $i < $size_of_rank_names; $i++) {
            // If user has no posts
            if ($number_of_posts == 0) {
                return (string) 'Fantôme';

            // If user has X posts
            } else if ($number_of_posts < pow(2, $i)) {
                return (string) $rank_names[$i - 1]['name'];

            // If user has more posts than max amount
            } else if ($i == sizeof($rank_names) - 1) {
                return (string) $rank_names[$i]['name'];
            }
        }
    }

    /**
     * Checks if user is online
     *
     * @return boolean
     */
    public function isOnline()
    {
        // Defining the variables
        $last_seen_visit = $this->online_at;
        $time_before_offline = 5;

        // Parsing
        $time_ago = Carbon::now()->subMinutes($time_before_offline);
        $last_seen_online = Carbon::parse($last_seen_visit);

        // Checking if user is online
        if ($last_seen_online->diffInMinutes($time_ago) < $time_before_offline) {
            return true;
        }
        return false;
    }

    /**
     * Make a user to appear online
     *
     * @return void
     */
    public function makeOnline()
    {
        $this->online_at = Carbon::now();
        $this->save();
    }

}
