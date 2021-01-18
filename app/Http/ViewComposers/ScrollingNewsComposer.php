<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Category;

class ScrollingNewsComposer
{
    /**
     * The user repository implementation.
     *
     * @var Post
     */
    protected $posts;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Post $posts)
    {
        // Dependencies automatically resolved by service container...
        $this->posts = $posts;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $catid = Category::where('slug', 'comunicati')->first()->id;
        $view->with('posts', $this->posts->where('category_id', $catid)->orderBy('updated_at', 'desc')->get());
    }
}