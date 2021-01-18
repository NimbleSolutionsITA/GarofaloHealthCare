<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;


class Slide extends Model
{
    public function row1()
    {
        $locale = App::getLocale();
        $row1 = 'row1_'.$locale;
        return $this->$row1;
    }
    public function row2()
    {
        $locale = App::getLocale();
        $row2 = 'row2_'.$locale;
        return $this->$row2;
    }
    public function row3()
    {
        $locale = App::getLocale();
        $row3 = 'row3_'.$locale;
        return $this->$row3;
    }
    public function row4()
    {
        $locale = App::getLocale();
        $row4 = 'row4_'.$locale;
        return $this->$row4;
    }
    public function body()
    {
        $locale = App::getLocale();
        $body = 'body_'.$locale;
        return $this->$body;
    }
    public function button1()
    {
        $locale = App::getLocale();
        $button1 = 'button1_'.$locale;
        return $this->$button1;
    }
    public function button2()
    {
        $locale = App::getLocale();
        $button2 = 'button2_'.$locale;
        return $this->$button2;
    }
}
