<?php namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use App\Http\Controllers\Controller;
use Jenssegers\Date\Date;

class ArticlesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = ArticleCategory::with('paginatedArticles')->get();
        //dd($categories->toArray());
        return view('news.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function article($random, $id, $slug)
    {
        // Selecting the article
        $article = Article::find($id);

        // Incrementing views
        $article->increment('views');

        // Setting Locale for \Date
        Date::setLocale('fr');

        return view('news.article', [
            'article' => $article,
            'date' => Date::parse($article->created_at),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function category()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
