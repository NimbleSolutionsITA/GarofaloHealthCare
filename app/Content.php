<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function gallery()
    {
        $dirname = "storage/gallery/";
        $gallery = glob($dirname."*.jpeg");
        return $gallery;
    }
}
