<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Clinic;
use App;

class ClinicComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $contents;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Clinic $clinics)
    {
        // Dependencies automatically resolved by service container...
        $this->clinics = $clinics;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('clinics', $this->clinics->get());
    }
}