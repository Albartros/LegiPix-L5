<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Forum
 *
 * @property-read \App\ForumCategory $category 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Topic[] $topics 
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Topic')
 *                     ->orderBy('pinned[] $listTopics 
 * @property-read mixed $posts_paginated 
 */
class Forum extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forums';

    /**
     * Gets the category containing the forum.
     *
     * @return object
     */
    public function category()
    {
        return $this->belongsTo('App\ForumCategory');
    }

    /**
     * Gets the category containing the forum.
     *
     * @return object
     */
    public function topics()
    {
        return $this->hasMany('App\Topic');
    }

    /**
     * Gets the topics from a forum and paginates them.
     *
     * @return object
     */
    public function listTopics()
    {
        return $this->hasMany('App\Topic')
                    ->orderBy('pinned', 'desc')
                    ->orderBy('anwsered_at', 'desc')
                    ->orderBy('id', 'desc');
    }

    /**
     * Paginated posts accessor. Access via $topic->posts_paginated
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPostsPaginatedAttribute()
    {
        return $this->listTopics()->paginate($this->per_page);
    }

}
