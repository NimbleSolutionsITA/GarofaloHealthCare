<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;


class Clinic extends Model
{
    use Spatial;

    public function body()
    {
        $locale = App::getLocale();
        $body = 'body_'.$locale;
        return $this->$body;
    }

    public function excerpt()
    {
        $locale = App::getLocale();
        $excerpt = 'excerpt_'.$locale;
        return $this->$excerpt;
    }
}
