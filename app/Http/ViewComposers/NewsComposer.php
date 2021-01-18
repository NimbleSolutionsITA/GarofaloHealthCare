<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use TCG\Voyager\Models\Post;

class NewsComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
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
        $view->with('posts', $this->posts->orderBy('updated_at', 'desc')->get());
    }
}