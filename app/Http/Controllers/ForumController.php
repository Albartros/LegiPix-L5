<?php namespace App\Http\Controllers;

use App\Forum;
use App\Topic;
use App\ForumCategory;
use App\Http\Controllers\Controller;

class ForumController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = ForumCategory::with('forums')->orderBy('position')->get();

        return view('forum.index', [
            'categories' => $categories,
        ]);
    }

    public function forum($id, $slug)
    {
        $forum = Forum::find($id);
        $topics = Topic::with('author', 'lastPost')->where('forum_id', $id)->orderBy('pinned', 'desc')->orderBy('anwsered_at', 'desc')->orderBy('id', 'desc')->paginate(20);

        return view('forum.forum', [
            'forum' => $forum,
            'topics' => $topics,
        ]);
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
