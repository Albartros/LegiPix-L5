<?php namespace App\Http\Controllers;

use App\Countdown;
use App\News;
use App\Topic;
use App\Video;

class WelcomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $c = new Countdown;
        $countdowns = $c->listIndexCountdowns();

        $n = new News;
        $news = $n->listIndexNews();

        $t = new Topic;
        $topics = $t->listIndexTopics();

        $v = new Video;
        $videos = $v->listIndexVideos();

        return view('welcome', [
            'countdowns' => $countdowns,
            'news' => $news,
            'topics' => $topics,
            'videos' => $videos
        ]);
    }

}
