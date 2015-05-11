<?php namespace App\Http\Controllers;

use App\Article;
use App\Countdown;
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
        $a = new Article;
        $articles = $a->listIndexArticles();

        $c = new Countdown;
        $countdown = $c->listIndexCountdown();

        $n = new Article;
        $news = $n->listIndexNews();

        $t = new Topic;
        $topics = $t->listIndexTopics();

        $v = new Video;
        $videos = $v->listIndexVideos();

        return view('welcome', [
            'articles'  => $articles,
            'countdown' => $countdown,
            'news'      => $news,
            'topics'    => $topics,
            'videos'    => $videos,
        ]);
    }

}
