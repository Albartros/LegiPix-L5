<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * Gets the category containing the forum.
     *
     * @return object
     */
    public function category()
    {
        return $this->belongsTo('App\ArticleCategory');
    }

    /**
     * Gets the category containing the forum.
     *
     * @return object
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Lists articles shown on index page.
     *
     * @return object
     */
    public function listIndexArticles()
    {
        return $this->with('category')
                    ->where('featured', 1)
                    ->orderBy('created_at', 'desc')
                    ->orderBy('id', 'desc')
                    ->take(5)
                    ->get();
    }

    /**
     * Lists news shown on index page.
     *
     * @return object
     */
    public function listIndexNews()
    {
        return $this->with('category')
                    ->where('featured', 0)
                    ->orderBy('created_at', 'desc')
                    ->orderBy('id', 'desc')
                    ->take(6)
                    ->get();
    }

    /**
     * Gets the url to an article
     *
     * @return string
     */
    public function getLink()
    {
        // Parsing the data of the category
        $category_id = (int) $this->category->id;
        $category_slug = e($this->category->slug);

        $category_params = $category_id . '-' . $category_slug;

        // Parsing the data of the article
        $article_id = (int) $this->id;
        $article_slug = e($this->slug);

        // Returning the url
        return route('n.article', [$category_params, $article_id, $article_slug]);
    }

    /**
     * Gets the unparsed text from an article
     *
     * @return string
     */
    public function unparsedText()
    {
        return $this->text;
    }

}
